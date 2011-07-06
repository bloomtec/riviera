<?php
class PicturesController extends AppController {

	var $name = 'Pictures';
	var $components = array('Attachment');
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('view');
	}
	
	function index() {
		$this->Picture->recursive = 0;
		$this->set('pictures', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid picture', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('picture', $this->Picture->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Picture->create();
			if ($this->Picture->save($this->data)) {
				$this->Session->setFlash(__('The picture has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The picture could not be saved. Please, try again.', true));
			}
		}
		$properties = $this->Picture->Property->find('list');
		$this->set(compact('properties'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid picture', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Picture->save($this->data)) {
				$this->Session->setFlash(__('The picture has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The picture could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Picture->read(null, $id);
		}
		$properties = $this->Picture->Property->find('list');
		$this->set(compact('properties'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for picture', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Picture->delete($id)) {
			$this->Session->setFlash(__('Picture deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Picture was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Picture->recursive = 0;
		$this->set('pictures', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid picture', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('picture', $this->Picture->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Picture->create();
			if ($this->Picture->save($this->data)) {
				$this->Session->setFlash(__('The picture has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The picture could not be saved. Please, try again.', true));
			}
		}
		$properties = $this->Picture->Property->find('list');
		$this->set(compact('properties'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid picture', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Picture->save($this->data)) {
				$this->Session->setFlash(__('The picture has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The picture could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Picture->read(null, $id);
		}
		$properties = $this->Picture->Property->find('list');
		$this->set(compact('properties'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for picture', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Picture->delete($id)) {
			$this->Session->setFlash(__('Picture deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Picture was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function resizeImage(){
		
		$this->autoRender = false;
		Configure::write("debug", 0);
			
		if($_POST["name"] && $_POST["folder"]) {
			
			$this->Attachment->resize_image(
				"resize",
				"img/pictures/" . $_POST["folder"] . "/" . $_POST["name"],
				"img/pictures/" . $_POST["folder"] . "/640x480",
				$_POST["name"],
				640,
				480
			);
			$this->Attachment->resize_image(
				"resize",
				"img/pictures/" . $_POST["folder"] . "/" . $_POST["name"],
				"img/pictures/" . $_POST["folder"] . "/256x256",
				$_POST["name"],
				256,
				256
			);
			$this->Attachment->resize_image(
				"resize",
				"img/pictures/" . $_POST["folder"] . "/" . $_POST["name"],
				"img/pictures/" . $_POST["folder"] . "/128x128",
				$_POST["name"],
				128,
				128
			);
			
			echo true;
		}else{
			echo false;
		}
		
		exit(0);
	}
	
}
