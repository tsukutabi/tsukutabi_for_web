<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title><?php echo $title_for_layout?></title>
	<?php echo $this->Html->css(array('reset','slider-pro.min' , 'uikit.min','user'));?>
<!-- <link rel="stylesheet" type="text/css" href="/debug_kit/css/debug_toolbar.css" /> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<?php echo $this->Html->script(array('uikit'));?>

<script type="text/javascript">
//<![CDATA[
window.DEBUGKIT_JQUERY_URL = "/debug_kit/js/jquery.js";
//]]>
</script><script type="text/javascript" src="/debug_kit/js/js_debug_toolbar.js"></script>
</head>
<body class="uk-height-1-1">
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
</body>
</html>