<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\I18n;

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
        $submission = $this->Submissions->get($id, [
            'contain' => ['Activities', 'Users']
        ]);

        $this->set('submission', $submission);
        $this->set('_serialize', ['submission']);
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
    
    			//return $this->redirect(['action' => 'Activities->submit']);
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
}
