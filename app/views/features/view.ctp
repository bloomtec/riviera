<div class="features_view">
<h2><?php  __('Feature');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $feature['Feature']['name']; ?>
			&nbsp;
		</dd>
	</dl>
<?php echo $this->element("properties-list",array("properties"=>$feature['Property']));?>
</div>