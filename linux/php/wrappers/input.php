<?php

function readRawInput($wrapper='php://input') {
	$fp = fopen($wrapper, 'r');

	if ($fp) {
		$raw = stream_get_contents($fp);
		return $raw;
		fclose($fp);
	}
	return false;
}

$wrapper = PHP_SAPI == 'cli' ? 'php://stdin' : 'php://input';

$raw = readRawInput($wrapper);

if ($raw) {
	echo $raw;
	echo "\n";
} else {
	echo "Failed to read content.\n";
}

