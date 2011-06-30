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
	
	function beforeRender(){
		$PAGE_TITLE="Grand Riviera Rentals ::";
		$this->set(compact("PAGE_TITLE"));
		$this->set('base_url', 'http://'.$_SERVER['SERVER_NAME'].Router::url('/'));
	}

}
