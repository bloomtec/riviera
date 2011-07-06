<div class="properties_form">
<?php echo $this->Form->create('Property');?>
	<fieldset>
		<legend><?php __('Add Property'); ?></legend>
	<div class="fields">
	<?php
	
		echo $this->Form->input('id');
		echo $this->Form->input('name',array("div"=>"float"));
		echo $this->Form->input('price',array("div"=>"float"));
		echo $this->Form->input('time_range',array("div"=>"float"));
		echo $this->Form->input('description');
		echo "<fieldset>";
		echo $this->Form->input('type_id');
		echo $this->Form->input('community_id');
		echo $this->Form->input('place_id');
		
		echo "</fieldset>";
		
		echo "<fieldset>";
		echo $this->Form->input('Category', array('type' => 'select','multiple' => 'checkbox'));
		echo "</fieldset>";
		
		echo "<fieldset>";
		echo $this->Form->input('Feature', array('type' => 'select','multiple' => 'checkbox'));
		echo "</fieldset>";
		
		echo "<fieldset>";
		echo $this->Form->input('Special', array('type' => 'select','multiple' => 'checkbox'));
		echo "</fieldset>";
	?>
	</div>
	<div class="images">
		<h2>Picture</h2>
		<div class="preview">
			<?php echo $html->image('pictures/' . $this->data['Property']['picture']);?>
		</div>
		<div id="single-upload" controller="properties"></div>	
		<?php 
			echo $this->Form->input('show_in_home'); 
			echo $this->Form->input('video');
		?>		
	</div>
	<?php
		echo $this->Form->hidden('picture', array("id" => "single-field"));
		
		
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>