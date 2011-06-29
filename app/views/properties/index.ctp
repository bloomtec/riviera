<div class="properties index">
	<h2><?php __('Properties');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('type_id');?></th>
			<th><?php echo $this->Paginator->sort('community_id');?></th>
			<th><?php echo $this->Paginator->sort('place_id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('price');?></th>
			<th><?php echo $this->Paginator->sort('video');?></th>
			<th><?php echo $this->Paginator->sort('picture');?></th>
			<th><?php echo $this->Paginator->sort('time_range');?></th>
			<th><?php echo $this->Paginator->sort('show_in_home');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('upadated');?></th>
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
		<td><?php echo $property['Property']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($property['Type']['name'], array('controller' => 'types', 'action' => 'view', $property['Type']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($property['Community']['name'], array('controller' => 'communities', 'action' => 'view', $property['Community']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($property['Place']['name'], array('controller' => 'places', 'action' => 'view', $property['Place']['id'])); ?>
		</td>
		<td><?php echo $property['Property']['name']; ?>&nbsp;</td>
		<td><?php echo $property['Property']['description']; ?>&nbsp;</td>
		<td><?php echo $property['Property']['price']; ?>&nbsp;</td>
		<td><?php echo $property['Property']['video']; ?>&nbsp;</td>
		<td><?php echo $property['Property']['picture']; ?>&nbsp;</td>
		<td><?php echo $property['Property']['time_range']; ?>&nbsp;</td>
		<td><?php echo $property['Property']['show_in_home']; ?>&nbsp;</td>
		<td><?php echo $property['Property']['created']; ?>&nbsp;</td>
		<td><?php echo $property['Property']['upadated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $property['Property']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $property['Property']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $property['Property']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $property['Property']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Property', true), array('action' => 'add')); ?></li>
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