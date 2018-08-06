<?php
App::uses('AppController', 'Controller');
/**
 * Transchangepins Controller
 *
 * @property Transchangepin $Transchangepin
 * @property PaginatorComponent $Paginator
 */
class TranschangepinsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	
	public function getTransactions($cardno = null){
		
		$this->layout = 'ajax';
		$this->autoRender = false;
		$this->view = false;

		
		if($this->request->is('ajax')){
			if (!$this->checkCardExists($cardno)) {
				$response = array(
					'message' => 'Not found',
					'cardno'  => $cardno
				);
			}else{
				$trans = $this->Transchangepin->find('all', array(
						'conditions' => array(
							'Transchangepin.cardno' => $cardno
						),
						'order'	=> array(	
							'Transchangepin.transdate' => 'DESC'
						)
					)
				);
				
				if($trans){
						$data = array();
					
						if(count($trans) > 0){
							$data = array();
							foreach($trans as $t):
								$data[] = array(
									$t['Transchangepin']['terminal_id'],
									date('Y M d h:i A', strtotime($t['Transchangepin']['transdate'])),
									$t['Status']['name']
								);
							endforeach;					
						}
					
						$response = array(
							'status' 	=> 200,
							'message' 	=> 'Success',
							'data'		=> $data
						);
						
				}else{
					$response = $this->Message->respMsg(400);
				}
				
			}
			
			echo json_encode($response);
		}
		
	}
	
	private function checkCardExists($cardno){		
		if(!$this->Transchangepin->Card->findByCardno($cardno)){
			return false;
		}else{
			return true;
		}				
	}
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Transchangepin->recursive = 0;
		$this->set('transchangepins', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Transchangepin->exists($id)) {
			throw new NotFoundException(__('Invalid transchangepin'));
		}
		$options = array('conditions' => array('Transchangepin.' . $this->Transchangepin->primaryKey => $id));
		$this->set('transchangepin', $this->Transchangepin->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Transchangepin->create();
			if ($this->Transchangepin->save($this->request->data)) {
				$this->Session->setFlash(__('The transchangepin has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transchangepin could not be saved. Please, try again.'));
			}
		}
		$transactiontypes = $this->Transchangepin->Transactiontype->find('list');
		$cards = $this->Transchangepin->Card->find('list');
		$cardholders = $this->Transchangepin->Cardholder->find('list');
		$users = $this->Transchangepin->User->find('list');
		$terminals = $this->Transchangepin->Terminal->find('list');
		$statuses = $this->Transchangepin->Status->find('list');
		$this->set(compact('transactiontypes', 'cards', 'cardholders', 'users', 'terminals', 'statuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Transchangepin->exists($id)) {
			throw new NotFoundException(__('Invalid transchangepin'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Transchangepin->save($this->request->data)) {
				$this->Session->setFlash(__('The transchangepin has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transchangepin could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Transchangepin.' . $this->Transchangepin->primaryKey => $id));
			$this->request->data = $this->Transchangepin->find('first', $options);
		}
		$transactiontypes = $this->Transchangepin->Transactiontype->find('list');
		$cards = $this->Transchangepin->Card->find('list');
		$cardholders = $this->Transchangepin->Cardholder->find('list');
		$users = $this->Transchangepin->User->find('list');
		$terminals = $this->Transchangepin->Terminal->find('list');
		$statuses = $this->Transchangepin->Status->find('list');
		$this->set(compact('transactiontypes', 'cards', 'cardholders', 'users', 'terminals', 'statuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Transchangepin->id = $id;
		if (!$this->Transchangepin->exists()) {
			throw new NotFoundException(__('Invalid transchangepin'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Transchangepin->delete()) {
			$this->Session->setFlash(__('The transchangepin has been deleted.'));
		} else {
			$this->Session->setFlash(__('The transchangepin could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
