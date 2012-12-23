<?php
/**
 * PHP version of type-o-serve of:
 * HTTP: The definitive guide, by David gourley, Brian Totty
 */

$port = isset($argc) && $argc > 1 ? $argv[1] : 8080;

$server = socket_create(AF_INET, SOCK_STREAM, getprotobyname('tcp'));

if (!is_resource($server)) {
    die('Failed to create socket: ' . 
        socket_strerror(socket_last_error()));
}

if (!socket_set_option($server, SOL_SOCKET, SO_REUSEADDR, 1)) {
    die('Failed to set option on socket: ' .
        socket_strerror(socket_last_error()));
}

if (!socket_bind($server, '127.0.0.1', $port)) {
    die('Failed to bind socket: ' .
        socket_strerror(socket_last_error()));
}

if (!socket_listen($server, SOMAXCONN)) {
    die('Failed to listen socket: ' .
        socket_strerror(socket_last_error()));
}

$pid = getmypid();
echo "   <<<Type-O-Serve accept on Port $port, pid: $pid>>>\n\n";

$i = 0;
while (1) {
    $client = socket_accept($server);
    if (!is_resource($client)) {
        echo 'Failed to accept connection: ' . 
            socket_strerror(socket_last_error());
    } else {
        echo '   <<<Connection count: ' . (++$i) . ">>>\n";
        $new_line = true;
        $first = true;
        $valid = true;
        while (($ch = socket_read($client, 1)) !== FALSE) {
            if ($first && $ch == '') {
                $valid = false;
                break;
            }
            if ($first) $first = false;
            if ($new_line && $ch == "\r") break;
            if ($ch != "\r") {
                echo $ch;
                $new_line = !$new_line && $ch == "\n";
            }
        }

        if ($valid) {
            echo "\n   <<<Type response followed by '.'>>>\n";

            $in = fopen('php://stdin', 'r');

            while ($line = fgets($in)) {
                $line = str_replace(array("\r", "\n"), array('', ''), $line);
                if ($line == '.') break;
                socket_write($client, $line . "\r\n");
            }

            echo "   <<<Waiting>>>\n\n";

            fclose($in);
        }
    }
    socket_shutdown($client, 2);
}

socket_close($server);

