<div class="pictures form">
<?php echo $this->Form->create('Picture');?>
	<fieldset>
		<legend><?php __('Edit Picture'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('property_id');
		echo $this->Form->input('order');
		echo $this->Form->input('path');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Picture.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Picture.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Pictures', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Properties', true), array('controller' => 'properties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Property', true), array('controller' => 'properties', 'action' => 'add')); ?> </li>
	</ul>
</div>