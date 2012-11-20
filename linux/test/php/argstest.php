#!/usr/bin/php
<?php

if (isset($argc)) {
	echo 'Arguments: ' . $argc . "\n";
}

if (isset($argv)) {
	
	foreach ($argv as $key=>$v) {
		echo 'ARG[' . $key . ']' . $v . "\n";
	}
}



