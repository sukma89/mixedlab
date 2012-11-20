<?php
$html = <<<HTML
<?xml version="1.0" encoding="ISO-8859-1"?>
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>XML Example</title>
</head>
<body>
	<p>
	Move to &lt;
		<a href="http://example.org/">http://www.example.org/</a>&gt;
		<a href="http://fwso.cn">Fwso.cn</a>
		<br />
	</p>
</body>
</html>
HTML;

//echo $html;
$sxe = simplexml_load_string($html);
//var_dump($sxe->body->p[0]->a);

echo $sxe->body->p[0]->a[1]['href'] . "\n";
//var_dump($sxe);

