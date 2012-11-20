<?php
$body = file_get_contents('php://input');

if (strlen($body) > 0 && ($json = json_decode($body)) ) {
	echo 'ID: ' . $json->id . "<br />\n";
	echo 'Method: ' . $json->method . "<br />\n";
} else {
	echo 'Failed to decode json.';
}	

