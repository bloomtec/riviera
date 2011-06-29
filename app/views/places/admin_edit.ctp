<div class="places form">
<?php echo $this->Form->create('Place');?>
	<fieldset>
		<legend><?php __('Admin Edit Place'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('long');
		echo $this->Form->input('lat');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Place.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Place.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Places', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Properties', true), array('controller' => 'properties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Property', true), array('controller' => 'properties', 'action' => 'add')); ?> </li>
	</ul>
</div>