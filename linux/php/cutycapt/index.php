<?php
$url = 'http://www.google.com.hk';
$filename = md5($url.time()) . '.png';
$cutycapt = 'xvfb-run -f /tmp/xvfb-cutycapt --server-args="-screen 0, 1024x768x32" /home/james/cutycapt/bin/CutyCapt';
$cmd = $cutycapt . ' --url=' . $url . ' --out=images/' . $filename;

//echo 'Execute: ', $cmd, '<hr />';

system($cmd, $return_var);

//echo exec($cmd, $output, $return_var);
//var_dump($output);

//echo '<hr />' , 'Return status: ', $return_var;

