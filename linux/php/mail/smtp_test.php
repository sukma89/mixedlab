<html>
<head>
<title>PHPMailer - SMTP advanced test</title>
</head>
<body>

<?php
require_once('mail_config.php');
require_once('class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

$mail->IsSMTP(); // telling the class to use SMTP

try {
  $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
  $mail->Host       = SMTP_HOST;
  $mail->Port       = SMTP_PORT;
  $mail->Username   = SMTP_USER;
  $mail->Password   = SMTP_PASS;
  $mail->AddAddress(SMTP_TO, SMTP_NAME);
  $mail->SetFrom(SMTP_FROM, SMTP_NAME);
  $mail->AddReplyTo(SMTP_REPLY, SMTP_NAME);

  //$mail->AddAddress('fwso@163.com', '163 Mail');
  //$mail->AddCC('fwsous@gmail.com', 'Gmail');
  //$mail->AddBCC('eh.pharm@gmail.com', 'Gmail');

  $mail->Subject = 'PHPMailer Test Subject via mail(), advanced';
  $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
  $mail->MsgHTML(file_get_contents('contents.html'));
  //$mail->AddAttachment('images/phpmailer.gif');      // attachment
  //$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
  $mail->AddAttachment('files/peter-resume.doc');
  $mail->Send();
  echo "Message Sent OK</p>\n";
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}
?>

</body>
</html>
