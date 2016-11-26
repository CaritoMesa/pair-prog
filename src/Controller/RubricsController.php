<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\RubricCriteriasController;
use App\Controller\RubricLevelsController;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\I18n;
use Cake\ORM\TableRegistry;

I18n::locale('es');

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
            'contain' => ['Users']
        ];
        $rubrics = $this->paginate($this->Rubrics);

        $this->set(compact('rubrics'));
        $this->set('_serialize', ['rubrics']);
        /**
         * Add in modal
         */
        $rubricsTable = TableRegistry::get('Rubrics');
        $rubric = $rubricsTable->newEntity($this->request->data());
        
        if ($this->request->is('post')) {
        	$rubric = $this->Rubrics->patchEntity($rubric, $this->request->data);
        	$rubric->user_id = $this->Auth->user('id');
        	 
        	if ($rubricsTable->save($rubric)) {
        		$id = $rubric->id;        
        		$this->Flash->success(__('The rubric has been saved.'));
        		return $this->redirect(['action' => 'view', $id]);
        	}
        }
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
            'contain' => ['RubricCriterias']
        ]);
        
       	$c = $this->Rubrics->RubricCriterias->find()->where(['rubric_id' => $id])->contain(['Rubrics','RubricLevels'])->toArray();
       	//$c = $this->Rubrics->RubricCriterias->RubricLevels->find()->where(['Rubrics.id' => $id])->toArray();
        

		/* foreach ($criteria as $criterias) {
		    debug($criterias);
		    foreach ($criterias->rubric_levels as $levels) {
		    	debug($levels);
		    }
		}
		debug($levels); 
		 */
        $criteria = $this->Rubrics->RubricCriterias->RubricLevels->find()->toArray();
       	//debug($criteria);
       	//$query = TableRegistry::get('RubricLevels')->find()->toArray();
       	//debug($query);
       	//debug($query[0]);
       	
        $this->set([
        		'rubric' => $rubric,
        		'criteria' => $criteria
        ]);
        $this->set('_serialize', ['rubric',
        				'criteria']);
        
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
            'contain' => ['Users', 'Activities', 'RubricCriterias', 'RubricsItems']
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
        $this->set(compact('rubric'));
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
    
    //retornar nivel
    public function level($level_id = null)
    {
    	$rubricLevel = $this->RubricLevels->get($id, [
    			'contain' => ['RubricCriterias']
    	]);
    	$level = $rubricLevel->definition;
    	$this->set($level);
    	 
    }
}
