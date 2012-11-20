<?php
/**
 * API 
 *
 * @author James Tang<fwsous@gmail.com>
 * @version 1.0
 */

$data = include "data.php";

header('Content-Type: application/json;charset=utf-8');

echo json_encode($data);

