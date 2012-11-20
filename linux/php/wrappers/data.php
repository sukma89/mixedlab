<?php
/**
 * Demo of using data schema.
 *
 * NOTE:
 * allow_url_include should be enabled, but it
 * may cause code injection, so you'd better not
 * enable it on product server.
 * I just enabled it for CLI.
 * 
 * @author James Tang<fwsous@gmail.com>
 * @see http://cn2.php.net/manual/en/wrappers.data.php
 */
ini_set('allow_url_include', 'On');

$content = '<?php
function _stored_function($args) {
	if (is_array($args)) {
		foreach ($args as $key=>$v) {
			echo $key . \'=>\' . $v . "\n";
		}
	} else {
		echo $args;
	}	
}';

include "data://text/plain;base64," . base64_encode($content);

_stored_function(array(
	'name' => 'James Tang',
	'email' => 'fwsous@gmail.com'
));
