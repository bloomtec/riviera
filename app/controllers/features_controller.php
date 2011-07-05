<?php
class FeaturesController extends AppController {

	var $name = 'Features';
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('listProperties', 'view');
	}

	function index() {
		$this->Feature->recursive = 0;
		$this->set('features', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid feature', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('feature', $this->Feature->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Feature->create();
			if ($this->Feature->save($this->data)) {
				$this->Session->setFlash(__('The feature has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The feature could not be saved. Please, try again.', true));
			}
		}
		$properties = $this->Feature->Property->find('list');
		$this->set(compact('properties'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid feature', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Feature->save($this->data)) {
				$this->Session->setFlash(__('The feature has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The feature could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Feature->read(null, $id);
		}
		$properties = $this->Feature->Property->find('list');
		$this->set(compact('properties'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for feature', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Feature->delete($id)) {
			$this->Session->setFlash(__('Feature deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Feature was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Feature->recursive = 0;
		$this->set('features', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid feature', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('feature', $this->Feature->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Feature->create();
			if ($this->Feature->save($this->data)) {
				$this->Session->setFlash(__('The feature has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The feature could not be saved. Please, try again.', true));
			}
		}
		$properties = $this->Feature->Property->find('list');
		$this->set(compact('properties'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid feature', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Feature->save($this->data)) {
				$this->Session->setFlash(__('The feature has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The feature could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Feature->read(null, $id);
		}
		$properties = $this->Feature->Property->find('list');
		$this->set(compact('properties'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for feature', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Feature->delete($id)) {
			$this->Session->setFlash(__('Feature deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Feature was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function listProperties($feature_id = null) {
		$properties = null;	
		if ($feature_id) {
			$sql =
				"SELECT *
				FROM `properties` as `Property`
				WHERE `Property`.`id` IN (
					SELECT DISTINCT `fp`.`property_id`
					FROM `features_properties` as `fp`
					WHERE `fp`.`feature_id` = $feature_id
				)";
			$properties = $this->Feature->query($sql);
		}
		return $properties;
	}
	
}
