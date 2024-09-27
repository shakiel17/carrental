<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>Agreement Signature</title>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
<link href="<?=base_url();?>design/admin/sig/css/jquery.signature.css" rel="stylesheet">
<style>
.kbw-signature { width: 400px; height: 200px; }
</style>
<!--[if IE]>
<script src="excanvas.js"></script>
<![endif]-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="<?=base_url();?>design/admin/sig/js/jquery.signature.js"></script>
<script>
$(function() {
	var sig = $('#sig').signature({syncField: '#result', syncFormat: 'PNG'});
	$('#disable').click(function() {
		var disable = $(this).text() === 'Save';
		$(this).text(disable ? 'Edit' : 'Save');
		sig.signature(disable ? 'disable' : 'enable');
        var data = sig.signature('toDataURL');
		document.getElementById("result").value = data;
	});
	$('#clear').click(function() {
		sig.signature('clear');
        document.getElementById("result").value = '';
	});
	$('#json').click(function() {
		alert(sig.signature('toJSON'));
	});
	$('#svg').click(function() {
		alert(sig.signature('toSVG'));
	});
	$('#next').click(function() {
		var data = sig.signature('toDataURL');
		document.getElementById("result").value = data;
	});
});
</script>
</head>
<body>
<h1>Agreement Signature <a href="<?=base_url();?>manage_agreement/<?=$id;?>">Back</a></h1>
<div id="sig"></div>
<p style="clear: both;">
	<!-- <button id="disable">Save</button>  -->	
	<!-- <button id="json">To JSON</button>
	<button id="svg">To SVG</button> -->
	<?=form_open_multipart(base_url()."save_signature");?>
    <input type="hidden" name="id" value="<?=$id;?>">
    <button id="clear" type="button">Clear</button> 
    <button type="submit" name="submit">Submit</button>
</p>
<textarea id="result" name="file" rows="4" cols="100"></textarea>
<?=form_close();?>
</body>
</html>
