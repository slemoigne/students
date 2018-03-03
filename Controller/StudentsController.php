<?php

App::uses('AppController', 'Controller');

/**
 * Students Controller
 *
 */
class StudentsController extends AppController {

	/**
	 * 
	 * @var array $components
	 */
	public $components = array('Paginator', 'Flash', 'Security');

	/**
	 * Index
	 *
	 * @return void
	 */
	public function index() {
		$this->set('students', $this->Paginator->paginate());
	}

	/**
	 * View
	 *
	 * @param string $id
	 * @return void
	 * @throws NotFoundException
	 */
	public function view($id = null) {
		$this->Student->recursive = 1;

		if (!$id) {
			throw new NotFoundException(__('ID parameter is required'));
		}

		$student = $this->Student->findById($id);
		if (!$student) {
			throw new NotFoundException(__('Object not found'));
		}

		$this->set('student', $student);
	}

	/**
	 * Add
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Student->create();
			if ($this->Student->save($this->request->data)) {
				$this->Flash->success(__('The student has been saved.'));
				return $this->redirect(array('action' => 'index'));
			}

			$this->Flash->error(__('Failed to save the student.'));
		}
	}

	/**
	 * Edit
	 *
	 * @param string $id
	 * @return void
	 * @throws NotFoundException
	 */
	public function edit($id = null) {
		$this->Student->recursive = 1;

		if (!$id) {
			throw new NotFoundException(__('ID parameter is required'));
		}

		$student = $this->Student->findById($id);
		if (!$student) {
			throw new NotFoundException(__('Object not found'));
		}

		if ($this->request->is(array('post', 'put', 'patch'))) {
			if ($this->Student->save($this->request->data)) {
				$this->Flash->success(__('The student has been saved.'));
				return $this->redirect(array('action' => 'index'));
			}

			$this->Flash->error(__('Failed to save the student.'));
		}

		if (!$this->request->data) {
			$this->request->data = $student;
		}

		$this->set('student', $student);
	}

	/**
	 * Delete
	 *
	 * @param string $id
	 * @return void
	 * @throws NotFoundException
	 */
	public function delete($id = null) {
		$this->request->allowMethod('post', 'delete');

		if (!$id) {
			throw new NotFoundException(__('ID parameter is required'));
		}

		if (!$this->Student->exists($id)) {
			throw new NotFoundException(__('Object not found'));
		}

		if ($this->Student->delete($id)) {
			$this->Flash->success(__('The student has been deleted.'));
		} else {
			$this->Flash->error(__('Failed to delete the student.'));
		}

		return $this->redirect(array('action' => 'index'));
	}

}
