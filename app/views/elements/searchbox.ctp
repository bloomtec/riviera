<div class="search">
	<div class="searchbox">
		<?php echo $this->Form->create('Search', array('action' => 'search'));?>
		<fieldset>
			<legend><?php __('Search'); ?></legend>
			<div class="and">
				<?php
					echo $this->Form->input('types', array('label' => 'Type'));
					echo $this->Form->input('communities', array('label' => 'Community', 'empty' => true));
					echo $this->Form->input('places', array('label' => 'Place'));
					echo $this->Form->input('min_range', array('type' => 'date', 'label' => 'Arrival'));
					echo $this->Form->input('max_range', array('type' => 'date', 'label' => 'Departure'));
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