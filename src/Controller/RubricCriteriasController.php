<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RubricCriterias Controller
 *
 * @property \App\Model\Table\RubricCriteriasTable $RubricCriterias
 */
class RubricCriteriasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Rubrics']
        ];
        $rubricCriterias = $this->paginate($this->RubricCriterias);

        $this->set(compact('rubricCriterias'));
        $this->set('_serialize', ['rubricCriterias']);
    }

    /**
     * View method
     *
     * @param string|null $id Rubric Criteria id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rubricCriteria = $this->RubricCriterias->get($id, [
            'contain' => ['Rubrics', 'RubricLevels']
        ]);

        $this->set('rubricCriteria', $rubricCriteria);
        $this->set('_serialize', ['rubricCriteria']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rubricCriteria = $this->RubricCriterias->newEntity();
        if ($this->request->is('post')) {
            $rubricCriteria = $this->RubricCriterias->patchEntity($rubricCriteria, $this->request->data);
            if ($this->RubricCriterias->save($rubricCriteria)) {
                $this->Flash->success(__('The rubric criteria has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rubric criteria could not be saved. Please, try again.'));
            }
        }
        $rubrics = $this->RubricCriterias->Rubrics->find('list', ['limit' => 200]);
        $this->set(compact('rubricCriteria', 'rubrics'));
        $this->set('_serialize', ['rubricCriteria']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rubric Criteria id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rubricCriteria = $this->RubricCriterias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rubricCriteria = $this->RubricCriterias->patchEntity($rubricCriteria, $this->request->data);
            if ($this->RubricCriterias->save($rubricCriteria)) {
                $this->Flash->success(__('The rubric criteria has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rubric criteria could not be saved. Please, try again.'));
            }
        }
        $rubrics = $this->RubricCriterias->Rubrics->find('list', ['limit' => 200]);
        $this->set(compact('rubricCriteria', 'rubrics'));
        $this->set('_serialize', ['rubricCriteria']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rubric Criteria id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rubricCriteria = $this->RubricCriterias->get($id);
        if ($this->RubricCriterias->delete($rubricCriteria)) {
            $this->Flash->success(__('The rubric criteria has been deleted.'));
        } else {
            $this->Flash->error(__('The rubric criteria could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
