<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>つくたび</title>
	<?php echo $this->Html->css(array('reset','slider-pro.min' , 'uikit.min','users'));?>

<script type="text/javascript" src="<?php echo "$webroot";?>/js/upload.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="/debug_kit/css/debug_toolbar.css" /> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<?php echo $this->Html->script(array('uikit'));?>

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