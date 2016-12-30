<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\I18n;

I18n::locale('es');

/**
 * OAuthConsumers Controller
 *
 * @property \App\Model\Table\OAuthConsumersTable $OAuthConsumers
 * 
 * No se incluye metodo view, 
 * son solo dos campos que se visulizan en index
 */
class OAuthConsumersController extends AppController
{

    /**
     * Index method
     * Muetsra listado de consumidores
     *
     * @return \Cake\Network\Response|null
     * OK
     */
    public function index()
    {
        $oAuthConsumers = $this->paginate($this->OAuthConsumers);

        $this->set(compact('oAuthConsumers'));
        $this->set('_serialize', ['oAuthConsumers']);
    }

    /**
     * Add method
     * Agrega un consumidor
     * Retorna a index
     * 
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     * OK
     */
    public function add()
    {
        $oAuthConsumer = $this->OAuthConsumers->newEntity();
        if ($this->request->is('post')) {
            $oAuthConsumer = $this->OAuthConsumers->patchEntity($oAuthConsumer, $this->request->data);
            if ($this->OAuthConsumers->save($oAuthConsumer)) {
                $this->Flash->success(__('The o auth consumer has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The o auth consumer could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('oAuthConsumer'));
        $this->set('_serialize', ['oAuthConsumer']);
    }

    /**
     * Edit method
     * Edita consumidor existente
     * Retorna a index
     *
     * @param string|null $id O Auth Consumer id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     * OK
     */
    public function edit($id = null)
    {
        $oAuthConsumer = $this->OAuthConsumers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $oAuthConsumer = $this->OAuthConsumers->patchEntity($oAuthConsumer, $this->request->data);
            if ($this->OAuthConsumers->save($oAuthConsumer)) {
                $this->Flash->success(__('The o auth consumer has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The o auth consumer could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('oAuthConsumer'));
        $this->set('_serialize', ['oAuthConsumer']);
    }

    /**
     * Delete method
     * Elimina un consumidor, si sellciona Aceptar
     *
     * @param string|null $id O Auth Consumer id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * OK
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $oAuthConsumer = $this->OAuthConsumers->get($id);
        if ($this->OAuthConsumers->delete($oAuthConsumer)) {
            $this->Flash->success(__('The o auth consumer has been deleted.'));
        } else {
            $this->Flash->error(__('The o auth consumer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
