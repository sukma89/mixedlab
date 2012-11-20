#!/usr/local/bin/php
<?php
declare(ticks=1);

$pid = pcntl_fork();

if ($pid == -1) {
	die("Could not fork\n");
} else if ($pid) {
	exit();
} else {

}

if (posix_setsid() == -1) {
	die("Could not detach from terminal\n");
}

pcntl_signal(SIGTERM, "sig_handler");
pcntl_signal(SIGHUP, "sig_handler");

$_running = 1;

while ($_running) {
	
	usleep(1000000);	
	$file = fopen('/tmp/php_daemon_x.log', 'a+');
	
	if ($file) {
		$_r = file_get_contents('http://192.168.1.222/access.php');
		fwrite($file, 'Log: ' . $_r . "\t" . date('Y-m-d H:i:s') . "\n");	
		fclose($file);
	}	
		
}

function sig_handler($signo) {
	switch ($signo) {
	case SIGTERM:
		exit;
		break;

	case SIGHUP:

		break;

	default:

		break;
	}
}

