<?php
header('Content-Type:text/html;charset=utf-8');

$input = <<<STR
	<h1>Hello, world</h1>
	<p><em>H</em>ello world! is a very simple and popular program for
	beginers</p>
	<script type="text/javascript">
		document.write('<div style="font-size:40px;color:#F00;">Hello, world!</div>');
	</script>
	<hr />
	<p>&nbsp; is the entity fo blank character in HTML.</p>
	<p>&copy; is html entity for "copyright" (C) sign.</p>
	<p>&gt; = > = &#62</p>
	<p>&#039;'中国人'&#039;&ok;</p>
	--ChinaÛ--
	<hr />
STR;


echo $input;

echo '<hr style="border:1px solid #F00;" />';

echo htmlspecialchars($input);
echo '<hr style="border:1px solid #F00;" />';
echo htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
echo '<hr style="border:1px solid #F00;" />';
echo htmlspecialchars($input, ENT_NOQUOTES, 'UTF-8');
echo '<hr style="border:1px solid #F00;" />';
echo htmlspecialchars($input, ENT_NOQUOTES, 'UTF-8', false);
echo '<hr style="border:1px solid #F00;" />';
echo htmlentities($input, ENT_NOQUOTES, 'UTF-8', false);
