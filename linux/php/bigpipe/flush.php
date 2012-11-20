<!DOCTYPE html>
<html>
<head>
<title>test</title>
</head>
<body>

<?php sleep(1); ?>
<div id="header"><?php echo str_pad('header', 1024); ?></div>
<?php ob_flush(); flush(); ?>

<?php sleep(3); ?>
<div id="content"><?php echo str_pad('content', 1024); ?></div>
<?php ob_flush(); flush(); ?>

<?php sleep(1); ?>
<div id="footer"><?php echo str_pad('footer', 1024); ?></div>
<?php ob_flush(); flush(); ?>

</body>
</html>

