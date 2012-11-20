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

if (isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['HTTP_ORIGIN'] == 'http://localhost:9900') {

    header('Access-Control-Allow-Origin: '.$_SERVER['HTTP_ORIGIN']);
    header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
    header('Access-Control-Max-Age: 1000');
    header('Access-Control-Allow-Headers: Content-Type');

    header('Content-Type: application/json;charset=utf-8');
    echo json_encode($data);
}

