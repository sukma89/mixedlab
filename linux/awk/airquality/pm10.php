<?php

$input = fopen('php://stdin', 'r');

if ($input) {
	while ($line = fgets($input)) {
		echo $line;
	}	
	fclose($input);
	echo "Done\n";
} else {
	echo "Failed to open stream\n";
}
