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
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Submissions', 'RubricCriterias']
        ];
        $grades = $this->paginate($this->Grades);

        $this->set(compact('grades'));
        $this->set('_serialize', ['grades']);
    }

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
            'contain' => ['Users', 'Submissions', 'RubricCriterias']
        ]);

        $this->set('grade', $grade);
        $this->set('_serialize', ['grade']);
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
                $this->Flash->success(__('The grade has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The grade could not be saved. Please, try again.'));
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
        if ($this->request->is(['patch', 'post', 'put'])) {
            $grade = $this->Grades->patchEntity($grade, $this->request->data);
            if ($this->Grades->save($grade)) {
                $this->Flash->success(__('The grade has been saved.'));

                return $this->redirect(['controller' => 'Rubrics', 'action' => 'apply_rubric', $grade->submission_id]);
            } else {
                $this->Flash->error(__('The grade could not be saved. Please, try again.'));
            }
        }
        $criteria = $this->Grades->find()->select(['criteria_id'])->where(['id' => $id])->first();
        $radio = $this->Grades->RubricCriterias->RubricLevels->find()->where(['rubric_criteria_id' => $criteria->criteria_id])->combine('score', 'definition');
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
            $this->Flash->success(__('The grade has been deleted.'));
        } else {
            $this->Flash->error(__('The grade could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
