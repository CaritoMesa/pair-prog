<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Peers Controller
 *
 * @property \App\Model\Table\PeersTable $Peers
 */
class PeersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $peers = $this->paginate($this->Peers);

        $this->set(compact('peers'));
        $this->set('_serialize', ['peers']);
    }

    /**
     * View method
     *
     * @param string|null $id Peer id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $peer = $this->Peers->get($id, [
            'contain' => []
        ]);

        $this->set('peer', $peer);
        $this->set('_serialize', ['peer']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $peer = $this->Peers->newEntity();
        if ($this->request->is('post')) {
            $peer = $this->Peers->patchEntity($peer, $this->request->data);
            if ($this->Peers->save($peer)) {
                $this->Flash->success(__('The peer has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The peer could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('peer'));
        $this->set('_serialize', ['peer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Peer id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $peer = $this->Peers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $peer = $this->Peers->patchEntity($peer, $this->request->data);
            if ($this->Peers->save($peer)) {
                $this->Flash->success(__('The peer has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The peer could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('peer'));
        $this->set('_serialize', ['peer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Peer id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $peer = $this->Peers->get($id);
        if ($this->Peers->delete($peer)) {
            $this->Flash->success(__('The peer has been deleted.'));
        } else {
            $this->Flash->error(__('The peer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
