<?php $specials = $this -> requestAction("/specials/lasts");?>
<ul class="last-specials lasts">
	<?php foreach($specials as $special):
	?>
	<li>
		<h2 class="title">
		<?php
			if(!empty($special["Property"][0])) {
				echo $html -> link($special["Special"]["name"], array("controller" => "properties", "action" => "view", $special["Property"][0]["id"]));
			}
		?>
		</h2>
		<p class="content">
			<?php echo $special["Special"]["description"];?>
		</p>
	</li>
	<?php endforeach;?>
</ul>