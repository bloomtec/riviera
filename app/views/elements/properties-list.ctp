<table class="properties-list">
	<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Type</th>
			<th>Community</th>
			<th>Place</th>
			<th>Price</th>
			<th>Video</th>
			<th>Picture</th>
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
	</tr>
	<?php endforeach;?>
</table>
