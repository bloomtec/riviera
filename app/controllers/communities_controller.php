<?php
class CommunitiesController extends AppController {

	var $name = 'Communities';

	function index() {
		$this->Community->recursive = 0;
		$this->set('communities', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid community', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('community', $this->Community->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Community->create();
			if ($this->Community->save($this->data)) {
				$this->Session->setFlash(__('The community has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The community could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid community', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Community->save($this->data)) {
				$this->Session->setFlash(__('The community has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The community could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Community->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for community', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Community->delete($id)) {
			$this->Session->setFlash(__('Community deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Community was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Community->recursive = 0;
		$this->set('communities', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid community', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('community', $this->Community->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Community->create();
			if ($this->Community->save($this->data)) {
				$this->Session->setFlash(__('The community has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The community could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid community', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Community->save($this->data)) {
				$this->Session->setFlash(__('The community has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The community could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Community->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for community', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Community->delete($id)) {
			$this->Session->setFlash(__('Community deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Community was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function listProperties($community_id = null) {
		$properties = null;	
		if ($community_id) {
			$properties = $this->Community->find('all', array('conditions' => array('Property.community_id' => $community_id)));
		}
		return $properties;
	}
	
}
