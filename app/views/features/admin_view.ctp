<div class="features_view">
<h2><?php  __('Feature');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $feature['Feature']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $feature['Feature']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $feature['Feature']['updated']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php __('Related Properties');?></h3>
	<?php if (!empty($feature['Property'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Price'); ?></th>
		<th><?php __('Video'); ?></th>
		<th><?php __('Picture'); ?></th>
		<th><?php __('Time Range'); ?></th>
		<th><?php __('Show In Home'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Updated'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($feature['Property'] as $property):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $property['name'];?></td>
			<td><?php echo $property['description'];?></td>
			<td><?php echo $property['price'];?></td>
			<td><?php echo $property['video'];?></td>
			<td><?php
					//echo $property['picture'];
					echo $html->image('pictures/' . $property['picture'], array("width"=>"200"));
				?></td>
			<td><?php echo $property['time_range'];?></td>
			<td><?php echo $property['show_in_home'];?></td>
			<td><?php echo $property['created'];?></td>
			<td><?php echo $property['updated'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'properties', 'action' => 'view', $property['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'properties', 'action' => 'edit', $property['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'properties', 'action' => 'delete', $property['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $property['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
