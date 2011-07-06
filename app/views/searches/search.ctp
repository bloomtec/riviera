<?php
	echo $this->element("searchbox");
	$results = $this->getVar('search_result');
	if(!empty($results)) {
		echo $this->element("properties-list", array("properties" => $results));
	}
?>