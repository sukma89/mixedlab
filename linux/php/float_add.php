<?php
$start = 1309935303.949547;
$end =  1309935311.325193;
//Consumed: 7.3756458759308
echo 'R: ' . ($end - $start) . "\n";
echo 'R: ' . bcadd($end, bcmul($start, -1, 6), 6) . "\n";

$start = 1.949547;
$end = 2.325193;

echo 'R: ' . ($end - $start) . "\n";
