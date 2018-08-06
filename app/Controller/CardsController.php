<?php
App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');

/**
 * Cards Controller
 *
 * @property Card $Card
 * @property PaginatorComponent $Paginator
 */
class CardsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Common');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Card->recursive = 0;
		$this->set('cards', $this->Paginator->paginate());
	}
	
	
	public function dashboard(){
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $cardno=null) {
		if (!$this->Card->exists($id)) {
			throw new NotFoundException(__('Invalid card'));
		}
		
		if($this->checkCardStatus($id, $cardno)){
			$options = array('conditions' => array('Card.' . $this->Card->primaryKey => $id));
			$this->set('card', $this->Card->find('first', $options));
			
			
		}else{
			throw new NotFoundException(__('Invalid card'));
		}
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Card->create();
			if ($this->Card->save($this->request->data)) {
				$this->Session->setFlash(__('The card has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The card could not be saved. Please, try again.'));
			}
		}
		$cardapplications = $this->Card->Cardapplication->find('list');
		$cardstatuses = $this->Card->Cardstatus->find('list');
		$cardtypes = $this->Card->Cardtype->find('list');
		$currencies = $this->Card->Currency->find('list');
		$this->set(compact('cardapplications', 'cardstatuses', 'cardtypes', 'currencies'));
	}
	
	public function add_card_account($id, $firstname, $lastname, $refid){
		
		if(!$this->Card->Cardholder->exists($id) || !$this->checkCardHolderExists($id, $firstname, $lastname, $refid)){
			throw new NotFoundException(__('Due to some security issue, the system canceled your request. Please try again.'));
		}
		
		$this->set('cardholder', $this->checkCardHolderExists($id, $firstname, $lastname, $refid, "details"));
		$this->set('refid', $this->Common->generateRandomString(12));
		$this->set('pin', $this->Common->generate_pin());
		
		$ds_card		= $this->Card->getdatasource();		
		$ds_application	= $this->Card->Cardapplication->getdatasource();		
		
			if ($this->request->is('post')) {
					//$this->Card->Cardapplication->create();
					if($this->Card->Cardapplication->save(
						array(
							'Cardapplication' => array(
								'cardstatus_id' => $this->data['Card']['cardstatus_id'],
								'user_id'		=> $this->Auth->user('id'),							
								'terminal_id'	=> $this->Auth->user('terminal_id'),
								'refid'			=> $this->data['Card']['refid']
							)
						))){
							
							//$this->Card->create();
							if($this->Card->save(
								array(
									'Card'	=> array(
										'cardapplication_id' => $this->Card->Cardapplication->getLastInsertId(),
										'cardholder_id'		 => $id,
										'cardno'			 => $this->data['Card']['cardno'],
										'cardstatus_id'		 => $this->data['Card']['cardstatus_id'],	
										'cardtype_id'		 => $this->data['Card']['cardtype_id'],						
										'pincode'			 => $this->data['Card']['pincode'],
										'balance'			 => $this->data['Card']['balance'],
										'currency_id'		 => $this->data['Card']['currency_id'],
										'refid'				 => $this->data['Card']['refid']
									)
							))){
								
								//if ($this->Card->save($this->request->data)) {								
								$this->Message->msgSuccess("New card has been registered to ".$firstname.' '.$lastname);
								return $this->redirect(array('action' => 'index'));
								
								$ds_application->commint();
								$ds_card->commint();
								
							} else {								
								$ds_application->rollback();
								$ds_card->rollback();
								
								$this->Message->msgError($this->data['Card']['cardno']);
							
							}
						
					}else{
						$ds_application->rollback();
						//$ds_card->rollback();
						$this->Message->msgError("Unable to save card details, please try again.");
					}
		
			}
			
			//$cardapplications = $this->Card->Cardapplication->find('list');
			$cardstatuses = $this->Card->Cardstatus->find('list');
			$cardtypes = $this->Card->Cardtype->find('list');
			$currencies = $this->Card->Currency->find('list');
			$this->set(compact('cardstatuses', 'cardtypes', 'currencies'));
			
	}
	
	public function checkCardHolderExists($id, $firstname, $lastname, $refid, $return=null){
		$cardholder = $this->Card->Cardholder->find('first', array('conditions' => array(
					'Cardholder.id' => $id,
					'Cardholder.firstname' => $firstname,
					'Cardholder.lastname' => $lastname,
					'Cardholder.refid' => $refid
				)
			)
		);
		
		
		if(!empty($cardholder)){
			if(isset($return) && !empty($return) && $return=="details"){
				return $cardholder;
			}else{
				return true;
			}
		}else{
			return false;
		}

	}
	
	function checkCardStatus($cardid, $cardno){
		if (!$this->Card->exists($cardid)) {
			throw new NotFoundException(__('Invalid card'));
		}	
		
		$account_exists = $this->Card->find('first', array(
			'conditions' => array(
				'Card.id' 		=> $cardid,
				'Card.cardno' 	=> $cardno
			)
		));
		
		if(!empty($account_exists)){
			return true;
		}else{
			return false;
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Card->exists($id)) {
			throw new NotFoundException(__('Invalid card'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Card->save($this->request->data)) {
				$this->Message->msgSuccess("Card has been successfully loaded.");
				return $this->redirect(array('action' => 'view', $id));
			} else {
				$this->Message->msgError("Unable to load the card, please try again.");
			}
		} else {
			$options = array('conditions' => array('Card.' . $this->Card->primaryKey => $id));
			$this->request->data = $this->Card->find('first', $options);
		}
		
		//$cardapplications = $this->Card->Cardapplication->find('list');
		$cardstatuses = $this->Card->Cardstatus->find('list');
		$cardtypes = $this->Card->Cardtype->find('list');
		$currencies = $this->Card->Currency->find('list');
		$this->set(compact('cardstatuses', 'cardtypes', 'currencies'));
	}
	
	private function getCardBalance($id = null, $cardno=null, $field=null){
		$this->Card->recursive = -1;
		
		if (!$this->Card->exists($id) || !$this->checkCardStatus($id, $cardno)) {
			throw new NotFoundException(__('Invalid card'));
		}	
		
		
		$balance = $this->Card->find('first', array(
			'conditions' => array(
				'Card.id' 		=> $id,
				'Card.cardno' 	=> $cardno
			)
		));
		
		return $balance['Card'][$field];
	}
	
	
	public function loadCard($id = null, $cardno=null) {		
			if (!$this->Card->exists($id) || !$this->checkCardStatus($id, $cardno)) {
				throw new NotFoundException(__('Invalid card'));
			}

			$this->view = 'load-card';			
			//get card balance		
			if ($this->request->is(array('post', 'put'))) {
				$current_balance = $this->getCardBalance($id, $cardno, 'balance');
				$this->Card->id = $id;								
				$newbalance = ($current_balance + $this->data['Card']['new_balance']);
				//save load transaction
				
				if ($this->Card->saveField('balance', $newbalance)) {
					//save load transactions
					/*$fields = array(
						'Transloadcash' => array(
							'transactiontype_id' => '',
						)
					);*/

					$this->Message->msgSuccess("Card has been successfully loaded.");
					return $this->redirect(array('action' => 'view', $id, $cardno));
				} else {
					$this->Message->msgError("Could not load the card, please try again.");
				}
			} else {
				
				$options = array('conditions' => array('Card.id' => $id));
				$this->set('card', $this->Card->find('first', $options));
			}
					
		
		
	}
	

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	
	/*public function delete($id = null) {
		$this->Card->id = $id;
		if (!$this->Card->exists()) {
			throw new NotFoundException(__('Invalid card'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Card->delete()) {
			$this->Session->setFlash(__('The card has been deleted.'));
		} else {
			$this->Session->setFlash(__('The card could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}*/
}
