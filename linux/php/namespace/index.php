<?php
namespace project;
include 'cn/fwso/php/User.php';

use \cn\fwso\php as cphp;

//$user = new \cn\fwso\php\User('James Tang');//OK
//$user = new cn\fwso\php\User('James Tang');//Fail, project\cn\fwso\php\User does not exists.
$user = new cphp\User('James Tang');//OK

echo $user->info() . "\n";//cn\fwso\php\cn\fwso\php\User#name:James Tang


