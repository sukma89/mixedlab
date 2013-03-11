<?php
define('DB_NAME', 'YOUR_DB_NAME');

/** MySQL database username */
define('DB_USER', 'YOUR_DB_USER');

/** MySQL database password */
define('DB_PASSWORD', 'YOUR_DB_PASSWORD');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($mysqli->connect_errno) {
	die('Error: ' . $mysqli->connect_errno . '#' . $mysqli->connect_error. "\n");
}

$mysqli->query("SET NAMES " . DB_CHARSET);

$sql = "SELECT * FROM fwso_options WHERE option_name='active_plugins'";
$rs = $mysqli->query($sql);

if ($rs && $row = $rs->fetch_assoc()) {
	$active_plugins = unserialize($row['option_value']);
	$rs->close();
} else {
	$active_plugins = array();
}

//TODO: Change the plugin path:
$plugin_path = 'google-authenticator/google-authenticator.php';

$key = array_search($plugin_path, $active_plugins);

if ($key !== false) {
	unset($active_plugins[$key]);
	$v = $mysqli->real_escape_string(serialize($active_plugins));
	$sql = "UPDATE fwso_options SET option_value='$v' WHERE option_name='active_plugins'";
	$mysqli->query($sql);
	if ($mysqli->errno) {
		echo "Error: " . $mysql->errno . '#' . $mysql->error . "\n";
	} else {
		echo "Done\n";
	}
} else {
	echo "Plugin not in active list.\n";
}

$mysqli->close();

