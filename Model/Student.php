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
			'date' => array(
				'rule' => array('date'),
				'required' => true,
				'allowEmpty' => false,
				'message' => 'Date is required.'
			),
			'year' => array(
				'rule' => array('maxYear', -3),
				'message' => 'The maximum allowed date is exceeded.'
			)
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

	/**
	 * maxYear
	 *
	 * @param array $check
	 * @param int $inc
	 */
	public function maxYear($check, $inc) {
		$yearInc = date('Y') + $inc;

		$values = array_values($check);
		if (!isset($values[0])) {
			throw new LogicException('Failed to get index 0 of values');
		}

		// Note : If date bigger than system support, year equal 1970 => Not critical
		$yearValue = date('Y', strtotime($values[0]));

		return $yearInc >= $yearValue;
	}

}
