<?php
class SearchesController extends AppController {
	
	var $uses = array('Search', 'Type', 'Community', 'Place', 'Category', 'Special', 'Feature');
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('search');
	}
	
	private function arriving($data) {
		return 
			$data['Search']['min_range']['year'] .
			"-" .
			$data['Search']['min_range']['month'] .
			"-" .
			$data['Search']['min_range']['day'];
	}
	
	private function departing($data) {
		return 
			$data['Search']['max_range']['year'] .
			"-" .
			$data['Search']['max_range']['month'] .
			"-" .
			$data['Search']['max_range']['day'];
	}
	
	private function categories($data) {
		$categories_ids = "(";
		if (!empty($data['Search']['categories'])) {
			for ($i=0; $i < count($data['Search']['categories']); $i++) {
				 if (($i + 1) < count($data['Search']['categories'])) {
				 	$categories_ids = $categories_ids . $data['Search']['categories'][$i] . ", ";
				 } else {
				 	$categories_ids = $categories_ids . $data['Search']['categories'][$i];
				 }
			}
		}
		$categories_ids = $categories_ids . ")";
		return $categories_ids;
	}
	
	private function specials($data) {
		$specials_ids = "(";
		if (!empty($data['Search']['specials'])) {
			for ($i=0; $i < count($data['Search']['specials']); $i++) {
				 if (($i + 1) < count($data['Search']['specials'])) {
				 	$specials_ids = $specials_ids . $data['Search']['specials'][$i] . ", ";
				 } else {
				 	$specials_ids = $specials_ids . $data['Search']['specials'][$i];
				 }
			}
		}
		$specials_ids = $specials_ids . ")";
		return $specials_ids;
	}
	
	private function features($data) {
		$features_ids = "(";
		if (!empty($data['Search']['features'])) {
			for ($i=0; $i < count($data['Search']['features']); $i++) {
				 if (($i + 1) < count($data['Search']['features'])) {
				 	$features_ids = $features_ids . $data['Search']['features'][$i] . ", ";
				 } else {
				 	$features_ids = $features_ids . $data['Search']['features'][$i];
				 }
			}
		}
		$features_ids = $features_ids . ")";
		return $features_ids;
	}

	function search() {
			
		if (!empty($this->data)){
			$type_id = $this->data['Search']['types'];
			$community_id = $this->data['Search']['communities'];
			$place_id = $this->data['Search']['places'];
			$arriving = $this->arriving($this->data);
			$departing = $this->departing($this->data);
			$categories_ids = $this->categories($this->data);
			$specials_ids = $this->specials($this->data);
			$features_ids = $this->features($this->data);
			debug($this->Search->debugSQL($type_id, $community_id, $place_id, $arriving, $departing, $categories_ids, $specials_ids, $features_ids));			
			$search_result = $this->Search->listProperties($type_id, $community_id, $place_id, $arriving, $departing, $categories_ids, $specials_ids, $features_ids);
			$this->set('search_result', $search_result);
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
