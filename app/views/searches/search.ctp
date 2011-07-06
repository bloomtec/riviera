<?php
	echo $this->element("searchbox");
	$results = $this->getVar('search_result');
	if(!empty($results)) {
?>
<div class="search_result">
	<table>
		<thead>
			<tr>
				<td>Properties</td><td>Action</td>
			</tr>
		</thead>
		<?php foreach($results as $result): ?>
			<tr>
				<td><?php echo $result['Property']['name']; ?></td>
				<td><?php echo $this->Html->link(__('View', true), array('controller' => 'properties', 'action' => 'view', $result['Property']['id'])); ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
<?php
	}
?>