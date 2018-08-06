<?php
App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');


/**
 * Cardholders Controller
 *
 * @property Cardholder $Cardholder
 * @property PaginatorComponent $Paginator
 */
class CardholdersController extends AppController {

	public $components = array('Paginator');
	public $helpers = array('Lang');
	
	function beforeFilter(){	
		parent::beforeFilter();	
        $this->set('breadcrumbs', $this->Common->setBreadcrumb(isset($this->params['url']['url']) ? $this->params['url']['url'] : 'Home'));
		if($this->params['action']=="home"){
			return $this->redirect(array('action' => 'index'));
		}
    }
	
/**
 * Components
 *
 * @var array
 */
	

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Cardholder->recursive = 2;
		$this->set('cardholders', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cardholder->exists($id)) {
			throw new NotFoundException(__('Invalid cardholder'));
		}
		$options = array('conditions' => array('Cardholder.' . $this->Cardholder->primaryKey => $id));
		$this->set('cardholder', $this->Cardholder->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	
	public function customSave($data){
		$this->begin($this);
		if(!parent::save($data)){
			$this->rollback($this);
			return false;
		}
			
		$this->commit();
		return true;
	}
	
	private function getCardHolderByRefId($refid){
		$this->recursive = -1;
		return $this->Cardholder->findByRefid($refid);		
	}
	
	private function getApplicationByRefId($refid){
		$this->recursive = -1;
		return $this->Cardholder->Card->Cardapplication->findByRefid($refid);		
	}
	
	
	public function add() {
				
		$this->set('refid', $this->Common->generateRandomString(12));
		$this->set('pin', $this->Common->generate_pin());
		
		//get the bank bin for card no.
		/*
		CARD NO GENERATION FORMAT
			first 8 digit - BIN (Bank Identification Number - 56142100)
			next  1 digit - Product Type (1)
			next  6 digit - Sequence
			last  1 digit - Check digit
		 */
		 
		 
		$ds_cardholder	= $this->Cardholder->getdatasource();		
		$ds_card		= $this->Cardholder->Card->getdatasource();		
		$ds_application	= $this->Cardholder->Card->Cardapplication->getdatasource();		
		
		if ($this->request->is('post')) {
			$this->Cardholder->create();
			
			if ($this->Cardholder->save($this->request->data)) {
				
				if($this->Cardholder->Card->Cardapplication->save(
					array(
						'Cardapplication' => array(
							'cardstatus_id' => $this->data['Cardholder']['cardstatus_id'],
							'user_id'		=> $this->Auth->user('id'),
							'terminal_id'	=> $this->Auth->user('terminal_id'),
							'refid'			=> $this->data['Cardholder']['refid']
						)
					))){
						
						$cardno = $this->data['Cardholder']['cardno_1'] . $this->data['Cardholder']['cardno_2'] . $this->data['Cardholder']['cardno_3'] . $this->data['Cardholder']['cardno_4'];
						$holder = $this->getCardHolderByRefId($this->data['Cardholder']['refid']);
						$application = $this->getApplicationByRefId($this->data['Cardholder']['refid']);
						
						if(empty($holder)){
							throw new NotFoundException(__('Unable to get card holder details, please contact the system administrator'));
						}
						
						if($this->Cardholder->Card->save(
							array(
								'Card'	=> array(
									'cardapplication_id' => $application['Cardapplication']['id'],
									'cardholder_id'		 => $holder['Cardholder']['id'],
									'cardno'			 => $cardno,
									'cardstatus_id'		 => $this->data['Cardholder']['cardstatus_id'],
									'cardtype_id'		 => $this->data['Cardholder']['cardtype'],						
									'pincode'			 => $this->data['Cardholder']['pin'],
									'balance'			 => $this->data['Cardholder']['balance'],
									'currency_id'		 => '1',
									'refid'				 => $this->data['Cardholder']['refid']
								)
						))){
							
							$ds_application->commit();
							$ds_cardholder->commit();
							$ds_card->commit();
						
							$this->Session->setFlash($this->Message->showMsg('success_save_normal_data'), 'success_message');
							
						}else{
							$ds_application->rollback();
							$ds_card->rollback();
							$ds_cardholder->rollback();
							//$this->Session->setFlash($this->Message->showMsg('cardholder_second_save'), 'info_message');	
							$this->Message->msgError("Unable card details, please contact the system administrator");
						}
					
				}else{
					$ds_application->rollback();					
					$ds_cardholder->rollback();
					$this->Message->msgError("Unable card application details, please contact the system administrator");
				}
			
				return $this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash($this->Message->showMsg('error_save_normal_data'), 'error_message');
				$ds_cardholder->rollback();
			}
		}
		$cards = $this->Cardholder->Card->find('list');
		$cardstatuses = $this->Cardholder->Card->Cardstatus->find('list');
		$cardtypes = $this->Cardholder->Card->Cardtype->find('list');
		$this->set(compact('cards', 'cardtypes', 'cardstatuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Cardholder->exists($id)) {
			throw new NotFoundException(__('Invalid cardholder'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cardholder->save($this->request->data)) {
				//$this->Session->setFlash(__('The cardholder has been saved.'));
				$this->Message->msgCommonUpdate();
				return $this->redirect(array('action' => 'edit', $id));
			} else {
				//$this->Session->setFlash(__('The cardholder could not be saved. Please, try again.'));
				$this->Message->msgCommonError();
			}
		} else {
			$options = array('conditions' => array('Cardholder.' . $this->Cardholder->primaryKey => $id));
			$this->request->data = $this->Cardholder->find('first', $options);
		}
		//$cards = $this->Cardholder->Card->find('list');
		$cardtypes = $this->Cardholder->Card->Cardtype->find('list');
		$this->set(compact('cardtypes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Cardholder->id = $id;
		if (!$this->Cardholder->exists()) {
			throw new NotFoundException(__('Invalid cardholder'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Cardholder->delete()) {
			$this->Session->setFlash(__('The cardholder has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cardholder could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
