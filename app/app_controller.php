<?php

class AppController extends Controller {
	
	var $components = array('Auth', 'Session');
	var $cacheAction = true;
	var $user = null;
	
	function beforeFilter () {
		parent::beforeFilter();
		
		$this->user = $this->Auth->user();
		
		if(isset($this->params["prefix"]) && $this->params["prefix"]=="admin"){
			$this->Auth->userScope = array('User.role_id' => array(1));
			$this->layout="admin";
		}
		
	}

}
