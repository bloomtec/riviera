<?php
	echo $this->element("searchbox");
	$results = $this->getVar('search_result');
	if(!empty($results)) {
		debug($results);
		echo $this->element("properties-list", array("properties" => $results));
	}
?>