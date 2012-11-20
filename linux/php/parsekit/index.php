<?php

$phpstr = "echo 'Hello, world!';";

$opcode = parsekit_compile_string($phpstr, $errors, PARSEKIT_QUIET);

echo '<pre>';
print_r($opcode);
echo '</pre>';
