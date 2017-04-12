<?php
namespace App\Controller;

use App\Controller\AppController;

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
    public function view($id = null)
    {
        $grade = $this->Grades->get($id, [
            'contain' => ['Users', 'Submissions', 'Criterias']
        ]);

        $this->set('grade', $grade);
        $this->set('_serialize', ['grade']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($idCriteria = null)
    {
        $grade = $this->Grades->newEntity();
        if ($this->request->is('post')) {
            $grade = $this->Grades->patchEntity($grade, $this->request->data);
            $grade->user_id = $this->Auth->user('id');
            $grade->criteria_id = $idCriteria;
            $grade->submission_id = 1;
            if ($this->Grades->save($grade)) {
                $this->Flash->success(__('The grade has been saved.'));

                return $this->redirect(['controller' => 'Rubrics', 'action' => 'applyRubric', 2]);
            } else {
                $this->Flash->error(__('The grade could not be saved. Please, try again.'));
            }
        }
        $score = $this->Grades->RubricCriterias->RubricLevels->find()->where(['rubric_criteria_id' => $idCriteria])->combine('score', 'definition');
        $this->set(compact('grade', 'score', 'title'));
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
        if ($this->request->is(['patch', 'post', 'put'])) {
            $grade = $this->Grades->patchEntity($grade, $this->request->data);
            if ($this->Grades->save($grade)) {
                $this->Flash->success(__('The grade has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The grade could not be saved. Please, try again.'));
            }
        }
        $users = $this->Grades->Users->find('list', ['limit' => 200]);
        $submissions = $this->Grades->Submissions->find('list', ['limit' => 200]);
        $criterias = $this->Grades->Criterias->find('list', ['limit' => 200]);
        $this->set(compact('grade', 'users', 'submissions', 'criterias'));
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
            $this->Flash->success(__('The grade has been deleted.'));
        } else {
            $this->Flash->error(__('The grade could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
