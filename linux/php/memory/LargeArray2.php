<?php
$base = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$arr = array();

while (true) {
    sleep(1);
    $str = '';

    for($i = 0; $i < 10240; $i++) {
        $str .= $base[mt_rand(0, 61)];
    }

    $arr[] = $str;
    echo count($arr). '#PID: ' . getmypid() . ', MEM: ' . (memory_get_usage()/1024)  . 'KB, ' . (memory_get_usage(true)/1024) . "KB\n";
}
