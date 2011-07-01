<div class="specials_form">
<?php echo $this->Form->create('Special');?>
	<fieldset>
		<legend><?php __('Edit Special'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('Property', array('type' => 'select','multiple' => 'checkbox'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>