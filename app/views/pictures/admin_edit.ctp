<div class="pictures_form">
<?php echo $this->Form->create('Picture');?>
	<fieldset>
		<legend><?php __('Edit Picture'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('property_id');
		echo $this->Form->input('order');
	?>
	<div class="images">
		<div class="preview">
			<?php echo $html->image('pictures/' . $this->data['Picture']['path']);?>
		</div>
		<div id="single-upload" controller="pictures"></div>
	</div>
	<?php
		echo $this->Form->hidden('path', array("id" => "single-field"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>