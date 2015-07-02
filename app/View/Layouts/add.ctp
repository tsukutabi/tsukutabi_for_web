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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<?php echo $this->html->css(array('reset','fine-uploader-new','jquery.fileupload-ui','uikit','postsadd'));?>
<?php echo $this->html->script(array('jquery-ui.js','uikit.js','jquery.fine-uploader.js'));?>
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