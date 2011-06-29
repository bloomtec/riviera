<div class="properties form">
<?php echo $this->Form->create('Property');?>
	<fieldset>
		<legend><?php __('Admin Edit Property'); ?></legend>
	<?php
		echo $this->Form->input('id');
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
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Property.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Property.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Properties', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Types', true), array('controller' => 'types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Type', true), array('controller' => 'types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Communities', true), array('controller' => 'communities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Community', true), array('controller' => 'communities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Places', true), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place', true), array('controller' => 'places', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pictures', true), array('controller' => 'pictures', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Picture', true), array('controller' => 'pictures', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Features', true), array('controller' => 'features', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feature', true), array('controller' => 'features', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Specials', true), array('controller' => 'specials', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Special', true), array('controller' => 'specials', 'action' => 'add')); ?> </li>
	</ul>
</div>