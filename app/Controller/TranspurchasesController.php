<?php
App::uses('AppController', 'Controller');
/**
 * Transpurchases Controller
 *
 * @property Transpurchase $Transpurchase
 * @property PaginatorComponent $Paginator
 */
class TranspurchasesController extends AppController {

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
				$trans = $this->Transpurchase->find('all', array(
						'conditions' => array(
							'Transpurchase.cardno' => $cardno
						),
						'order' => array(
							'Transpurchase.transdate' => 'DESC'
						),
					)
				);
				
				if($trans){
						$data = array();
					
						if(count($trans) > 0){
							$data = array();
							foreach($trans as $t):
								$data[] = array(
									$t['Transpurchase']['terminal_id'],
									date('Y M d h:i A', strtotime($t['Transpurchase']['transdate'])),																		
									number_format($t['Transpurchase']['current_balance'], 2, ".", ","),	
									number_format($t['Transpurchase']['total_amount'], 2, ".", ","),									
									number_format($t['Transpurchase']['remaining_balance'], 2, ".", ","),
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
		if(!$this->Transpurchase->Card->findByCardno($cardno)){
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
		$this->Transpurchase->recursive = 0;
		$this->set('transpurchases', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Transpurchase->exists($id)) {
			throw new NotFoundException(__('Invalid transpurchase'));
		}
		$options = array('conditions' => array('Transpurchase.' . $this->Transpurchase->primaryKey => $id));
		$this->set('transpurchase', $this->Transpurchase->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Transpurchase->create();
			if ($this->Transpurchase->save($this->request->data)) {
				$this->Session->setFlash(__('The transpurchase has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transpurchase could not be saved. Please, try again.'));
			}
		}
		$transactiontypes = $this->Transpurchase->Transactiontype->find('list');
		$users = $this->Transpurchase->User->find('list');
		$cards = $this->Transpurchase->Card->find('list');
		$cardholders = $this->Transpurchase->Cardholder->find('list');
		$terminals = $this->Transpurchase->Terminal->find('list');
		$postations = $this->Transpurchase->Postation->find('list');
		$atmstations = $this->Transpurchase->Atmstation->find('list');
		$statuses = $this->Transpurchase->Status->find('list');
		$this->set(compact('transactiontypes', 'users', 'cards', 'cardholders', 'terminals', 'postations', 'atmstations', 'statuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Transpurchase->exists($id)) {
			throw new NotFoundException(__('Invalid transpurchase'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Transpurchase->save($this->request->data)) {
				$this->Session->setFlash(__('The transpurchase has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transpurchase could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Transpurchase.' . $this->Transpurchase->primaryKey => $id));
			$this->request->data = $this->Transpurchase->find('first', $options);
		}
		$transactiontypes = $this->Transpurchase->Transactiontype->find('list');
		$users = $this->Transpurchase->User->find('list');
		$cards = $this->Transpurchase->Card->find('list');
		$cardholders = $this->Transpurchase->Cardholder->find('list');
		$terminals = $this->Transpurchase->Terminal->find('list');
		$postations = $this->Transpurchase->Postation->find('list');
		$atmstations = $this->Transpurchase->Atmstation->find('list');
		$statuses = $this->Transpurchase->Status->find('list');
		$this->set(compact('transactiontypes', 'users', 'cards', 'cardholders', 'terminals', 'postations', 'atmstations', 'statuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Transpurchase->id = $id;
		if (!$this->Transpurchase->exists()) {
			throw new NotFoundException(__('Invalid transpurchase'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Transpurchase->delete()) {
			$this->Session->setFlash(__('The transpurchase has been deleted.'));
		} else {
			$this->Session->setFlash(__('The transpurchase could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
