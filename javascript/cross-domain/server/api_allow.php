<?php
/**
 * API 
 *
 * @see http://www.w3.org/TR/cors/
 * @see https://developer.mozilla.org/en-US/docs/HTTP_access_control
 * @see https://developer.mozilla.org/en-US/docs/Server-Side_Access_Control
 * @author James Tang<fwsous@gmail.com>
 * @version 1.0
 */

$data = include "data.php";

if (isset($_SERVER['HTTP_ORIGIN'])) {
    $data['http_origin'] = $_SERVER['HTTP_ORIGIN'];
}

if (isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['HTTP_ORIGIN'] == 'http://localhost:9900') {

    header('Access-Control-Allow-Origin: '.$_SERVER['HTTP_ORIGIN']);
    header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
    header('Access-Control-Max-Age: 1000');
    header('Access-Control-Allow-Headers: Content-Type');

    header('Content-Type: application/json;charset=utf-8');

    echo json_encode($data);
}

