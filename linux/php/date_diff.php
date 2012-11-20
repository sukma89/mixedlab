<?php

$date_start = new DateTime('2009-02-01');
$date_end = new DateTime('2011-01-01');

$diff = $date_end->diff($date_start);

//var_dump($diff);
echo $diff->y. '#' . $diff->m . '#' . $diff->d. "<br />\n";


