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
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($rubric_id = null)
    {
        $rubricCriteria = $this->RubricCriterias->newEntity();
        if ($this->request->is('post')) {
            $rubricCriteria = $this->RubricCriterias->patchEntity($rubricCriteria, $this->request->data);
            $rubricCriteria->rubric_id = $rubric_id;
            if ($this->RubricCriterias->save($rubricCriteria)) {
                $this->Flash->success(__('The rubric criteria has been saved.'));

                return $this->redirect([
    					'controller' => 'Rubrics',
    					'action' => 'view', $rubric_id
				]);
            } else {
                $this->Flash->error(__('The rubric criteria could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('rubricCriteria'));
        $this->set('_serialize', ['rubricCriteria']);
        $this->set('rubric_id', $rubric_id);
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
                return $this->redirect([
                		'controller' => 'Rubrics', 
                		'action' => 'view', $rubricCriteria->rubric_id
                ]);
            } else {
                $this->Flash->error(__('The rubric criteria could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('rubricCriteria'));
        $this->set('_serialize', ['rubricCriteria']);
        $this->set('rubric_id', $rubricCriteria->rubric_id);
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

        return $this->redirect([
        		'controller' => 'Rubrics',
        		'action' => 'view', $rubricCriteria->rubric_id
        ]);
    }
}
