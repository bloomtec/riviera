<div class="communities form">
<?php echo $this->Form->create('Community');?>
	<fieldset>
		<legend><?php __('Add Community'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Communities', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Properties', true), array('controller' => 'properties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Property', true), array('controller' => 'properties', 'action' => 'add')); ?> </li>
	</ul>
</div>