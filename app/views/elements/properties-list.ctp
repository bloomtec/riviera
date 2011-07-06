<table class="properties-list">
	<tr>
			<th>name</th>
			<th>description></th>
			<th>type_id</th>
			<th>community_id/th>
			<th>place</th>
			<th>price</th>
			<th><?php echo $this->Paginator->sort('video');?></th>
			<th><?php echo $this->Paginator->sort('picture');?></th>
			<th><?php echo $this->Paginator->sort('show_in_home');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php 
		$i = 0;
		foreach ($properties as $property):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $property['Property']['name']; ?>&nbsp;</td>
		<td><?php echo $property['Property']['description']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($property['Type']['name'], array('controller' => 'types', 'action' => 'view', $property['Type']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($property['Community']['name'], array('controller' => 'communities', 'action' => 'view', $property['Community']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($property['Place']['name'], array('controller' => 'places', 'action' => 'view', $property['Place']['id'])); ?>
		</td>
		<td><?php echo $property['Property']['price']; ?>&nbsp;</td>
		<td><?php echo $property['Property']['video']; ?>&nbsp;</td>
		<td><?php
				//echo $property['Property']['picture'];
				echo $html->image('pictures/' . $property['Property']['picture'], array("width"=>"200"));
			?>&nbsp;</td>
		<td><?php echo $property['Property']['show_in_home']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $property['Property']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $property['Property']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $property['Property']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $property['Property']['id'])); ?>
		</td>
	</tr>
	<?php endforeach;?>
</table>
