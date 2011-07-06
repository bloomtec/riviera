<?php
class SearchesController extends AppController {
	
	var $uses = array('Search', 'Type', 'Community', 'Place', 'Category', 'Special', 'Feature', 'Property');
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('search');
	}

	function search() {
		if (!empty($this->data)){
			debug($this->data);
			$type_id = $this->data['Search']['types'];
			$community_id = $this->data['Search']['communities'];
			$place_id = $this->data['Search']['places'];
			
			$categories_ids = "(";
			if (!empty($this->data['Search']['categories'])) {
				for ($i=0; $i < count($this->data['Search']['categories']); $i++) {
					 if (($i + 1) < count($this->data['Search']['categories'])) {
					 	$categories_ids = $categories_ids . $this->data['Search']['categories'][$i] . ", ";
					 } else {
					 	$categories_ids = $categories_ids . $this->data['Search']['categories'][$i];
					 }
				}
			}
			$categories_ids = $categories_ids . ")";
			
			$specials_ids = "(";
			if (!empty($this->data['Search']['specials'])) {
				for ($i=0; $i < count($this->data['Search']['specials']); $i++) {
					 if (($i + 1) < count($this->data['Search']['specials'])) {
					 	$specials_ids = $specials_ids . $this->data['Search']['specials'][$i] . ", ";
					 } else {
					 	$specials_ids = $specials_ids . $this->data['Search']['specials'][$i];
					 }
				}
			}
			$specials_ids = $specials_ids . ")";
			
			$features_ids = "(";
			if (!empty($this->data['Search']['features'])) {
				for ($i=0; $i < count($this->data['Search']['features']); $i++) {
					 if (($i + 1) < count($this->data['Search']['features'])) {
					 	$features_ids = $features_ids . $this->data['Search']['features'][$i] . ", ";
					 } else {
					 	$features_ids = $features_ids . $this->data['Search']['features'][$i];
					 }
				}
			}
			$features_ids = $features_ids . ")";
			
			$sql_ands =
				"SELECT *
				FROM `properties` as `Property`, `types` as `Type`, `communities` as `Community`, `places` as `Place`
				WHERE `Property`.`type_id` = $type_id
				AND `Property`.`community_id` = $community_id
				AND `Property`.`place_id` = $place_id
				AND `Property`.`type_id` = `Type`.`id`
				AND `Property`.`community_id` = `Community`.`id`
				AND `Property`.`place_id` = `Place`.`id`";
			
			$sql = $sql_ands;
				
			if (strlen($categories_ids) > 2 || strlen($specials_ids) > 2 || strlen($features_ids) > 2) {
				$i = 0;
				
				if (strlen($categories_ids) > 2) {
					$i++;
				}
				if (strlen($specials_ids) > 2) {
					$i++;
				}
				if (strlen($features_ids) > 2) {
					$i++;
				}
				
				$sql_ors =
				"
				AND (";
				
				if (strlen($categories_ids) > 2) {
					$sql_ors = $sql_ors . "
						`Property`.`id` IN (
							SELECT DISTINCT `cp`.`property_id`
							FROM `categories_properties` as `cp`
							WHERE `cp`.`category_id` IN $categories_ids
						)";
					$i--;
					if ($i > 0) {
						$sql_ors = $sql_ors . "
						OR ";
					}
				}
				
				if (strlen($specials_ids) > 2) {
					$sql_ors = $sql_ors . "
						`Property`.`id` IN (
							SELECT DISTINCT `ps`.`property_id`
							FROM `properties_specials` as `ps`
							WHERE `ps`.`special_id` = $specials_ids
						)";
					$i--;
					if ($i > 0) {
						$sql_ors = $sql_ors . "
						OR ";
					}
				}
				
				if (strlen($features_ids) > 2) {
					$sql_ors = $sql_ors . "
						`Property`.`id` IN (
							SELECT DISTINCT `fp`.`property_id`
							FROM `features_properties` as `fp`
							WHERE `fp`.`feature_id` = $features_ids
						)";
					$i--;
				}
				
				$sql_ors = $sql_ors . "
					)";
				$sql = $sql . $sql_ors;
			}
			
			$sql_ors_old =
				"AND (
					`Property`.`id` IN (
						SELECT DISTINCT `cp`.`property_id`
						FROM `categories_properties` as `cp`
						WHERE `cp`.`category_id` IN $categories_ids
					)
					OR `Property`.`id` IN (
						SELECT DISTINCT `ps`.`property_id`
						FROM `properties_specials` as `ps`
						WHERE `ps`.`special_id` = $specials_ids
					)
					OR `Property`.`id` IN (
						SELECT DISTINCT `fp`.`property_id`
						FROM `features_properties` as `fp`
						WHERE `fp`.`feature_id` = $features_ids
					)
				)";
			
			
			$search_result = $this->Property->query($sql);
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
