<?php
App::uses('AppModel', 'Model');
/**
 * Buddy Model
 *
 */
class Buddy extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'Buddies';

/**
 * Model Associations
 */
	public $belongsTo =  array(
		'Buddy1' => array(
			'className' => 'User',
			'foreignKey' => 'Buddy_1'
		),
		'Buddy2' => array(
			'className' => 'User',
			'foreignKey' => 'Buddy_2'
		)
	);



}
