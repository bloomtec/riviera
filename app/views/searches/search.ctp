<div class="search">
	<div class="searchbox">
		<?php echo $this->Form->create('Search', array('action' => 'search'));?>
		<fieldset>
			<legend><?php __('Search'); ?></legend>
			<div class="and">
				<?php
					echo $this->Form->input('types');
					echo $this->Form->input('communities');
					echo $this->Form->input('places');
				?>
			</div>
			<div class="or">
				<?php
					echo $this->Form->input('categories', array('type' => 'select', 'multiple' => 'checkbox'));
					echo $this->Form->input('specials', array('type' => 'select', 'multiple' => 'checkbox'));
					echo $this->Form->input('features', array('type' => 'select', 'multiple' => 'checkbox'));
				?>
			</div>
		</fieldset>
		<?php echo $this->Form->end(__('Submit', true));?>
	</div>
</div>
<?php
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