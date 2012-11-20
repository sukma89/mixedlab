#!/usr/local/bin/php
<?php
$outfile = '/home/james/log/time.log';

$handler = fopen ($outfile, 'a');

if ($handler) {
	$str = 'Ran at ' . date('Y-m-d H:i:s') . 
		(isset($argv[1]) ? ' [' . $argv[1] . ']' : '') .  "\n";
	fwrite($handler, $str);
	fclose($handler);
}


