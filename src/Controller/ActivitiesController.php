<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\I18n;
use Cake\Network\Exception\NotFoundException;

I18n::locale('es');

/**
 * Activities Controller
 *
 * @property \App\Model\Table\ActivitiesTable $Activities
 */
class ActivitiesController extends AppController
{
	
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'ActivitiesGroups', 'Rubrics']
        ];
        $activities = $this->paginate($this->Activities);

        $this->set(compact('activities'));
        $this->set('_serialize', ['activities']);
    }

    /**
     * View method
     *
     * @param string|null $id Activity id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $activity = $this->Activities->get($id, [
        		'contain' => ['Users', 'ActivitiesGroups', 'Rubrics', 'Submissions','Groups']
        ]);
        $this->set('activity', $activity);
        $this->set('_serialize', ['activity']);
        //criterio rubricas
        $criterias = TableRegistry::get('RubricCriterias');
        $criteria = $criterias->find()->where(['rubric_id' => $activity->rubric_id])->contain('RubricLevels');
        $this->set(['criteria' => $criteria]);
        $this->set('_serialize', ['criteria']);
        //Grupos - parejas        
         
        $groups = TableRegistry::get('Groups');
        $this->set('groups', $groups->find());
        
        $assignments = $groups->Assignments->find()
        ->where(['Groups.activity_id' => $id])
        ->contain(['Groups','Users'])
        ->toArray();
        $this->set('assignments', $assignments);
        $this->set('_serialize', ['assignments']);
        //todos los usurios registrados
        $users = TableRegistry::get('Users');
        $this->set('users', $users->find());
//         entregas
        $submissions_table= TableRegistry::get('Submissions');
        $submissions= $submissions_table->find()->where(['activity_id' => $id])->contain('Users');
        $this->set(['submissions' => $submissions]);
        $this->set('_serialize', ['submissions']);
         
        /**
         * Add in modal 1
         */
        $save_group = TableRegistry::get('Groups')->newEntity($this->request->data());
         
        if ($this->request->is('post')) {
        	$save_group = $this->Groups->patchEntity($save_group, $this->request->data);
        	$save_group->activity_id = $actv_id;
        	 
        	if ($this->Groups->save($save_group)) {
        		$this->Flash->success(__('The group has been saved.'));
        	}
        }       
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
	public function add()
    {
        $activity = $this->Activities->newEntity();
        if ($this->request->is('post')) {
            $activity = $this->Activities->patchEntity($activity, $this->request->data);
            $activity->user_id = $this->Auth->user('id');
            if ($this->Activities->save($activity)) {
                $this->Flash->success(__('The activity has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The activity could not be saved. Please, try again.'));
            }
        }
        $activitiesGroups = $this->Activities->ActivitiesGroups->find('list', ['limit' => 200]);
        $this->set(compact('activity', 'activitiesGroups'));
        $this->set('_serialize', ['activity']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Activity id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $activity = $this->Activities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $activity = $this->Activities->patchEntity($activity, $this->request->data);
            if ($this->Activities->save($activity)) {
                $this->Flash->success(__('The activity has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The activity could not be saved. Please, try again.'));
            }
        }
        $activitiesGroups = $this->Activities->ActivitiesGroups->find('list', ['limit' => 200]);
        $rubrics = $this->Activities->Rubrics->find('list', ['limit' => 200]);
        $this->set(compact('activity', 'activitiesGroups', 'rubrics'));
        $this->set('_serialize', ['activity']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Activity id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $activity = $this->Activities->get($id);
        if ($this->Activities->delete($activity)) {
            $this->Flash->success(__('The activity has been deleted.'));
        } else {
            $this->Flash->error(__('The activity could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    /** 
     * Submit method
     * Metodo para las entregas
     * Se agrega al LMS
     */
    public function submit($id = null)
    {
    	$activity = $this->Activities->get($id, [
    			'contain' => ['Users', 'ActivitiesGroups', 'Rubrics', 'Submissions', 'Groups']
    	]); 	
    	$groups = $this->Activities->Groups->find()->where(['activity_id' => $id])->contain('Assignments');
    	foreach ($groups as $group){
    		foreach ($group->assignments as $assignment)
    			if ($assignment->user_id == $this->Auth->user('id')){
    		    	$role = $assignment->role_id;
    		    	if ($role == 2){
    		    		foreach ($group->assignments as $assignment)
    		    			if ($assignment->role_id == 1)
    		    				$compañero = $assignment->user_id; 
    		    	}   				
    			}
    	}
    	$submission = $this->Activities->Submissions->find()->where(['user_id' => $compañero])->first();
    	$this->set('sub', $submission->id);
    	debug($submission->id);
    	$this->set('activity', $activity);
    	$this->set('_serialize', ['activity']);
    	$this->set('role', $role);
    	$this->set('_serialize', ['groups']);
    	
    	//$submissions = TableRegistry::get('Submissions');
    	//$existe_grade = $grades
    	//->find()
    	//->where(['Grades.submission_id' => $sub_id])
    	//->andWhere(['Grades.criteria_id' => $criteria])
    	//->andWhere(['Grades.user_id' => $user])
    	//->first();
    }
    
}
