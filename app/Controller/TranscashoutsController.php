<?php
App::uses('AppController', 'Controller');
/**
 * Transcashouts Controller
 *
 * @property Transcashout $Transcashout
 * @property PaginatorComponent $Paginator
 */
class TranscashoutsController extends AppController {

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
				$trans = $this->Transcashout->find('all', array(
						'conditions' => array(
							'Transcashout.cardno' => $cardno
						)
					)
				);
				
				if($trans){
						$data = array();
					
						if(count($trans) > 0){
							$data = array();
							foreach($trans as $t):
								$data[] = array(
									$t['Transcashout']['terminal_id'],
									date('Y M d h:i A', strtotime($t['Transcashout']['transdate'])),
									number_format($t['Withdrawal']['remaining_balance'], 2, ".", ","),	
									number_format($t['Withdrawal']['cashout_amount'], 2, ".", ","),									
									number_format($t['Withdrawal']['current_balance'], 2, ".", ","),
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
		if(!$this->Transcashout->Card->findByCardno($cardno)){
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
		$this->Transcashout->recursive = 0;
		$this->set('transcashouts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Transcashout->exists($id)) {
			throw new NotFoundException(__('Invalid transcashout'));
		}
		$options = array('conditions' => array('Transcashout.' . $this->Transcashout->primaryKey => $id));
		$this->set('transcashout', $this->Transcashout->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Transcashout->create();
			if ($this->Transcashout->save($this->request->data)) {
				$this->Session->setFlash(__('The transcashout has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transcashout could not be saved. Please, try again.'));
			}
		}
		$transactiontypes = $this->Transcashout->Transactiontype->find('list');
		$cards = $this->Transcashout->Card->find('list');
		$cardholders = $this->Transcashout->Cardholder->find('list');
		$terminals = $this->Transcashout->Terminal->find('list');
		$atmstations = $this->Transcashout->Atmstation->find('list');
		$statuses = $this->Transcashout->Status->find('list');
		$this->set(compact('transactiontypes', 'cards', 'cardholders', 'terminals', 'atmstations', 'statuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Transcashout->exists($id)) {
			throw new NotFoundException(__('Invalid transcashout'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Transcashout->save($this->request->data)) {
				$this->Session->setFlash(__('The transcashout has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transcashout could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Transcashout.' . $this->Transcashout->primaryKey => $id));
			$this->request->data = $this->Transcashout->find('first', $options);
		}
		$transactiontypes = $this->Transcashout->Transactiontype->find('list');
		$cards = $this->Transcashout->Card->find('list');
		$cardholders = $this->Transcashout->Cardholder->find('list');
		$terminals = $this->Transcashout->Terminal->find('list');
		$atmstations = $this->Transcashout->Atmstation->find('list');
		$statuses = $this->Transcashout->Status->find('list');
		$this->set(compact('transactiontypes', 'cards', 'cardholders', 'terminals', 'atmstations', 'statuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Transcashout->id = $id;
		if (!$this->Transcashout->exists()) {
			throw new NotFoundException(__('Invalid transcashout'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Transcashout->delete()) {
			$this->Session->setFlash(__('The transcashout has been deleted.'));
		} else {
			$this->Session->setFlash(__('The transcashout could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
