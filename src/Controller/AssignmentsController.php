<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Assignments Controller
 *
 * @property \App\Model\Table\AssignmentsTable $Assignments
 */
class AssignmentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ActivitiesGroups', 'Activities', 'Users']
        ];
        $assignments = $this->paginate($this->Assignments);

        $this->set(compact('assignments'));
        $this->set('_serialize', ['assignments']);
    }

    /**
     * View method
     *
     * @param string|null $id Assignment id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $assignment = $this->Assignments->get($id, [
            'contain' => ['ActivitiesGroups', 'Activities', 'Users']
        ]);

        $this->set('assignment', $assignment);
        $this->set('_serialize', ['assignment']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $assignment = $this->Assignments->newEntity();
        if ($this->request->is('post')) {
            $assignment = $this->Assignments->patchEntity($assignment, $this->request->data);
            if ($this->Assignments->save($assignment)) {
                $this->Flash->success(__('The assignment has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The assignment could not be saved. Please, try again.'));
            }
        }
        $activitiesGroups = $this->Assignments->ActivitiesGroups->find('list', ['limit' => 200]);
        $activities = $this->Assignments->Activities->find('list', ['limit' => 200]);
        $users = $this->Assignments->Users->find('list', ['limit' => 200]);
        $this->set(compact('assignment', 'activitiesGroups', 'activities', 'users'));
        $this->set('_serialize', ['assignment']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Assignment id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $assignment = $this->Assignments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $assignment = $this->Assignments->patchEntity($assignment, $this->request->data);
            if ($this->Assignments->save($assignment)) {
                $this->Flash->success(__('The assignment has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The assignment could not be saved. Please, try again.'));
            }
        }
        $activitiesGroups = $this->Assignments->ActivitiesGroups->find('list', ['limit' => 200]);
        $activities = $this->Assignments->Activities->find('list', ['limit' => 200]);
        $users = $this->Assignments->Users->find('list', ['limit' => 200]);
        $this->set(compact('assignment', 'activitiesGroups', 'activities', 'users'));
        $this->set('_serialize', ['assignment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Assignment id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $assignment = $this->Assignments->get($id);
        if ($this->Assignments->delete($assignment)) {
            $this->Flash->success(__('The assignment has been deleted.'));
        } else {
            $this->Flash->error(__('The assignment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function submit($idGA = null)
    {	
    	/* $id = $assignments ->find('all', [
    		'conditions' => ['Assignments.activities_group_id >' => $idGA , 
    							'Assignments.user_id >' => $this->Auth->user('id')],
    			'contain' => ['id']
		]);
    	$assignment = $this->Assignments->get($id, [
    			'contain' => []
    	]);
        $assignment = $this->Assignments->patchEntity($assignment, $this->request->data);
        if ($this->Assignments->save($assignment)) {
        	$this->Flash->success(__('The assignment has been saved.'));
            return $this->redirect(['action' => 'index']);
        } else {
        	$this->Flash->error(__('The assignment could not be saved. Please, try again.'));
        }
       
        $this->set(compact('assignment'));
        $this->set('_serialize', ['assignment']); */
    }
}
