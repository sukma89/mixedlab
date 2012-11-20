<?php
require 'common.php';
require 'util.php';
use cn\fwso\util as u;

$email = new cn\fwso\common\Email();
echo $email->toString() . "\n";

echo cn\fwso\util\util() . "\n";

