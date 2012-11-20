<?php
/**
 * 
 *
 * @author James Tang<fwsous@gmail.com>
 * @version 1.0
 */

$data = array();

$data['name'] = $_POST['name'];
$data['email'] = $_POST['name'] . '@fwso.cn';
$data['password'] = $_POST['password'];

echo json_encode($data);
