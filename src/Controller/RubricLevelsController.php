<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\I18n;
use Cake\ORM\TableRegistry;

I18n::locale('es');

/**
 * RubricLevels Controller
 *
 * @property \App\Model\Table\RubricLevelsTable $RubricLevels
 */
class RubricLevelsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['RubricCriterias']
        ];
        $rubricLevels = $this->paginate($this->RubricLevels);

        $this->set(compact('rubricLevels'));
        $this->set('_serialize', ['rubricLevels']);
    }

    /**
     * View method
     *
     * @param string|null $id Rubric Level id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rubricLevel = $this->RubricLevels->get($id, [
            'contain' => ['RubricCriterias']
        ]);

        $this->set('rubricLevel', $rubricLevel);
        $this->set('_serialize', ['rubricLevel']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($criteria_id = null)
    {
        $rubricLevel = $this->RubricLevels->newEntity();
        if ($this->request->is('post')) {
            $rubricLevel = $this->RubricLevels->patchEntity($rubricLevel, $this->request->data);
            $rubricLevel->rubric_criteria_id = $criteria_id;
            $criteriasTable = TableRegistry::get('RubricCriterias');
            $criteria = $criteriasTable->find()->where(['id' => $criteria_id])->first();
            if ($this->RubricLevels->save($rubricLevel)) {
                $this->Flash->success(__('The rubric level has been saved.'));
                return $this->redirect(['controller' => 'Activities', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The rubric level could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('rubricLevel'));
        $this->set('_serialize', ['rubricLevel']);
        $this->set('rubric_id', $criteria->rubric_id);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rubric Level id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rubricLevel = $this->RubricLevels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rubricLevel = $this->RubricLevels->patchEntity($rubricLevel, $this->request->data);
            if ($this->RubricLevels->save($rubricLevel)) {
                $this->Flash->success(__('The rubric level has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rubric level could not be saved. Please, try again.'));
            }
        }
        $rubricCriterias = $this->RubricLevels->RubricCriterias->find('list', ['limit' => 200]);
        $this->set(compact('rubricLevel', 'rubricCriterias'));
        $this->set('_serialize', ['rubricLevel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rubric Level id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rubricLevel = $this->RubricLevels->get($id);
        if ($this->RubricLevels->delete($rubricLevel)) {
            $this->Flash->success(__('The rubric level has been deleted.'));
        } else {
            $this->Flash->error(__('The rubric level could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    
    
}
