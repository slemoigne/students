<?php

App::uses('AppController', 'Controller');

/**
 * Reviews Controller
 *
 */
class ReviewsController extends AppController {

	/**
	 *
	 * @var array $components
	 */
	public $components = array('Flash', 'Security');

	/**
	 * Add
	 * 
	 * @param string $id - Student ID
	 * @return void
	 * @throws NotFoundException
	 */
	public function add($id = null) {
		if (!$id) {
			throw new NotFoundException(__('ID parameter is required'));
		}

		$this->loadModel('Student');
		if (!$this->Student->exists($id)) {
			throw new NotFoundException(__('Object not found'));
		}

		$this->set('student_id', $id);

		if ($this->request->is('post')) {
			$this->Review->create();
			if ($this->Review->save($this->request->data)) {
				$this->Flash->success(__('The review has been saved.'));
				return $this->redirect(array(
							'controller' => 'students', 'action' => 'index'
				));
			}

			$this->Flash->error(__('Failed to save the review.'));
		}
	}

}
