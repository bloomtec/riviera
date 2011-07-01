<div class="pictures_form">
<?php echo $this->Form->create('Picture');?>
	<fieldset>
		<legend><?php __('Add Picture'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('property_id');
		echo $this->Form->input('order');
	?>
	<div class="images">
		<h2>Picture</h2>
		<div class="preview"></div>
		<div id="single-upload" controller="pictures"></div>			
	</div>
	<?php
		echo $this->Form->hidden('path', array("id" => "single-field"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>