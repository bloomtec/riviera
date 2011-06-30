<?php

class AppController extends Controller {
	
	var $cacheAction = true;
	
	function beforeFilter () {
		parent::beforeFilter();
		
		if(isset($this->params["prefix"]) && $this->params["prefix"]=="admin"){
			$this->layout="admin";
		}
		
	}

}
