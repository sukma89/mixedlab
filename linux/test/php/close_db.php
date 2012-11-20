<?php
if (isset($db) && get_class($db) == 'mysqli') {
	$db->close();
	echo "Database connection closed\n";
}

