<div class="communities_view">
<h2><?php  __('Community');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $community['Community']['name']; ?>
			&nbsp;
		</dd>
	</dl>
<?php echo $this->element("properties-list",array("properties"=>$community['Property']));?>
</div>