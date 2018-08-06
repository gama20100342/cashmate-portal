<?php
App::uses('AppController', 'Controller');
/**
 * Transbillspayments Controller
 *
 * @property Transbillspayment $Transbillspayment
 * @property PaginatorComponent $Paginator
 */
class TransbillspaymentsController extends AppController {

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
				$trans = $this->Transbillspayment->find('all', array(
						'conditions' => array(
							'Transbillspayment.cardno' => $cardno
						)
					)
				);
				
				if($trans){
						$data = array();
					
						if(count($trans) > 0){
							$data = array();
							foreach($trans as $t):
								$data[] = array(
									$t['Transbillspayment']['terminal_id'],
									date('Y M d h:i A', strtotime($t['Transbillspayment']['transdate'])),
									$t['Partner']['name'],
									$t['Transbillspayment']['amount_due'],
									$t['Transbillspayment']['total_amount'],
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
		if(!$this->Transbillspayment->Card->findByCardno($cardno)){
			return false;
		}else{
			return true;
		}				
	}
/**

	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Transbillspayment->recursive = 0;
		$this->set('transbillspayments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Transbillspayment->exists($id)) {
			throw new NotFoundException(__('Invalid transbillspayment'));
		}
		$options = array('conditions' => array('Transbillspayment.' . $this->Transbillspayment->primaryKey => $id));
		$this->set('transbillspayment', $this->Transbillspayment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Transbillspayment->create();
			if ($this->Transbillspayment->save($this->request->data)) {
				$this->Session->setFlash(__('The transbillspayment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transbillspayment could not be saved. Please, try again.'));
			}
		}
		$transactiontypes = $this->Transbillspayment->Transactiontype->find('list');
		$cards = $this->Transbillspayment->Card->find('list');
		$cardholders = $this->Transbillspayment->Cardholder->find('list');
		$partners = $this->Transbillspayment->Partner->find('list');
		$terminals = $this->Transbillspayment->Terminal->find('list');
		$postations = $this->Transbillspayment->Postation->find('list');
		$statuses = $this->Transbillspayment->Status->find('list');
		$this->set(compact('transactiontypes', 'cards', 'cardholders', 'partners', 'terminals', 'postations', 'statuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Transbillspayment->exists($id)) {
			throw new NotFoundException(__('Invalid transbillspayment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Transbillspayment->save($this->request->data)) {
				$this->Session->setFlash(__('The transbillspayment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transbillspayment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Transbillspayment.' . $this->Transbillspayment->primaryKey => $id));
			$this->request->data = $this->Transbillspayment->find('first', $options);
		}
		$transactiontypes = $this->Transbillspayment->Transactiontype->find('list');
		$cards = $this->Transbillspayment->Card->find('list');
		$cardholders = $this->Transbillspayment->Cardholder->find('list');
		$partners = $this->Transbillspayment->Partner->find('list');
		$terminals = $this->Transbillspayment->Terminal->find('list');
		$postations = $this->Transbillspayment->Postation->find('list');
		$statuses = $this->Transbillspayment->Status->find('list');
		$this->set(compact('transactiontypes', 'cards', 'cardholders', 'partners', 'terminals', 'postations', 'statuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Transbillspayment->id = $id;
		if (!$this->Transbillspayment->exists()) {
			throw new NotFoundException(__('Invalid transbillspayment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Transbillspayment->delete()) {
			$this->Session->setFlash(__('The transbillspayment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The transbillspayment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
