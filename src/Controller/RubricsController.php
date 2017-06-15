<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\RubricCriteriasController;
use App\Controller\RubricLevelsController;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\I18n;
use Cake\ORM\TableRegistry;
use PhpParser\Node\Expr\AssignOp\Concat;

I18n::locale('es');

/**
 * Rubrics Controller
 *
 * @property \App\Model\Table\RubricsTable $Rubrics
 */
class RubricsController extends AppController
{
	/**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $rubrics = $this->paginate($this->Rubrics);

        $this->set(compact('rubrics'));
        $this->set('_serialize', ['rubrics']);
        /**
         * Add in modal
         */
        $rubricsTable = TableRegistry::get('Rubrics');
        $rubric = $rubricsTable->newEntity($this->request->data());
        
        if ($this->request->is('post')) {
        	$rubric = $this->Rubrics->patchEntity($rubric, $this->request->data);
        	$rubric->user_id = $this->Auth->user('id');
        	if ($rubricsTable->save($rubric)) {
        		$id = $rubric->id;        
        		$this->Flash->success(__('The rubric has been saved.'));
        		return $this->redirect(['action' => 'view', $id]);
        	}
        }
    }

    /**
     * View method
     *
     * @param string|null $id Rubric id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rubric = $this->Rubrics->get($id, [
            'contain' => ['RubricCriterias']
        ]);      
        $criterias = $this->Rubrics->RubricCriterias->find()->where(['rubric_id' => $id])->contain('RubricLevels');
        $this->set([
        		'rubric' => $rubric,
        		'criterias' => $criterias
        ]);
        $this->set('_serialize', ['rubric','criterias']);
    }
	
    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($act_id = null)
    {
    	$rubric = $this->Rubrics->newEntity();
    	if ($this->request->is('post')) {
    		$rubric = $this->Rubrics->patchEntity($rubric, $this->request->data);
    		$rubric->user_id = $this->Auth->user('id');	
    		if ($this->Rubrics->save($rubric)) {
    			$activities = TableRegistry::get('Activities');
    			$activity = $activities->find()->where(['id' => $act_id])->first();
    			$activity->rubric_id = $rubric->id;
    			$activities->save($activity);
    			$this->Flash->success(__('The rubric has been saved.'));
    			return $this->redirect(['controller' => 'Activities', 'action' => 'view', $act_id]);
    		}
    	}
    }
    
    /**
     * Edit method
     *
     * @param string|null $id Rubric id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rubric = $this->Rubrics->get($id, [
            'contain' => ['Users', 'Activities', 'RubricCriterias']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rubric = $this->Rubrics->patchEntity($rubric, $this->request->data);

            if ($this->Rubrics->save($rubric)) {
                $this->Flash->success(__('The rubric has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rubric could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('rubric'));
        $this->set('_serialize', ['rubric']);
    }
    /**
     * Delete method
     *
     * @param string|null $id Rubric id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rubric = $this->Rubrics->get($id);
        if ($this->Rubrics->delete($rubric)) {
            $this->Flash->success(__('The rubric has been deleted.'));
        } else {
            $this->Flash->error(__('The rubric could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Aplicar Rubrica method
     */
    public function applyRubric($sub_id = null)
    {
    	$submissions = TableRegistry::get('Submissions');
    	$rubrics = TableRegistry::get('Rubrics');
    	$grades = TableRegistry::get('Grades');
    	//entregas
    	$submission = $submissions->find()->where(['Submissions.id' => $sub_id])->contain(['Users','Activities'])->first();
    	$this->set(['submission' => $submission]);
    	$this->set('_serialize', ['submission']);
    	
    	//rubrica
    	
    	$rubric = $rubrics->find()->where(['Rubrics.id' => $submission->activity->rubric_id])->contain(['RubricCriterias'])->first();
    	$this->set(['rubric' => $rubric]);
    	$this->set('_serialize', ['rubric']); 
    	
    	//crear criterio de calificación en caso de que no exista
    	
    	$user = $this->Auth->user('id');
    	foreach ($rubric->rubric_criterias as $rubricCriterias){
    		$criteria = $rubricCriterias->id;		
    		$existe_grade = $grades
    						->find()
    						->where(['Grades.submission_id' => $sub_id])
    						->andWhere(['Grades.criteria_id' => $criteria])
    						->andWhere(['Grades.user_id' => $user])
    						->first();
    		if ($rubricCriterias->id != $existe_grade->criteria_id){
    			$add_grade = $grades->newEntity(['submission_id' => $sub_id, 'user_id' => $user, 'criteria_id' => $criteria]);
    			$grades->save($add_grade);
    		}
    	}
    	//calificaciones
    	$grade = $grades->find()->where(['Grades.submission_id' => $sub_id])->andWhere(['Grades.user_id' => $user])->contain(['Users','Submissions'])->all();
    	$this->set(['grade' => $grade]);
    	$this->set('_serialize', ['grade']);
    }
    public function grade($sub_id = null)
    {
    	$submissions = TableRegistry::get('Submissions');
    	$rubrics = TableRegistry::get('Rubrics');
    	$grades = TableRegistry::get('Grades');
    	//entregas
    	$submission = $submissions->find()->where(['Submissions.id' => $sub_id])->contain(['Users','Activities'])->first();
    	$this->set(['submission' => $submission]);
    	$this->set('_serialize', ['submission']);
    	//calificación compañero
    	$compañero = $grades->find();
    	debug($compañero);
    	
    	//rubrica
    	
    	$rubric = $rubrics->find()->where(['Rubrics.id' => $submission->activity->rubric_id])->contain(['RubricCriterias'])->first();
    	$this->set(['rubric' => $rubric]);
    	$this->set('_serialize', ['rubric']);
    	
    	//crear criterio de calificación en caso de que no exista
    	
    	$user = $this->Auth->user('id');
    	foreach ($rubric->rubric_criterias as $rubricCriterias){
    		$criteria = $rubricCriterias->id;
    		$existe_grade = $grades
    		->find()
    		->where(['Grades.submission_id' => $sub_id])
    		->andWhere(['Grades.criteria_id' => $criteria])
    		->andWhere(['Grades.user_id' => $user])
    		->first();
    		if ($rubricCriterias->id != $existe_grade->criteria_id){
    			$add_grade = $grades->newEntity(['submission_id' => $sub_id, 'user_id' => $user, 'criteria_id' => $criteria]);
    			$grades->save($add_grade);
    		}
    	}
    	//$users = TableRegistry::get('Users');
    	//$user = $users->newEntity(['email' => 'mark@example.com']);
    	//$users->save($user);
    	
    	//calificaciones
    	
    	$grade = $grades->find()->where(['Grades.submission_id' => $sub_id])->andWhere(['Grades.user_id' => $user])->contain(['Users','Submissions'])->all();
    	$this->set(['grade' => $grade]);
    	$this->set('_serialize', ['grade']);
    }
    
}
