<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php echo $this->Html->charset(); ?>
		<title>
			<?php __($PAGE_TITLE); ?>
			<?php echo $title_for_layout; ?>
		</title>
		<?php
			echo $this->Html->meta('icon');
	
			echo $this->Html->css('cake.generic');
			echo $this->Html->css('uploadify');
			echo $this->Html->css('superfish');
			
			echo $this->Html->script("jquery-1.6.1.min.js");
			echo $this->Html->script("admin.js");
			echo $this->Html->script("jquery-ui-1.8.14.custom.min.js");
			echo $this->Html->script("swfobject.js");
			echo $this->Html->script("jquery.uploadify.v2.1.4.min.js");
			echo $this->Html->script("upload.js");
			echo $this->Html->script("superfish.js");
	    	echo $this->Html->script("fileBrowser.js");
			
			echo $scripts_for_layout;
		?>
		<script type="text/javascript">
			var server="<?php echo $base_url;?>";
		</script>
	</head>
	<body>
		<div id="container">
			
			<div id="header">
				
				<div class="logo">
					<?php 
						//echo $this->Html->link(
						//	$this->Html->image(
						//		'logo.png',
						//		array('alt'=> __('CMS: llevatelo.com', true), 'border' => '0',"height"=>100)),
						//		array("controller"=>"subastas","action"=>"index"),
						//		array( 'escape' => false)
						//);
					?>
				</div>
				
				<ul class="nav">
					<li>
						<?php echo $html->link("Subastas",array("controller"=>"subastas", "action"=>"index")); ?>
					</li>
					<li>
						<?php echo $html->link(__("logout",true),array("controller"=>"users","action"=>"logout"), array("class"=>"logout"))?>
					<li>
				</ul>
				
			</div>
			
			<div id="content">
	
				<?php echo $this->Session->flash(); ?>
	
				<?php echo $content_for_layout; ?>
	
			</div>
			
			<div id="footer">
				<!-- FOOTER CONTENT -->
			</div>
			
		</div>
		<?php echo $this->element('sql_dump'); ?>
	</body>
</html>