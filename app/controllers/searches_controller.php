<?php
class SearchesController extends AppController {
	
	var $uses = array('Search', 'Type', 'Community', 'Place', 'Category', 'Special', 'Feature');
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('search');
	}

	function search() {
		if (!empty($this->data)){
			debug($this->data);
		}
		$types = $this->Type->find('list');
		$this->set(compact('types'));
		$communities = $this->Community->find('list');
		$this->set(compact('communities'));
		$places = $this->Place->find('list');
		$this->set(compact('places'));
		$categories = $this->Category->find('list');
		$this->set(compact('categories'));
		$specials = $this->Special->find('list');
		$this->set(compact('specials'));
		$features = $this->Feature->find('list');
		$this->set(compact('features'));
	}

}
