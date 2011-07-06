<?php
class Search extends AppModel {
		
	var $name = 'Search';
	var $useTable = false;
	
	function listProperties($type_id, $community_id, $place_id, $arriving, $departing, $categories_ids, $specials_ids, $features_ids) {
		return $this->query($this->getSQL($type_id, $community_id, $place_id, $arriving, $departing, $categories_ids, $specials_ids, $features_ids));		
	}
	
	public function debugSQL($type_id, $community_id, $place_id, $arriving, $departing, $categories_ids, $specials_ids, $features_ids) {
		return $this->getSQL($type_id, $community_id, $place_id, $arriving, $departing, $categories_ids, $specials_ids, $features_ids);
	}
	
	private function getSQL($type_id, $community_id, $place_id, $arriving, $departing, $categories_ids, $specials_ids, $features_ids){ 
		return
			$this->sqlAnds($type_id, $community_id, $place_id, $arriving, $departing) .
			$this->sqlOrs($categories_ids, $specials_ids, $features_ids);
	}
	
	private function sqlAnds($type_id, $community_id, $place_id, $arriving, $departing){
		$sql_ands =
			"SELECT *
			FROM `properties` as `Property`, `types` as `Type`, `communities` as `Community`, `places` as `Place`
			WHERE `Property`.`type_id` = $type_id";
			
		if (!empty($community_id)) {
			$sql_ands =
				$sql_ands .
				"
				AND `Property`.`community_id` = $community_id";
		}
			
		$sql_ands =
			$sql_ands .
			"
			AND `Property`.`place_id` = $place_id
			AND `Property`.`type_id` = `Type`.`id`
			AND `Property`.`community_id` = `Community`.`id`
			AND `Property`.`place_id` = `Place`.`id`
			AND `Property`.`arriving` <= '$arriving'
			AND `Property`.`departing` >= '$departing'";
		
		return $sql_ands;
	}
	
	private function sqlOrs($categories_ids, $specials_ids, $features_ids) {
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
			
			if (strlen($features_ids) > 2) {
				$sql_ors = $sql_ors . "
					`Property`.`id` IN (
						SELECT DISTINCT `fp`.`property_id`
						FROM `features_properties` as `fp`
						WHERE `fp`.`feature_id` = $features_ids
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
			}
			
			$sql_ors = $sql_ors . "
				)";
			
			return $sql_ors;
		}
	}
	
}