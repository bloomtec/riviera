<div class="properties_view">
<h2><?php  __('Property');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($property['Type']['name'], array('controller' => 'types', 'action' => 'view', $property['Type']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Community'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($property['Community']['name'], array('controller' => 'communities', 'action' => 'view', $property['Community']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Place'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($property['Place']['name'], array('controller' => 'places', 'action' => 'view', $property['Place']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $property['Property']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $property['Property']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Price'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $property['Property']['price']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Video'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $property['Property']['video']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Picture'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $property['Property']['picture']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Time Range'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $property['Property']['time_range']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Show In Home'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $property['Property']['show_in_home']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $property['Property']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Upadated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $property['Property']['updated']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php __('Related Pictures');?></h3>
	<?php if (!empty($property['Picture'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Property Id'); ?></th>
		<th><?php __('Order'); ?></th>
		<th><?php __('Path'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Updated'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($property['Picture'] as $picture):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $picture['id'];?></td>
			<td><?php echo $picture['property_id'];?></td>
			<td><?php echo $picture['order'];?></td>
			<td><?php echo $picture['path'];?></td>
			<td><?php echo $picture['created'];?></td>
			<td><?php echo $picture['updated'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'pictures', 'action' => 'view', $picture['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'pictures', 'action' => 'edit', $picture['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'pictures', 'action' => 'delete', $picture['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $picture['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
<div class="related">
	<h3><?php __('Related Categories');?></h3>
	<?php if (!empty($property['Category'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Updated'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($property['Category'] as $category):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $category['id'];?></td>
			<td><?php echo $category['name'];?></td>
			<td><?php echo $category['description'];?></td>
			<td><?php echo $category['created'];?></td>
			<td><?php echo $category['updated'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'categories', 'action' => 'view', $category['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'categories', 'action' => 'edit', $category['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'categories', 'action' => 'delete', $category['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $category['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
<div class="related">
	<h3><?php __('Related Features');?></h3>
	<?php if (!empty($property['Feature'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Updated'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($property['Feature'] as $feature):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $feature['id'];?></td>
			<td><?php echo $feature['name'];?></td>
			<td><?php echo $feature['created'];?></td>
			<td><?php echo $feature['updated'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'features', 'action' => 'view', $feature['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'features', 'action' => 'edit', $feature['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'features', 'action' => 'delete', $feature['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $feature['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
<div class="related">
	<h3><?php __('Related Specials');?></h3>
	<?php if (!empty($property['Special'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Updated'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($property['Special'] as $special):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $special['id'];?></td>
			<td><?php echo $special['name'];?></td>
			<td><?php echo $special['description'];?></td>
			<td><?php echo $special['created'];?></td>
			<td><?php echo $special['updated'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'specials', 'action' => 'view', $special['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'specials', 'action' => 'edit', $special['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'specials', 'action' => 'delete', $special['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $special['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
