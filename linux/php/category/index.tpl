<!DOCTYPE html>
<html>
<head>
<title>Category Menu</title>
<meta charset="utf-8">
</head>
<body>

<div id="menuBox">
	<h2>分类</h2>
	<?php echo $util->getHtmlTree(); ?>
</div>

<div id="footer">
	Max Depth: <?php echo $util->getMaxDepth(); ?>
</div>
</body>
</html>
