<?php $properties=$this->requestAction("/properties/slide");?>
<ul class="property-gallery">
	<?php foreach($properties as $property):?>
		<li><?php echo $html->image('pictures/' . $property['Property']['picture']); ?></li>
	<?php endforeach;?>
</ul>