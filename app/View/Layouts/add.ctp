<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php echo $title_for_layout?></title>


    <?php echo  $this->Html->script("plupload.full.min.js");?>


    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <!-- Generic page styles -->

    <!-- blueimp Gallery styles -->
    <link rel="stylesheet" href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <?php echo $this->html->css(array('jquery.fileupload','jquery.fileupload-ui','uikit'));?>

    <!-- CSS adjustments for browsers with JavaScript disabled -->
    <noscript><link rel="stylesheet" href="cakephp/css/jquery.fileupload-noscript.css"></noscript>
    <noscript><link rel="stylesheet" href="cakephp/css/jquery.fileupload-ui-noscript.css"></noscript>

</head>
<body>
<script type="text/javascript">
//// jquery ui sortableのやつ
//$(function() {
//	$('.sortable').sortable();
//	$('.sortable').disableSelection();
//});
</script>

			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</body>

</html>