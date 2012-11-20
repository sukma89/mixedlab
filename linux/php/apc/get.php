<?php

echo '<h1>Fetching APC data</h1>';
$tobj = apc_fetch('objc');
var_dump($tobj);
