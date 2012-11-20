<?php
libxml_use_internal_errors(true);
$sxe = simplexml_load_string("<?xml version='1.0'><broken><xml></broken>");
if (!$sxe) {
	echo "Failed loading XML\n";
	foreach(libxml_get_errors() as $error) {
		echo "\t", $error->message;
	}
}
