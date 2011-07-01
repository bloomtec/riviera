<div class="communities_form">
<?php echo $this->Form->create('Community');?>
	<fieldset>
		<legend><?php __('Add Community'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>