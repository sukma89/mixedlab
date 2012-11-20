<?php
define('CONSTANT', 1);
define('_CONSTANT', 0);
define('EMPTY', '');

if (!empty(EMPTY)) {
	if ( ! (boolean) _CONSTANT) {
		print 'One';
	}
} else if (constant('CONSTANT') == 1) {
	print 'Two';
}

echo "\n";


