<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Localized\Validation\FrValidation;
use Cake\I18n\I18n;

I18n::locale('es');

/**
 * Activities Controller
 *
 * @property \App\Model\Table\ActivitiesTable $Activities
 */
class ActivitiesController extends AppController
{
	
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'ActivitiesGroups', 'Rubrics']
        ];
        $activities = $this->paginate($this->Activities);

        $this->set(compact('activities'));
        $this->set('_serialize', ['activities']);
    }

    /**
     * View method
     *
     * @param string|null $id Activity id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $activity = $this->Activities->get($id, [
            'contain' => ['Users', 'ActivitiesGroups', 'Rubrics', 'Submissions']
        ]);

        $this->set('activity', $activity);
        $this->set('_serialize', ['activity']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
public function add()
    {
        $activity = $this->Activities->newEntity();
        if ($this->request->is('post')) {
            $activity = $this->Activities->patchEntity($activity, $this->request->data);
            $activity->user_id = $this->Auth->user('id');
            if ($this->Activities->save($activity)) {
                $this->Flash->success(__('The activity has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The activity could not be saved. Please, try again.'));
            }
        }
        $activitiesGroups = $this->Activities->ActivitiesGroups->find('list', ['limit' => 200]);
        $this->set(compact('activity', 'activitiesGroups'));
        $this->set('_serialize', ['activity']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Activity id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $activity = $this->Activities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $activity = $this->Activities->patchEntity($activity, $this->request->data);
            if ($this->Activities->save($activity)) {
                $this->Flash->success(__('The activity has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The activity could not be saved. Please, try again.'));
            }
        }
        $activitiesGroups = $this->Activities->ActivitiesGroups->find('list', ['limit' => 200]);
        $rubrics = $this->Activities->Rubrics->find('list', ['limit' => 200]);
        $this->set(compact('activity', 'activitiesGroups', 'rubrics'));
        $this->set('_serialize', ['activity']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Activity id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $activity = $this->Activities->get($id);
        if ($this->Activities->delete($activity)) {
            $this->Flash->success(__('The activity has been deleted.'));
        } else {
            $this->Flash->error(__('The activity could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * metodo para autorizar acceso
     */
    public function display()
    {
    	$path = func_get_args();
    
    	$count = count($path);
    	if (!$count) {
    		return $this->redirect('/');
    	}
    	$page = $subpage = null;
    
    	if (!empty($path[0])) {
    		$page = $path[0];
    	}
    	if (!empty($path[1])) {
    		$subpage = $path[1];
    	}
    	$this->set(compact('page', 'subpage'));
    
    	try {
    		$this->render(implode('/', $path));
    	} catch (MissingTemplateException $e) {
    		if (Configure::read('debug')) {
    			throw $e;
    		}
    		throw new NotFoundException();
    	}
    }
    
    public function isAuthorized($user = null)
    {
    	//El administrador tiene acceso a todo
    	if (parent::isAuthorized($user)) {
    		return true;
    	}
    
    	//Comprueba si los privilegios que el usuario se haya concedido
    	if (!isset($user['has_access_to'])) {
    		return false;
    	}
    
    	$access = $user['has_access_to'];
    
    	$path = $this->request->pass;
    
    	if (!count($path)) {
    		return false;
    	}
    
    	//Dependiendo de cómo se mostrará el material
    	//comprobar si el usuario tiene permisos para
    	if ($path[0] == 'home') {
    		return in_array('home', $access);
    	}
    
    	if ($path[0] == 'material0') {
    		return in_array('material0', $access);
    	}
    
    	if ($path[0] == 'material1') {
    		return in_array('material1', $access);
    	}
    
    	if ($path[0] == 'material2') {
    		return in_array('material2', $access);
    	}
    
    	if ($path[0] == 'material3') {
    		return in_array('material3', $access);
    	}
    
    	if ($path[0] == 'view') {
    		return in_array('view', $access);
    	}
    
    	return false;
    }
   /*  public function isAuthorized($user)
    {
    	//El administrador tiene acceso a todo
    	if (parent::isAuthorized($user)) {
    		return true;
    	}
    	$action = $this->request->params['action'];
    
    	// The add and index actions are always allowed.
    	if (in_array($action, ['index', 'add', 'edit'])) {
    		return true;
    	}
    	// All other actions require an id.
    	if (empty($this->request->params['pass'][0])) {
    		return false;
    	}
    
    	// Check that the bookmark belongs to the current user.
    	$id = $this->request->params['pass'][0];
    	$submissions = $this->Submissions->get($id);
    	if ($submissions->user_id == $user['id']) {
    		return true;
    	}
    	return parent::isAuthorized($user);
    }
    
    public function initialize()
    {
    	$this->loadComponent('Flash');
    	$this->loadComponent('Auth', [
    			'authorize'=> 'Controller',//added this line
    			'authenticate' => [
    					'Form' => [
    							'fields' => [
    									'username' => 'email',
    									'password' => 'password'
    							]
    					]
    			],
    			'loginAction' => [
    					'controller' => 'Users',
    					'action' => 'login'
    			],
    			'unauthorizedRedirect' => $this->referer()
    	]); */
}
