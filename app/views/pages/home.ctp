<div class="home">
	<?php echo $this -> Html -> link(__('Search', true), array('controller' => 'searches', 'action' => 'search'));?>
</div>
<ul class="nav">

	<li>
		<?php echo $html -> link("List Communities", array("controller" => "communities", "action" => "index"));?>
	</li>

	<li>
		<?php echo $html -> link("List Places", array("controller" => "places", "action" => "index"));?>
	</li>

	<li>
		<?php echo $html -> link("List Specials", array("controller" => "specials", "action" => "index"));?>
	</li>

	<li>
		<?php echo $html -> link("List Categories", array("controller" => "categories", "action" => "index"));?>
	</li>

	<li>
		<?php echo $html -> link("List Features", array("controller" => "features", "action" => "index"));?>
	</li>

</ul>