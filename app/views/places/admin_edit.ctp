<div class="places_form">
<?php echo $this->Form->create('Place');?>
	<fieldset>
		<legend><?php __('Edit Place'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('long');
		echo $this->Form->input('lat');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>