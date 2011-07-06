<?php $news=$this->requestAction("/news/lasts");?>
<ul class="last-news lasts">
	<?php foreach($news as $new):?>
		<li>
			<h2 class="title">
			<?php echo $html->link($new["News"]["title"],$new["News"]["link"]);?>
			</h2>
			<p class="content">
			<?php echo $new["News"]["content"];?>
			</p>
		</li>
	<?php endforeach;?>
</ul>