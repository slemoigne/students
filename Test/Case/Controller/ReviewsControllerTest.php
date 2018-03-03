<?php

App::uses('ReviewsController', 'Controller');

/**
 * ReviewsController Test
 *
 */
class ReviewsControllerTest extends ControllerTestCase {

	/**
	 *
	 * @var array $fixtures
	 */
	public $fixtures = array('app.student', 'app.review');

	/**
	 * testAdd
	 *
	 * @return void
	 */
	public function testAdd() {
		$this->testAction(
				'/reviews/add/1', array('method' => 'GET', 'return' => 'contents')
		);

		// Test display form
		$this->assertRegExp('/<html/', $this->contents);
		$this->assertRegExp('/<form/', $this->view);

		// Test var
		$this->assertInternalType('string', $this->vars['student_id']);
	}

	/**
	 * testAddWithoutId
	 *
	 * @return void
	 */
	public function testAddWithoutId() {
		// Test exception
		$this->expectException('NotFoundException', 'ID parameter is required');

		$this->testAction('/reviews/add');
	}

	/**
	 * testAddNotExists
	 *
	 * @return void
	 */
	public function testAddNotExists() {
		// Test exception
		$this->expectException('NotFoundException', 'Object not found');

		$this->testAction('/reviews/add/1000');
	}

	/**
	 * testAddPostSuccess
	 *
	 * @return void
	 */
	public function testAddPostSuccess() {
		$data = array(
			'Review' => array(
				'student_id' => 1,
				'subject' => 'Test add',
				'grade' => 0
			)
		);

		$this->testAction(
				'/reviews/add/1', array('data' => $data, 'method' => 'post')
		);

		// Test redirect on students index
		$this->assertContains('/students', $this->headers['Location']);
	}

	/**
	 * testAddPostError
	 *
	 * @return void
	 */
	public function testAddPostError() {
		$this->testAction(
				'/reviews/add/1', array('data' => array(), 'method' => 'post')
		);

		// Test no redirect
		$this->assertEmpty($this->headers);

		// Test var
		$this->assertInternalType('string', $this->vars['student_id']);
	}

}
