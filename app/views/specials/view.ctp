<div class="specials_view">
<h2><?php  __('Special');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $special['Special']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $special['Special']['description']; ?>
			&nbsp;
		</dd>
	</dl>
<?php echo $this->element("properties-list",array("properties"=>$special['Property']));?>
</div>
