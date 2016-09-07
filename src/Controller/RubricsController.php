<?php
namespace App\Controller;

use App\Controller\AppController;

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
            'contain' => ['Activities']
        ];
        $rubrics = $this->paginate($this->Rubrics);

        $this->set(compact('rubrics'));
        $this->set('_serialize', ['rubrics']);
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
            'contain' => ['Activities']
        ]);

        $this->set('rubric', $rubric);
        $this->set('_serialize', ['rubric']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rubric = $this->Rubrics->newEntity();
        if ($this->request->is('post')) {
            $rubric = $this->Rubrics->patchEntity($rubric, $this->request->data);
            if ($this->Rubrics->save($rubric)) {
                $this->Flash->success(__('The rubric has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rubric could not be saved. Please, try again.'));
            }
        }
        $activities = $this->Rubrics->Activities->find('list', ['limit' => 200]);
        $this->set(compact('rubric', 'activities'));
        $this->set('_serialize', ['rubric']);
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
            'contain' => []
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
        $activities = $this->Rubrics->Activities->find('list', ['limit' => 200]);
        $this->set(compact('rubric', 'activities'));
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
}
