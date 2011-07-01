<?php
class SpecialsController extends AppController {

	var $name = 'Specials';

	function index() {
		$this->Special->recursive = 0;
		$this->set('specials', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid special', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('special', $this->Special->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Special->create();
			if ($this->Special->save($this->data)) {
				$this->Session->setFlash(__('The special has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The special could not be saved. Please, try again.', true));
			}
		}
		$properties = $this->Special->Property->find('list');
		$this->set(compact('properties'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid special', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Special->save($this->data)) {
				$this->Session->setFlash(__('The special has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The special could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Special->read(null, $id);
		}
		$properties = $this->Special->Property->find('list');
		$this->set(compact('properties'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for special', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Special->delete($id)) {
			$this->Session->setFlash(__('Special deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Special was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Special->recursive = 0;
		$this->set('specials', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid special', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('special', $this->Special->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Special->create();
			if ($this->Special->save($this->data)) {
				$this->Session->setFlash(__('The special has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The special could not be saved. Please, try again.', true));
			}
		}
		$properties = $this->Special->Property->find('list');
		$this->set(compact('properties'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid special', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Special->save($this->data)) {
				$this->Session->setFlash(__('The special has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The special could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Special->read(null, $id);
		}
		$properties = $this->Special->Property->find('list');
		$this->set(compact('properties'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for special', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Special->delete($id)) {
			$this->Session->setFlash(__('Special deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Special was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function listProperties($special_id = null) {
		$properties = null;	
		if ($special_id) {
			$sql =
				"SELECT *
				FROM `properties` as `Property`
				WHERE `Property`.`id` IN (
					SELECT DISTINCT `ps`.`property_id`
					FROM `properties_specials` as `ps`
					WHERE `ps`.`special_id` = $special_id
				)";
			$properties = $this->Place->query($sql);
		}
		return $properties;
	}
	
}
