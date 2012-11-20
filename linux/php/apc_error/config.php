<?php
/**
 * Configuration of apc_error application
 * @package apc_error
 * @version 1.0
 * @author James Tang <james@fwso.cn>
 * @copyright (C) 2011 fwso.cn.
 */

define ('WEB_PATH_DIR', dirname(__FILE__) . '/');
define ('MYSQL_HOST', 'localhost');
define ('MYSQL_USER', 'root');
define ('MYSQL_PASS', '123456');
define ('MYSQL_DB', 'company_core');
define ('SESSION_MAX_LIFETIME', ini_get('session.gc_maxlifetime'));

define ('SESSION_TABLE', 'sessions');

