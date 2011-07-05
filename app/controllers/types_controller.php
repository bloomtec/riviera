<?php
class TypesController extends AppController {

	var $name = 'Types';

	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('listProperties', 'view');
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid type', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('type', $this->Type->read(null, $id));
	}

	function admin_index() {
		$this->Type->recursive = 0;
		$this->set('types', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid type', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('type', $this->Type->read(null, $id));
	}
	
	function listProperties($type_id = null) {
		$properties = null;	
		if ($type_id) {
			$properties = $this->Type->Property->find('all', array('conditions' => array('Property.type_id' => $type_id)));
		}
		return $properties;
	}
	
}
