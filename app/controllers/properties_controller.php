<?php
class PropertiesController extends AppController {

	var $name = 'Properties';
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('view');
	}

	function index() {
		$this->Property->recursive = 0;
		$this->set('properties', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid property', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('property', $this->Property->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Property->create();
			if ($this->Property->save($this->data)) {
				$this->Session->setFlash(__('The property has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The property could not be saved. Check for required fields or if you have the "Show In Home" option checked verify that you have uploaded a picture and try again.', true));
			}
		}
		$types = $this->Property->Type->find('list');
		$communities = $this->Property->Community->find('list');
		$places = $this->Property->Place->find('list');
		$categories = $this->Property->Category->find('list');
		$features = $this->Property->Feature->find('list');
		$specials = $this->Property->Special->find('list');
		$this->set(compact('types', 'communities', 'places', 'categories', 'features', 'specials'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid property', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Property->save($this->data)) {
				$this->Session->setFlash(__('The property has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The property could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Property->read(null, $id);
		}
		$types = $this->Property->Type->find('list');
		$communities = $this->Property->Community->find('list');
		$places = $this->Property->Place->find('list');
		$categories = $this->Property->Category->find('list');
		$features = $this->Property->Feature->find('list');
		$specials = $this->Property->Special->find('list');
		$this->set(compact('types', 'communities', 'places', 'categories', 'features', 'specials'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for property', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Property->delete($id)) {
			$this->Session->setFlash(__('Property deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Property was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Property->recursive = 0;
		$this->set('properties', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid property', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('property', $this->Property->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Property->create();
			if ($this->Property->save($this->data)) {
				$this->Session->setFlash(__('The property has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The property could not be saved. Check for required fields or if you have the "Show In Home" option checked verify that you have uploaded a picture and try again.', true));
			}
		}
		$types = $this->Property->Type->find('list');
		$communities = $this->Property->Community->find('list');
		$places = $this->Property->Place->find('list');
		$categories = $this->Property->Category->find('list');
		$features = $this->Property->Feature->find('list');
		$specials = $this->Property->Special->find('list');
		$this->set(compact('types', 'communities', 'places', 'categories', 'features', 'specials'));
	}

	function admin_edit($id = null) {		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid property', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Property->save($this->data)) {
				$this->Session->setFlash(__('The property has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The property could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Property->read(null, $id);
		}
		$types = $this->Property->Type->find('list');
		$communities = $this->Property->Community->find('list');
		$places = $this->Property->Place->find('list');
		$categories = $this->Property->Category->find('list');
		$features = $this->Property->Feature->find('list');
		$specials = $this->Property->Special->find('list');
		$this->set(compact('types', 'communities', 'places', 'categories', 'features', 'specials'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for property', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Property->delete($id)) {
			$this->Session->setFlash(__('Property deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Property was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
