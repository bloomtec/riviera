<div class="places form">
<?php echo $this->Form->create('Place');?>
	<fieldset>
		<legend><?php __('Admin Add Place'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Places', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Properties', true), array('controller' => 'properties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Property', true), array('controller' => 'properties', 'action' => 'add')); ?> </li>
	</ul>
</div>