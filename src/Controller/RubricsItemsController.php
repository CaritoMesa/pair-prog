<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RubricsItems Controller
 *
 * @property \App\Model\Table\RubricsItemsTable $RubricsItems
 */
class RubricsItemsController extends AppController
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
        $rubricsItems = $this->paginate($this->RubricsItems);

        $this->set(compact('rubricsItems'));
        $this->set('_serialize', ['rubricsItems']);
    }

    /**
     * View method
     *
     * @param string|null $id Rubrics Item id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rubricsItem = $this->RubricsItems->get($id, [
            'contain' => ['Rubrics']
        ]);

        $this->set('rubricsItem', $rubricsItem);
        $this->set('_serialize', ['rubricsItem']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rubricsItem = $this->RubricsItems->newEntity();
        if ($this->request->is('post')) {
            $rubricsItem = $this->RubricsItems->patchEntity($rubricsItem, $this->request->data);
            if ($this->RubricsItems->save($rubricsItem)) {
                $this->Flash->success(__('The rubrics item has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rubrics item could not be saved. Please, try again.'));
            }
        }
        $rubrics = $this->RubricsItems->Rubrics->find('list', ['limit' => 200]);
        $this->set(compact('rubricsItem', 'rubrics'));
        $this->set('_serialize', ['rubricsItem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rubrics Item id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rubricsItem = $this->RubricsItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rubricsItem = $this->RubricsItems->patchEntity($rubricsItem, $this->request->data);
            if ($this->RubricsItems->save($rubricsItem)) {
                $this->Flash->success(__('The rubrics item has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rubrics item could not be saved. Please, try again.'));
            }
        }
        $rubrics = $this->RubricsItems->Rubrics->find('list', ['limit' => 200]);
        $this->set(compact('rubricsItem', 'rubrics'));
        $this->set('_serialize', ['rubricsItem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rubrics Item id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rubricsItem = $this->RubricsItems->get($id);
        if ($this->RubricsItems->delete($rubricsItem)) {
            $this->Flash->success(__('The rubrics item has been deleted.'));
        } else {
            $this->Flash->error(__('The rubrics item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
