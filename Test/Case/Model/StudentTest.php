<?php

App::uses('Student', 'Model');

/**
 * Student Test
 * 
 */
class StudentTest extends CakeTestCase {

	/**
	 *
	 * @var array $fixtures
	 */
	public $fixtures = array('app.student', 'app.review');

	/**
	 * setUp
	 *
	 * @return void
	 */
	public function setUp() {
		parent::setUp();
		$this->Student = ClassRegistry::init('Student');
	}

	/**
	 * tearDown
	 *
	 * @return void
	 */
	public function tearDown() {
		unset($this->Student);
		parent::tearDown();
	}

	/**
	 * testMaxYear
	 *
	 * @return void
	 */
	public function testMaxYear() {
		$result1 = $this->Student->maxYear(array('test' => '2000-01-01'), 0);
		$this->assertSame(true, $result1);

		$result2 = $this->Student->maxYear(array('test' => date('Y-m-d')), -3);
		$this->assertSame(false, $result2);
	}

	/**
	 * testMaxYearException
	 *
	 * @return void
	 */
	public function testMaxYearException() {
		// Test exception
		$this->expectException('LogicException', 'Failed to get index 0 of values');

		$this->Student->maxYear(array(), 0);
	}

}
