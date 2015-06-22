<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title_for_layout?></title>
<!-- <link rel="stylesheet" type="text/css" href="/debug_kit/css/debug_toolbar.css" /> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
<!-- 	<?php echo $this->Html->script(array('uikit'));?>
 -->

<!-- Bootstrap styles -->
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<!-- Generic page styles -->
<!-- blueimp Gallery styles -->
<link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">

<?php echo $this->html->css(array('jquery.fileupload','jquery.fileupload-ui'));?>
</head>
<body>
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</body>
</html>