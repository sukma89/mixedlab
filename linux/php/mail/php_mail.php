<?php
define('TIMESTAMP', time());
define('DEFAULT_MAIL', 'james.tang@bysoft.fr');
//define('DEFAULT_MAIL', 'fwsous@gmail.com');

$to = isset($_GET['to']) ? $_GET['to'] : DEFAULT_MAIL;
$from = isset($_GET['from']) ? $_GET['from'] : DEFAULT_MAIL;
$replyto = isset($_GET['replyto']) ? $_GET['replyto'] : DEFAULT_MAIL;

$subject = 'PHP Mail Test [' . date('Y-m-d H:i:s', TIMESTAMP) . ']';

$message = '<!DOCTYPE html><html><head><title>PHP Mail</title></head>' .
	'<body><h1>Hello, James!</h1><p> PHP Mail test</p>'. 
	'<p>Send Timestamp: ' . date('Y-m-d H:i:s', TIMESTAMP) . '</p>' .
	'</body></html>';
	
$header = 'From:' . $from . "\r\n" .
		'Replay-To:' . $replyto . "\r\n" .
		'MIME-Version:1.0' . "\r\n" .
		'Content-Type:text/html;charset=utf-8' . "\r\n" .
		'X-Mailer: PHPSendMail/' . phpversion();


echo 'Sending mail: <br />' . "\n";
echo 'To: ' . $to . '<br />' . "\n";
echo 'From: ' . $from . '<br />' . "\n";
echo 'Reply To: ' . $replyto . '<br />' . "\n";		
		
if (mail($to, $subject, $message, $header)) {
	echo '[OK]Mail send successfully.<br />' . "\n";
} else {
	echo '[NO]Failed to send mail<br />' . "\n";
}

echo '<hr />Done.' . "\n";


