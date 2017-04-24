<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\I18n;

I18n::locale('es');

/**
 * Groups Controller
 *
 * @property \App\Model\Table\GroupsTable $Groups
 */
class GroupsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Activities']
        ];
        $groups = $this->paginate($this->Groups);

        $this->set(compact('groups'));
        $this->set('_serialize', ['groups']);
    }

    /**
     * View method
     *
     * @param string|null $actv_id Activity id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * 
     */
    public function view($actv_id = null)
    {
    	$activities = TableRegistry::get('Activities');
    	$this->set('activity', $activities->get($actv_id));
		
    	$this->set('groups',$this->Groups->find()
    								->where(['activity_id' => $actv_id]));
    	$this->set('_serialize', ['groups']);
    	
    	$users = TableRegistry::get('Users');
    	$this->set('users', $users->find());

    	$assignments = $this->Groups->Assignments->find()
    			->where(['Groups.activity_id' => $actv_id])
    			->contain(['Groups','Users'])
    			->toArray();
    	$this->set('assignments', $assignments);
    	$this->set('_serialize', ['assignments']);
    	
    	//Primer combobox
    	//$this->set('names', $this->Groups->find('list')->where(['activity_id' => $actv_id]));
    	
    	/**
    	 * Add in modal 1
    	 */
    	$save_group = $this->Groups->newEntity($this->request->data());
    	
    	if ($this->request->is('post')) {
    		$save_group = $this->Groups->patchEntity($save_group, $this->request->data);
    		$save_group->activity_id = $actv_id;
    	
    		if ($this->Groups->save($save_group)) {
    			$this->Flash->success(__('The group has been saved.'));
    		}
    	}
    	
    	/**
    	 * Add in modal 2
    	 */
    	//if ($)
    	/*$save_assignment = $this->Groups->Assignments->get($id, [
    			'contain' => []
    	]);
    	 
    	if ($this->request->is('post')) {
    		$save_assignment = $this->Groups->patchEntity($save_assignment, $this->request->data);
    		$save_assignment->activity_id = $actv_id;
    		 
    		if ($this->Groups->save($save_assignment)) {
    			$this->Flash->success(__('The group has been saved.'));
    		}
    	}*/
    }
    	
    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $group = $this->Groups->newEntity();
        if ($this->request->is('post')) {
            $group = $this->Groups->patchEntity($group, $this->request->data);
            if ($this->Groups->save($group)) {
                $this->Flash->success(__('The group has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The group could not be saved. Please, try again.'));
            }
        }
        $activities = $this->Groups->Activities->find('list', ['limit' => 200]);
        $this->set(compact('group', 'activities'));
        $this->set('_serialize', ['group']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Group id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $group = $this->Groups->patchEntity($group, $this->request->data);
            if ($this->Groups->save($group)) {
                $this->Flash->success(__('The group has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The group could not be saved. Please, try again.'));
            }
        }
        $activities = $this->Groups->Activities->find('list', ['limit' => 200]);
        $this->set(compact('group', 'activities'));
        $this->set('_serialize', ['group']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Group id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $group = $this->Groups->get($id);
        if ($this->Groups->delete($group)) {
            $this->Flash->success(__('The group has been deleted.'));
        } else {
            $this->Flash->error(__('The group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
