<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Grades Controller
 *
 * @property \App\Model\Table\GradesTable $Grades
 */
class GradesController extends AppController
{

    /**
     * View method
     *
     * @param string|null $id Grade id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($submission_id = null)
    {
    	$grades_table = TableRegistry::get('Grades');
    	$grades = $grades_table->find()->where(['Grades.submission_id' => $submission_id])->contain(['Users','Submissions', 'RubricCriterias'])->all();
    	$this->set(['grades' => $grades]);
    	$this->set('_serialize', ['grades']);
		// entrega
    	$submissions = TableRegistry::get('Submissions');
    	$submission = $submissions->find()->where(['Submissions.id' => $submission_id])->contain(['Users','Activities'])->first();
    	$this->set(['submission' => $submission]);
    	$this->set('_serialize', ['submission']);

    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $grade = $this->Grades->newEntity();
        if ($this->request->is('post')) {
            $grade = $this->Grades->patchEntity($grade, $this->request->data);
            if ($this->Grades->save($grade)) {
                $this->Flash->success(__('El puntaje se ha guardado.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('El puntaje no se ha guardado. Por favor, intente nuevamente.'));
            }
        }
        $users = $this->Grades->Users->find('list', ['limit' => 200]);
        $submissions = $this->Grades->Submissions->find('list', ['limit' => 200]);
        $rubricCriterias = $this->Grades->RubricCriterias->find('list', ['limit' => 200]);
        $this->set(compact('grade', 'users', 'submissions', 'rubricCriterias'));
        $this->set('_serialize', ['grade']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Grade id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $grade = $this->Grades->get($id, [
            'contain' => []
        ]);
        $levels = TableRegistry::get('RubricLevels');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $grade = $this->Grades->patchEntity($grade, $this->request->data);
            $level = $levels->find()->where(['id' => $grade->level_id])->first();
            $grade->score = $level->score;
            if ($this->Grades->save($grade)) {
                $this->Flash->success(__('El puntaje se ha guardado.'));
                return $this->redirect(['controller' => 'Rubrics', 'action' => 'apply_rubric', $grade->submission_id]);
            } else {
                $this->Flash->error(__('El puntaje no se ha guardado. Por favor, intente nuevamente.'));
            }
        }
        $criteria = $this->Grades->find()->select(['criteria_id'])->where(['id' => $id])->first();
        $radio = $this->Grades->RubricCriterias->RubricLevels
        	->find()
        	->where(['rubric_criteria_id' => $criteria->criteria_id])
        	->combine('id', 'definition');
        $this->set(compact('grade', 'radio', 'title'));
        $this->set('_serialize', ['grade']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Grade id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $grade = $this->Grades->get($id);
        if ($this->Grades->delete($grade)) {
            $this->Flash->success(__('Se ha eliminado.'));
        } else {
            $this->Flash->error(__('No se ha eliminado. Por favor, intente nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
}
