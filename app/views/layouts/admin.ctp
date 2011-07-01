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
			
			echo $this->Html->script("swfobject.js");
			echo $this->Html->script("jquery-1.6.1.min.js");
			echo $this->Html->script("jquery.uploadify.v2.1.4.min.js");
			echo $this->Html->script("jquery-ui-1.8.14.custom.min.js");
			echo $this->Html->script("jquery.validate.min.js");
			echo $this->Html->script("upload.js");
			echo $this->Html->script("superfish.js");
			echo $this->Html->script("admin.js");
			
			echo $scripts_for_layout;
		?>
	</head>
	<body>
		<div id="container">
			
			<div id="header">
				<?php
					$user = $this->Session->read('Auth.User');
					if (!empty($user)) :
				?>
				<ul class="nav">
					<li>
						<?php echo $html->link("Communities", array("controller"=>"communities", "action"=>"index")); ?>
						<ul>
							<li><?php echo $html->link("List Communities", array("controller"=>"communities", "action"=>"index")); ?></li>
							<li><?php echo $html->link("Add Community", array("controller"=>"communities", "action"=>"add")); ?></li>
						</ul>
					</li>
					<li>
						<?php echo $html->link("Places", array("controller"=>"places", "action"=>"index")); ?>
						<ul>
							<li><?php echo $html->link("List Places", array("controller"=>"places", "action"=>"index")); ?></li>
							<li><?php echo $html->link("Add Place", array("controller"=>"places", "action"=>"add")); ?></li>
						</ul>
					</li>
					<li>
						<?php echo $html->link("Properties", array("controller"=>"properties", "action"=>"index")); ?>
						<ul>
							<li><?php echo $html->link("List Properties", array("controller"=>"properties", "action"=>"index")); ?></li>
							<li><?php echo $html->link("Add Property", array("controller"=>"properties", "action"=>"add")); ?></li>
						</ul>
					</li>
					<li>
						<?php echo $html->link("Specials", array("controller"=>"specials", "action"=>"index")); ?>
						<ul>
							<li><?php echo $html->link("List Specials", array("controller"=>"specials", "action"=>"index")); ?></li>
							<li><?php echo $html->link("Add Special", array("controller"=>"specials", "action"=>"add")); ?></li>
						</ul>
					</li>
					<li>
						<?php echo $html->link("Pictures", array("controller"=>"pictures", "action"=>"index")); ?>
						<ul>
							<li><?php echo $html->link("List Pictures", array("controller"=>"pictures", "action"=>"index")); ?></li>
							<li><?php echo $html->link("Add Picture", array("controller"=>"pictures", "action"=>"add")); ?></li>
						</ul>
					</li>
					<li>
						<?php echo $html->link("Categories", array("controller"=>"categories", "action"=>"index")); ?>
						<ul>
							<li><?php echo $html->link("List Categories", array("controller"=>"categories", "action"=>"index")); ?></li>
							<li><?php echo $html->link("Add Category", array("controller"=>"categories", "action"=>"add")); ?></li>
						</ul>
					</li>
					<li>
						<?php echo $html->link(__("Logout",true),array("controller"=>"users","action"=>"logout"), array("class"=>"logout"))?>
					<li>
				</ul>
				<?php endif; ?>
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