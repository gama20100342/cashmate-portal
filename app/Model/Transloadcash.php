<?php
App::uses('AppModel', 'Model');
/**
 * Transloadcash Model
 *
 * @property Transactiontype $Transactiontype
 * @property Card $Card
 * @property Cardholder $Cardholder
 * @property User $User
 * @property Terminal $Terminal
 * @property Atmstation $Atmstation
 * @property Postation $Postation
 * @property Status $Status
 */
class Transloadcash extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public function beforeSave($options = array()){
		parent::beforeSave();
		return true;
	}

	public $validate = array(
		'transactiontype_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'transcode' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'card_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cardholder_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'transdate' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Transactiontype' => array(
			'className' => 'Transactiontype',
			'foreignKey' => 'transactiontype_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Card' => array(
			'className' => 'Card',
			'foreignKey' => 'card_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Cardholder' => array(
			'className' => 'Cardholder',
			'foreignKey' => 'cardholder_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Terminal' => array(
			'className' => 'Terminal',
			'foreignKey' => 'terminal_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Atmstation' => array(
			'className' => 'Atmstation',
			'foreignKey' => 'atmstation_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Postation' => array(
			'className' => 'Postation',
			'foreignKey' => 'postation_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Status' => array(
			'className' => 'Status',
			'foreignKey' => 'status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
