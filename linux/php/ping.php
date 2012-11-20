<?php

/**
 * ping function for PHP without using exec/system/passthrough/etc... 
 * Very useful to use to just test if a host is online 
 * before attempting to connect to it. Timeout is in seconds
 * 
 * @see http://www.php.net/manual/en/function.socket-create.php#101012
 */
function ping($host, $timeout = 1) {
	/* ICMP ping packet with a pre-calculated checksum */
	$package = "\x08\x00\x7d\x4b\x00\x00\x00\x00PingHost";
	//root permission required to create socket of type SOCK_RAW
	$socket  = socket_create(AF_INET, SOCK_RAW, getprotobyname('icmp'));

	if ($socket) {
		socket_set_option($socket, SOL_SOCKET, SO_RCVTIMEO, array('sec' => $timeout, 'usec' => 0));
		socket_connect($socket, $host, null);

		$ts = microtime(true);

		socket_send($socket, $package, strLen($package), 0);

		if (socket_read($socket, 255)) {
			$result = microtime(true) - $ts;
		} else {   
			$result = false; 
		}

		socket_close($socket);
	} else {
		error_log(socket_strerror(socket_last_error()));
		$result = false;
	}

	return $result;
}

if (ping($argv[1], $argv[2])) {
	echo "Connected.\n";
} else {
	echo 'Failed to connect.' . "\n";
}
