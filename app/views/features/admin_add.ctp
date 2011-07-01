<div class="features_form">
<?php echo $this->Form->create('Feature');?>
	<fieldset>
		<legend><?php __('Add Feature'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('Property', array('type' => 'select', 'multiple' => 'checkbox'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>