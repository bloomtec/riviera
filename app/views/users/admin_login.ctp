<div class="admin_login">	
	<?php echo $this -> Form -> create(array('action' => 'login'));
		echo $this -> Form -> inputs(
			array(
				'legend' => 'Login',
				'username' => array(
								'label' => 'User'
							),
				'password' => array(
								'label' => 'Password'
							),
			)
		);
		echo $this -> Form -> end('Login');
	?>
	<div style="clear:both;"></div>	
	<br />
	<?php echo $session->flash(); ?>
</div>