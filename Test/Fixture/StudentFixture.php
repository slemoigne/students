<?php

/**
 * Student Fixture
 *
 */
class StudentFixture extends CakeTestFixture {

	/**
	 *
	 * @var mixed $import
	 */
	public $import = 'Student';

	/**
	 *
	 * @var array $records
	 */
	public $records = array(
		array('id' => 1, 'last_name' => 'Test last name', 'first_name' => 'Test first name', 'birth_date' => '2000-01-01'),
	);

}
