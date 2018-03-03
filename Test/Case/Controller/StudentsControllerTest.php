<?php

App::uses('StudentsController', 'Controller');

/**
 * StudentsController Test
 *
 */
class StudentsControllerTest extends ControllerTestCase {

	/**
	 *
	 * @var array $fixtures
	 */
	public $fixtures = array('app.student', 'app.review');

	/**
	 * testIndex
	 *
	 * @return void
	 */
	public function testIndex() {
		$this->testAction('/students');

		// Test var
		$this->assertInternalType('array', $this->vars['students']);
	}

	/**
	 * testView
	 *
	 * @return void
	 */
	public function testView() {
		$this->testAction('/students/view/1');

		// Test var
		$this->assertInternalType('array', $this->vars['student']);
		$this->assertInternalType('array', $this->vars['student']['Student']);
		$this->assertInternalType('array', $this->vars['student']['Review']); // Test student recursive
	}

	/**
	 * testViewWithoutId
	 *
	 * @return void
	 */
	public function testViewWithoutId() {
		// Test exception
		$this->expectException('NotFoundException', 'ID parameter is required');

		$this->testAction('/students/view');
	}

	/**
	 * testViewNotExists
	 *
	 * @return void
	 */
	public function testViewNotExists() {
		// Test exception
		$this->expectException('NotFoundException', 'Object not found');

		$this->testAction('/students/view/1000');
	}

	/**
	 * testAdd
	 * 
	 * @return void
	 */
	public function testAdd() {
		$this->testAction(
				'/students/add', array('method' => 'GET', 'return' => 'contents')
		);

		// Test display form
		$this->assertRegExp('/<html/', $this->contents);
		$this->assertRegExp('/<form/', $this->view);
	}

	/**
	 * testAddPostSuccess
	 *
	 * @return void
	 */
	public function testAddPostSuccess() {
		$data = array(
			'Student' => array(
				'last_name' => 'Test add',
				'first_name' => 'Test add',
				'birth_date' => '2000-01-01'
			)
		);

		$this->testAction(
				'/students/add', array('data' => $data, 'method' => 'post')
		);

		// Test redirect on index
		$this->assertContains('/students', $this->headers['Location']);
	}

	/**
	 * testAddPostError
	 *
	 * @return void
	 */
	public function testAddPostError() {
		$this->testAction(
				'/students/add', array('data' => array(), 'method' => 'post')
		);

		// Test no redirect
		$this->assertEmpty($this->headers);
	}

	/**
	 * testEdit
	 *
	 * @return void
	 */
	public function testEdit() {
		$this->testAction(
				'/students/edit/1', array('method' => 'GET', 'return' => 'contents')
		);

		// Test display form
		$this->assertRegExp('/<html/', $this->contents);
		$this->assertRegExp('/<form/', $this->view);

		// Test var
		$this->assertInternalType('array', $this->vars['student']);
		$this->assertInternalType('array', $this->vars['student']['Student']);
		$this->assertInternalType('array', $this->vars['student']['Review']); // Test student recursive
	}

	/**
	 * testEditWithoutId
	 *
	 * @return void
	 */
	public function testEditWithoutId() {
		// Test exception
		$this->expectException('NotFoundException', 'ID parameter is required');

		$this->testAction('/students/edit');
	}

	/**
	 * testEditNotExists
	 *
	 * @return void
	 */
	public function testEditNotExists() {
		// Test exception
		$this->expectException('NotFoundException', 'Object not found');

		$this->testAction('/students/edit/1000');
	}

	/**
	 * testEditPostSuccess
	 *
	 * @return void
	 */
	public function testEditPostSuccess() {
		$data = array(
			'Student' => array(
				'id' => 1,
				'last_name' => 'Test edit',
				'first_name' => 'Test edit',
				'birth_date' => '2000-01-01'
			)
		);

		$this->testAction(
				'/students/edit/1', array('data' => $data, 'method' => 'post')
		);

		// Test redirect on index
		$this->assertContains('/students', $this->headers['Location']);
	}

	/**
	 * testEditPostError
	 *
	 * @return void
	 */
	public function testEditPostError() {
		$this->testAction(
				'/students/edit/1', array('data' => array(), 'method' => 'post')
		);

		// Test no redirect
		$this->assertEmpty($this->headers);

		// Test var
		$this->assertInternalType('array', $this->vars['student']);
	}

	/**
	 * testDelete
	 *
	 * @return void
	 */
	public function testDelete() {
		// Test exception
		$this->expectException('MethodNotAllowedException', 'Method Not Allowed');

		$this->testAction(
				'/students/delete/1', array('data' => array(), 'method' => 'get')
		);
	}

	/**
	 * testDeleteWithoutId
	 *
	 * @return void
	 */
	public function testDeleteWithoutId() {
		// Test exception
		$this->expectException('NotFoundException', 'ID parameter is required');

		$this->testAction('/students/delete');
	}

	/**
	 * testDeleteNotExists
	 *
	 * @return void
	 */
	public function testDeleteNotExists() {
		// Test exception
		$this->expectException('NotFoundException', 'Object not found');

		$this->testAction('/students/delete/1000');
	}

	/**
	 * testDelete
	 *
	 * @return void
	 */
	public function testDeletePostSuccess() {
		$this->testAction(
				'/students/delete/1', array('data' => array(), 'method' => 'post')
		);

		// Test redirect on index
		$this->assertContains('/students', $this->headers['Location']);
	}

}
