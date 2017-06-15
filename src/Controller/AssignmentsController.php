<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\I18n;

I18n::locale('es');


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
            'contain' => ['Users', 'Groups']
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
            'contain' => ['Users', 'Groups']
        ]);

        $this->set('assignment', $assignment);
        $this->set('_serialize', ['assignment']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($group_id = null)
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
        $users = $this->Assignments->Users->find('list', ['limit' => 200]);
        $groups = $this->Assignments->Groups->find('list', ['limit' => 200]);
        $this->set(compact('assignment', 'users', 'groups'));
        $this->set('_serialize', ['assignment']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Assignment id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     * 
     */
    public function edit($group_id = null)
    {
    	$groups = TableRegistry::get('Groups');
    	$group = $groups->get($group_id);
    	$this->set('group', $group);
    	
    	$assignments = $this->Assignments->find()
    				->where(['group_id' => $group_id])
    				->contain(['Users','Groups','Roles']);
    	$this->set('assignments', $assignments); 
    	
        /**
         * Add in modal 1
         */
        $save_participant = $this->Assignments->newEntity($this->request->data());
         
        if ($this->request->is('post')) {
        	$save_participant = $this->Assignments->patchEntity($save_participant, $this->request->data);
        	$save_participant->group_id = $group_id;
        	if ($this->Assignments->save($save_participant)) {
        		$this->Flash->success(__('The participant has been saved.'));
        	}
        }
        //$users = $this->Assignments->Users->find('list');
        $users = $this->Assignments->Users->find('list');
        $roles = $this->Assignments->Roles->find('list');
        $this->set(compact('assignment', 'users', 'roles'));
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

        return $this->redirect(['controller' => 'Assignments', 'action' => 'edit', $assignment->group_id]);
    }
}
