$(document).ready(function() {
	var server = '/';
	$('#upload').uploadify({
		'uploader' : server + 'swf/uploadify.swf',
		'script' : server + 'uploadify.php',
		'folder' : server + 'app/webroot/img/pictures',
		'auto' : true,
		'cancelImg' : server + 'img/cancel.png',
		'onComplete' : function(a, b, c, d) {
			
		}
	});

	$('#single-upload').uploadify({
		'uploader' : server + 'swf/uploadify.swf',
		'script' : server + 'uploadify.php',
		'folder' : server + 'app/webroot/img/pictures',
		'auto' : true,
		'cancelImg' : server + 'img/cancel.png',
		'onComplete' : function(a, b, c, d) {
			var name = c.name;
			$(".preview").html('<img  src="' + d + '" />');
			var file = d.split("/");
			var nombre = file[(file.length - 1)];
			var name = c.name;
			$("#single-field").val(name);
			$.post(server + "pictures/resizeImage", {name:nombre,folder:'pictures'}, function(data){
			
			});

		}
	});
	
});