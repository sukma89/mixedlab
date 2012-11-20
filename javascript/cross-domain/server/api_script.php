<?php
/**
 * API 
 *
 * @author James Tang<fwsous@gmail.com>
 * @version 1.0
 */

$data = include "data.php";

header('Content-Type: application/javascript;charset=utf-8');

echo 'var _data = ' . json_encode($data) . ';renderData(_data);';

