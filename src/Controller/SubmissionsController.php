<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\I18n;
use Cake\ORM\TableRegistry;

I18n::locale('es');
/**
 * Submissions Controller
 *
 * @property \App\Model\Table\SubmissionsTable $Submissions
 */
class SubmissionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Activities', 'Users']
        ];
        $submissions = $this->paginate($this->Submissions);

        $this->set(compact('submissions'));
        $this->set('_serialize', ['submissions']);
    }

    /**
     * View method
     *
     * @param string|null $id Submission id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
    	$users = TableRegistry::get('Users');
    	$sum = 0;
    	$submission = $this->Submissions->get($id, [
            'contain' => ['Activities', 'Users', 'Grades']
        ]);
    	$porcentual = $submission->activity->grade_estudiantes;
        foreach ($submission->grades as $grade){
        	$user_id = $grade->user_id;
        	$user = $users->find()->where(['id' => $user_id])->first();
        	if (!empty($user->lti_user_id)){
        		$sum = $sum + $grade->score * ($porcentual / 100);
        	}else{
        		$sum = $sum + $grade->score * ((100 - $porcentual) / 100);
        	}
        }
        
        $pje_aprob = ($submission->activity->exigencia * $submission->activity->score_max) / 100;
        if ($sum <= $pje_aprob){
        	$nota_alumno = $submission->activity->grade_aprobacion - $submission->activity->grade_min;
        	$nota_alumno = $nota_alumno / $pje_aprob;
        	$nota_alumno = $nota_alumno * $sum;
        	$nota_alumno = $nota_alumno + $submission->activity->grade_min;
        }else{
        	$nota_alumno = $submission->activity->grade_max - $submission->activity->grade_aprobacion;
        	$nota_alumno = $nota_alumno / ($submission->activity->score_max - $pje_aprob);
        	$nota_alumno = $nota_alumno * ($sum - $pje_aprob);
        	$nota_alumno = $nota_alumno + $submission->activity->grade_aprobacion;
        }
		$data = ['score' => $sum,
				 'grade' => $nota_alumno
				];
		$submission = $this->Submissions->patchEntity($submission, $data);
		$this->Submissions->save($submission);
        $this->set('submission', $submission);
        $this->set('_serialize', ['submission']);
        
        $grades_table= TableRegistry::get('Grades');
        $grades= $grades_table->find()->where(['submission_id' => $id])->contain('Users');
        $this->set(['grades' => $grades]);
        $this->set('_serialize', ['grades']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $submission = $this->Submissions->newEntity();
        if ($this->request->is('post')) {
            $submission = $this->Submissions->patchEntity($submission, $this->request->data);
            $submission->user_id = $this->Auth->user('id');
            if ($this->Submissions->save($submission)) {
                $this->Flash->success(__('The submission has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The submission could not be saved. Please, try again.'));
            }
        }
        $activities = $this->Submissions->Activities->find('list', ['limit' => 200]);
        $this->set(compact('submission', 'activities'));
        $this->set('_serialize', ['submission']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Submission id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $submission = $this->Submissions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $submission = $this->Submissions->patchEntity($submission, $this->request->data);
            if ($this->Submissions->save($submission)) {
                $this->Flash->success(__('The submission has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The submission could not be saved. Please, try again.'));
            }
        }
        $activities = $this->Submissions->Activities->find('list', ['limit' => 200]);
        $users = $this->Submissions->Users->find('list', ['limit' => 200]);
        $this->set(compact('submission', 'activities', 'users'));
        $this->set('_serialize', ['submission']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Submission id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $submission = $this->Submissions->get($id);
        if ($this->Submissions->delete($submission)) {
            $this->Flash->success(__('The submission has been deleted.'));
        } else {
            $this->Flash->error(__('The submission could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
public function submit($idActivity = null)
    {
    	$submission = $this->Submissions->newEntity();
    	if ($this->request->is('post')) {
    		$submission = $this->Submissions->patchEntity($submission, $this->request->data);
    		$submission->user_id = $this->Auth->user('id');
    		$submission->activity_id = $idActivity;
    		if ($this->Submissions->save($submission)) {
    			$this->Flash->success(__('The submission has been saved.'));
    
    			return $this->redirect([
    					'controller' => 'Pages',
    					'action' => 'home'
				]);
    					
    		} else {
    			$this->Flash->error(__('The submission could not be saved. Please, try again.'));
    		}
    	}
    	$this->set(compact('submission'));
    	$this->set('_serialize', ['submission']);
    
    }
    
    /**
     * Aplicar Rubrica method
     */
    public function applyRubric($sub_id = null)
    {
    	//entrega
    	$submissions = TableRegistry::get('Submissions');
    	$submission = $submissions->find()->where(['Submissions.id' => $sub_id])->contain(['Users','Activities'])->first();
    	$this->set(['submission' => $submission]);
    	$this->set('_serialize', ['submission']);
    	//rubrica
    	$rubrics = TableRegistry::get('Rubrics');//$this->Rubrics->get($sub_id, ['contain' => ['RubricCriterias','Activities']]);
    	$rubric = $rubrics->find()->where(['Rubrics.id' => $submission->activity->rubric_id])->contain(['RubricCriterias'])->first();
    	//debug($rubric);
    	$this->set(['rubric' => $rubric]);
    	$this->set('_serialize', ['rubric']);
    }
}
