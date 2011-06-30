<div class="properties_form">
<?php echo $this->Form->create('Property');?>
	<fieldset>
		<legend><?php __('Add Property'); ?></legend>
	<?php
		echo $this->Form->input('type_id');
		echo $this->Form->input('community_id');
		echo $this->Form->input('place_id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('price');
		echo $this->Form->input('video');
		echo $this->Form->input('picture');
		echo $this->Form->input('time_range');
		echo $this->Form->input('show_in_home');
		echo $this->Form->input('upadated');
		echo $this->Form->input('Category');
		echo $this->Form->input('Feature');
		echo $this->Form->input('Special');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>