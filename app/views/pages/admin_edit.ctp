<div class="pages">
<?php echo $this->Form->create('Page');?>
	<fieldset>
 		<legend><?php __('Modificar'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title',array("div"=>"float"));
		echo $this->Form->input('slug',array("div"=>"float"));
		echo $this->Form->input('description');
		
		//echo $this->Form->input('order');
		echo $this->Form->input('content',array("name"=>"editor"));
		
	?>
	</fieldset>
<?php echo $this->Form->end("Guardar");?>
</div>

<script type="text/javascript">
					CKEDITOR.replace( 'editor',{
        				filebrowserUploadUrl : '/upload.php',
        				filebrowserBrowseUrl : '/admin/pages/wysiwyg',


					} );
	
</script>