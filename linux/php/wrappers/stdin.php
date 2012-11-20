<?php
/**
 * php://stdin can be useful when you want to read stdin
 * for CLI scripts:
 *
 * sed 's/yahoo/goole/g' file.txt | dosth.php
 * @see http://cn2.php.net/manual/en/wrappers.php.php
 */
$input = fopen('php://stdin', 'r');

if ($input) {
	while ($line = fgets($input)) {
		echo $line;
	}	
	fclose($input);
	echo "Done\n";
} else {
	echo "Failed to read stdin stream\n";
}
