<div class="pictures_form">
<?php echo $this->Form->create('Picture');?>
	<fieldset>
		<legend><?php __('Add Picture'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('property_id');
		echo $this->Form->input('order');
		echo $this->Form->input('path');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>