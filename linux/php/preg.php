<?php
$str = 'Hello, james!<h1>Hello</h1>';
echo $str . "<br />\n";
if (preg_match('/<\w+>\w+<\/\w+>/i', $str)) {
	echo 'Match. ' . "<br />\n";
} else {
	echo 'NOT match.<br />' . "\n";
}
