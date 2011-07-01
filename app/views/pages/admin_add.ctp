<div class="pages_form">
<?php echo $this->Form->create('Page');?>
	<fieldset>
		<legend><?php __('Admin Add Page'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('content');
		echo $this->Form->input('order');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>