<div class="searchbox">
	<?php echo $this->Form->create('Search', array('action' => 'search'));?>
	<fieldset>
		<legend><?php __('Search'); ?></legend>
		<?php
			echo $this->Form->input('');
			echo $this->Form->input('');
			echo $this->Form->input('');
			echo $this->Form->input('');
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Submit', true));?>
</div>