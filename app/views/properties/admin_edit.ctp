<div class="properties_form">
<?php debug($this->data); echo $this->Form->create('Property');?>
	<fieldset>
		<legend><?php __('Edit Property'); ?></legend>
	<?php
		echo $this->Form->input('id');	
		echo $this->Form->input('type_id');
		echo $this->Form->input('community_id');
		echo $this->Form->input('place_id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('price');
		echo $this->Form->input('video');
		echo $this->Form->input('show_in_home');
	?>
	<div class="images">
		<div class="preview">
			<?php echo $html->image('pictures/' . $this->data['Property']['picture']);?>
		</div>
		<div id="single-upload" controller="properties"></div>
	</div>
	<?php
		echo $this->Form->hidden('picture', array("id" => "single-field"));
		echo $this->Form->input('time_range');
		echo $this->Form->input('Category');
		echo $this->Form->input('Feature');
		echo $this->Form->input('Special');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>