<?php

error_log('Hello, world Error X0001');

$headers = 'Content-type: text/html;charset=utf-8';
error_log('Hello, world Error X0002', 1, 'james.tang@bysoft.fr', $headers);


error_log('Hello, world Error X0003', 3, dirname(__FILE__) . 
	DIRECTORY_SEPARATOR . 'error.log');

error_log('Hello, world Error X0004', 4);

