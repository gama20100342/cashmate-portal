<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {
	
	public $components = array('Paginator', 'Common');
	
	function beforeFilter(){	
		parent::beforeFilter();
		$this->set('breadcrumbs', $this->Common->setBreadcrumb(isset($this->params['url']['url']) ? $this->params['url']['url'] : ''));
		$this->Auth->allow('api_login_45HYshAkl_oriITkasli231mnaso_1jkk_p3993', 'logout_api_connect');
    }
	
	public function logout_api_connect(){
		$this->layout = 'ajax';
		$this->autoRender = false;
		$this->view = false;
		
		if($this->request->is('put')){
			if($this->Auth->logout()){
					$response = array(
						"code" => 200,
						"message"  =>"Account successfully logout"
					);
			}else{
				$response = array(
						"code" => 400,
						"message"  =>"Invalid request"
					);
			}
					
		}else{
			$response = array(
						"code" => 400,
						"message"  =>"Invalid request Initiate"
					);
		}
		echo json_encode($response);
		
	}
	
	public function checkPasswordExpiration(){
		
	}
	
	
	
	
	public function api_login_45HYshAkl_oriITkasli231mnaso_1jkk_p3993(){
	
		$this->layout = 'ajax';		
		$this->view = 'api_login';
		
		if($this->request->is('post')){				
				
				if(isset($this->request->data['username']) && !empty($this->request->data['username']) && isset($this->request->data['password']) && !empty($this->request->data['password'])){
					$this->request->data['User']['username']= $this->request->data['username'];
					$this->request->data['User']['password']= $this->request->data['password'];
			
					if ($this->Auth->login()) {					
						$response = array(
							"success" => true,
							"code" => 200, 
							"message"  => "Login Successfull",
							"user_details" => array(
								"userid" => $this->Auth->user('id'),
								"username" => $this->Auth->user('username'),
								"firstname" => $this->Auth->user('firstname'),
								"lastname" => $this->Auth->user('lastname'),
								"refid" => $this->Auth->user('refid'),
								"terminal_id" => $this->Auth->user('terminal_id')
							)
						);
						
						$this->Auth->logout();
					} else {
						
						$response = array(
							"success" => false,
							"code" => 400, 
							"message"  => "Login failed, invalid credentials. Please try again."
						);

					}
				}else{
					$response = array(
						"success" => false,
						"code" => 500, 
						"message"  => "Request data is empty"
					);
				}
				
		}else{
				$response = array(
						"success" => false,
						"code" => 500, 
						"message"  => "Invalid request."
					);
		}
		
		$this->set('response', $response);
	}
	
/**
 * Components
 *
 * @var array
 */
	

	/*-------LOGIN RELATED FOR UPDATES-----*/

	public function isAuthorized($user) {
		if ($this->action === 'add') {
			return true;
		}
	
		/*
		if (in_array($this->action, array('edit', 'delete'))) {
			$postId = (int) $this->request->params['pass'][0];
			if ($this->Post->isOwnedBy($postId, $user['id'])) {
				return true;
			}
		}*/
	
		return parent::isAuthorized($user);
	}

	public function loggeduser($id=null){
		$id = $this->Auth->user('id');
		$user = $this->User->findById($id);			
		if(isset($this->params['requested'])){
			return $user;
		}
	}
		
	public function login() {
		$this->layout = ('login');
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect(array('controller' => 'cards', 'action' => 'dashboard'));
			} else {
 				$this->Session->setFlash('Login failed. Invalid credentials.', 'error_login');
			}
		}
	}

	public function idle_warning(){
		$this->layout = 'ajax';
		$this->autoRender = false;		
		if($this->request->is('ajax')){
			if($this->Auth->logout()){
				$this->Session->destroy();
				return json_encode(array("message" => "logout"));
			}else{
				return json_encode(array("message" => "failed"));
			}
			
		}
	}
		
	public function logout(){
		return $this->redirect($this->Auth->logout());
	}


	public function dashboard(){

	}

	/*----END OF LOGIN--*/
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		$this->set('refid', $this->Common->generateRandomString(12));

		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				//$this->Session->setFlash(__('The user has been saved.'));
				$this->Message->msgSuccess("New access has been successfully registered");
				return $this->redirect(array('controller' => 'useravatars', 'action' => 'add', $this->data['User']['refid'], $this->data['User']['firstname'], $this->data['User']['lastname']));
			} else {
				//$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
				$this->Message->msgCommonError();
			}
		}

		$groups = $this->User->Group->find('list');
		$terminals = $this->User->Terminal->find('list');
		$this->set(compact('groups', 'terminals'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				//$this->Session->setFlash(__('The user has been saved.'));
				$this->Message->msgCommonUpdate();
				return $this->redirect(array('action' => 'index'));
			} else {
				//$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
				$this->Message->msgCommonError();
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list');
		$terminals = $this->User->Terminal->find('list');
		$this->set(compact('groups', 'terminals'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

 /*
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}*/
}
