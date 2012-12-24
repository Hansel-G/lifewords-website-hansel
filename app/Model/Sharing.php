<?php
App::uses('AppModel', 'Model');
/**
 * Sharing Model
 *
 */
class Sharing extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'Sharing';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'Card_ID';

/**
 *
 *
 */
 	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'User_Email'
		)
	);
	
/**
 *
 *
 */
 	public $hasOne = array(
 		'Card' => array(
			'className' => 'Card',
			'foreignKey' => 'Card_ID'
		) 
	);	

}
