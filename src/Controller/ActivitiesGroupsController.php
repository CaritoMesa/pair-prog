<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\I18n;
use Cake\Network\Exception\NotFoundException;

I18n::locale('es');

/**
 * ActivitiesGroups Controller
 *
 * @property \App\Model\Table\ActivitiesGroupsTable $ActivitiesGroups
 */
class ActivitiesGroupsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $activitiesGroups = $this->paginate($this->ActivitiesGroups);

        $this->set(compact('activitiesGroups'));
        $this->set('_serialize', ['activitiesGroups']);
    }

    /**
     * View method
     *
     * @param string|null $id Activities Group id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $activitiesGroup = $this->ActivitiesGroups->get($id, [
            'contain' => ['Activities']
        ]);

        $this->set('activitiesGroup', $activitiesGroup);
        $this->set('_serialize', ['activitiesGroup']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $activitiesGroup = $this->ActivitiesGroups->newEntity();
        if ($this->request->is('post')) {
            $activitiesGroup = $this->ActivitiesGroups->patchEntity($activitiesGroup, $this->request->data);
            if ($this->ActivitiesGroups->save($activitiesGroup)) {
                $this->Flash->success(__('The activities group has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The activities group could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('activitiesGroup'));
        $this->set('_serialize', ['activitiesGroup']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Activities Group id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $activitiesGroup = $this->ActivitiesGroups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $activitiesGroup = $this->ActivitiesGroups->patchEntity($activitiesGroup, $this->request->data);
            if ($this->ActivitiesGroups->save($activitiesGroup)) {
                $this->Flash->success(__('The activities group has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The activities group could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('activitiesGroup'));
        $this->set('_serialize', ['activitiesGroup']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Activities Group id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $activitiesGroup = $this->ActivitiesGroups->get($id);
        if ($this->ActivitiesGroups->delete($activitiesGroup)) {
            $this->Flash->success(__('The activities group has been deleted.'));
        } else {
            $this->Flash->error(__('The activities group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function submit($id = null){
    	$activitiesGroup = $this->ActivitiesGroups->get($id, [
    			'contain' => ['Activities']
    	]);
    	/* if ($activitiesGroup('activity_id') === 1)
    	return $this->redirect([
    			'controller' => 'Activities',
    			'action' => 'submit',
                '1'
    	]);
    	 */
    	$this->set('activitiesGroup', $activitiesGroup);
    	$this->set('_serialize', ['activitiesGroup']);
    }
    
}
