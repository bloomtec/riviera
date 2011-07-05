<div class="types_view">
<h2><?php  __('Type');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $type['Type']['name']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php __('Related Properties');?></h3>
	<?php if (!empty($type['Property'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Type Id'); ?></th>
		<th><?php __('Community Id'); ?></th>
		<th><?php __('Place Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Price'); ?></th>
		<th><?php __('Video'); ?></th>
		<th><?php __('Picture'); ?></th>
		<th><?php __('Time Range'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($type['Property'] as $property):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $property['type_id'];?></td>
			<td><?php echo $property['community_id'];?></td>
			<td><?php echo $property['place_id'];?></td>
			<td><?php echo $property['name'];?></td>
			<td><?php echo $property['description'];?></td>
			<td><?php echo $property['price'];?></td>
			<td><?php echo $property['video'];?></td>
			<td><?php
					//echo $property['picture'];
					echo $html->image('pictures/' . $property['picture'], array("width"=>"200"));
				?></td>
			<td><?php echo $property['time_range'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'properties', 'action' => 'view', $property['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
