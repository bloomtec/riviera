<ul class="property-gallery">
	<?php foreach($pictures as $picture):?>
		<li><?php echo $html->image('pictures/' .$picture["path"]);?></li>
	<?php endforeach;?>
</ul>
