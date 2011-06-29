<div class="places view">
<h2><?php  __('Place');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $place['Place']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $place['Place']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Long'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $place['Place']['long']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lat'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $place['Place']['lat']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Place', true), array('action' => 'edit', $place['Place']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Place', true), array('action' => 'delete', $place['Place']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $place['Place']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Places', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Properties', true), array('controller' => 'properties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Property', true), array('controller' => 'properties', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Properties');?></h3>
	<?php if (!empty($place['Property'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Type Id'); ?></th>
		<th><?php __('Community Id'); ?></th>
		<th><?php __('Place Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Price'); ?></th>
		<th><?php __('Video'); ?></th>
		<th><?php __('Picture'); ?></th>
		<th><?php __('Time Range'); ?></th>
		<th><?php __('Show In Home'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Upadated'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($place['Property'] as $property):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $property['id'];?></td>
			<td><?php echo $property['type_id'];?></td>
			<td><?php echo $property['community_id'];?></td>
			<td><?php echo $property['place_id'];?></td>
			<td><?php echo $property['name'];?></td>
			<td><?php echo $property['description'];?></td>
			<td><?php echo $property['price'];?></td>
			<td><?php echo $property['video'];?></td>
			<td><?php echo $property['picture'];?></td>
			<td><?php echo $property['time_range'];?></td>
			<td><?php echo $property['show_in_home'];?></td>
			<td><?php echo $property['created'];?></td>
			<td><?php echo $property['upadated'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'properties', 'action' => 'view', $property['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'properties', 'action' => 'edit', $property['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'properties', 'action' => 'delete', $property['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $property['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Property', true), array('controller' => 'properties', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
