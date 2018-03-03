<?php

App::uses('AppModel', 'Model');

/**
 * Student Model
 * 
 */
class Student extends AppModel {

	/**
	 * 
	 * @var array $validate
	 */
	public $validate = array(
		'last_name' => array(
			'rule' => array('maxLength', 50),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Last name is required (max length 50 characters).'
		),
		'first_name' => array(
			'rule' => array('maxLength', 50),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'First name is required (max length 50 characters).'
		),
		'birth_date' => array(
			'rule' => array('date'),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Date is not valid.'
		)
	);

	/**
	 * 
	 * @var array $hasMany
	 */
	public $hasMany = array(
		'Review' => array(
			'className' => 'Review',
			'dependent' => true, // Delete cascade
			'exclusive' => true // One request to delete all reviews for more performance
		)
	);

}
