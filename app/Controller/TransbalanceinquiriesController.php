<?php
App::uses('AppController', 'Controller');
/**
 * Transbalanceinquiries Controller
 *
 * @property Transbalanceinquiry $Transbalanceinquiry
 * @property PaginatorComponent $Paginator
 */
class TransbalanceinquiriesController extends AppController {

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
				$trans = $this->Transbalanceinquiry->find('all', array(
						'conditions' => array(
							'Transbalanceinquiry.cardno' => $cardno
						)
					)
				);
				
				if($trans){
						$data = array();
					
						if(count($trans) > 0){
							$data = array();
							foreach($trans as $t):
								$data[] = array(
									$t['Transbalanceinquiry']['terminal_id'],
									date('Y M d h:i A', strtotime($t['Transbalanceinquiry']['transdate'])),
									//$t['Postation']['name'],
									//$t['Atmstation']['name'],
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
		if(!$this->Transbalanceinquiry->Card->findByCardno($cardno)){
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
		$this->Transbalanceinquiry->recursive = 0;
		$this->set('transbalanceinquiries', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Transbalanceinquiry->exists($id)) {
			throw new NotFoundException(__('Invalid transbalanceinquiry'));
		}
		$options = array('conditions' => array('Transbalanceinquiry.' . $this->Transbalanceinquiry->primaryKey => $id));
		$this->set('transbalanceinquiry', $this->Transbalanceinquiry->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Transbalanceinquiry->create();
			if ($this->Transbalanceinquiry->save($this->request->data)) {
				$this->Session->setFlash(__('The transbalanceinquiry has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transbalanceinquiry could not be saved. Please, try again.'));
			}
		}
		$transactiontypes = $this->Transbalanceinquiry->Transactiontype->find('list');
		$cards = $this->Transbalanceinquiry->Card->find('list');
		$cardholders = $this->Transbalanceinquiry->Cardholder->find('list');
		$terminals = $this->Transbalanceinquiry->Terminal->find('list');
		$postations = $this->Transbalanceinquiry->Postation->find('list');
		$atmstations = $this->Transbalanceinquiry->Atmstation->find('list');
		$statuses = $this->Transbalanceinquiry->Status->find('list');
		$this->set(compact('transactiontypes', 'cards', 'cardholders', 'terminals', 'postations', 'atmstations', 'statuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Transbalanceinquiry->exists($id)) {
			throw new NotFoundException(__('Invalid transbalanceinquiry'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Transbalanceinquiry->save($this->request->data)) {
				$this->Session->setFlash(__('The transbalanceinquiry has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transbalanceinquiry could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Transbalanceinquiry.' . $this->Transbalanceinquiry->primaryKey => $id));
			$this->request->data = $this->Transbalanceinquiry->find('first', $options);
		}
		$transactiontypes = $this->Transbalanceinquiry->Transactiontype->find('list');
		$cards = $this->Transbalanceinquiry->Card->find('list');
		$cardholders = $this->Transbalanceinquiry->Cardholder->find('list');
		$terminals = $this->Transbalanceinquiry->Terminal->find('list');
		$postations = $this->Transbalanceinquiry->Postation->find('list');
		$atmstations = $this->Transbalanceinquiry->Atmstation->find('list');
		$statuses = $this->Transbalanceinquiry->Status->find('list');
		$this->set(compact('transactiontypes', 'cards', 'cardholders', 'terminals', 'postations', 'atmstations', 'statuses'));
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
		$this->Transbalanceinquiry->id = $id;
		if (!$this->Transbalanceinquiry->exists()) {
			throw new NotFoundException(__('Invalid transbalanceinquiry'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Transbalanceinquiry->delete()) {
			$this->Session->setFlash(__('The transbalanceinquiry has been deleted.'));
		} else {
			$this->Session->setFlash(__('The transbalanceinquiry could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}*/
	
}
