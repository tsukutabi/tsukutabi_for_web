<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<?php echo $this->Html->css(array('reset','slider-pro.min','index','uikit.min'));?>
<title>つくたび  <?php echo $title_for_layout;?></title>
<!-- <link rel="stylesheet" type="text/css" href="/debug_kit/css/debug_toolbar.css" /> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<?php echo $this->Html->script('uikit.js');?>


<link rel="stylesheet" type="text/css" href="/debug_kit/css/debug_toolbar.css" />
<script type="text/javascript">
//<![CDATA[
window.DEBUGKIT_JQUERY_URL = "/debug_kit/js/jquery.js";
//]]>
</script><script type="text/javascript" src="/debug_kit/js/js_debug_toolbar.js"></script>


</head>
<body>
<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>


		</body>
</html>