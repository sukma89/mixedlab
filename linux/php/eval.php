<?php

$code = <<<CODE
	\$name = 'James Tang';
	echo 'Hello, ' . \$name . "<br />\n";
CODE;

$code2 = <<<CODE
	<h1>Hello, world</h1>
	<?php
	\$name = 'James Tang';
	echo 'Hello, ' . \$name . "<br />\n";
	?>
CODE;

eval($code);
echo '<hr />';
eval('?>' . $code);
echo '<hr />';

eval('?>' . $code2);
echo '<hr />';
eval($code2);