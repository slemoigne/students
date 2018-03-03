<?php

App::uses('AppModel', 'Model');

/**
 * Review Model
 * 
 */
class Review extends AppModel {

	/**
	 *
	 * @var array $validate
	 */
	public $validate = array(
		'subject' => array(
			'rule' => array('maxLength', 50),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Subject is required (max length 50 characters).'
		),
		'grade' => array(
			'rule' => array('range', -1, 21), // Limits values are exclude
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Grade is required and must be between 0 and 20 (include).'
		)
	);

	/**
	 *
	 * @var array $belongsTo
	 */
	public $belongsTo = array(
		'Student' => array(
			'className' => 'Student',
			'counterCache' => true // Increment and decrement review_count of student
		)
	);

}
