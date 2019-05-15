<?php 
if (isset($_POST['send_message_btn'])) {
  $nickname = $_POST['nickname'];
  $mail = $_POST['mail'];
  $subject = $_POST['subject'];
  $text = $_POST['text'];
  // Content-Type helps email client to parse file as HTML 
  // therefore retaining styles
	$headers =  'MIME-Version: 1.0' . "\r\n"; 
	$headers .= 'From: Your name <$nickname>' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
	$message = "<html>
  <head>
  	<title>New message from website contact form</title>
  </head>
  <body>
  	<h1>" . $subject . "</h1>
  	<p>".$text."</p>
	<p> Nickname of user: ".$nickname."</p>
	<p>E-mail Address of user: ".$mail."</p>
  </body>
  </html>";
  if (mail('bartoszdopke@gmail.com', $subject, $message, $headers)) {
   echo "Email sent! \n";
   
  }else{
   echo "Failed to send email. Please try again later";
  }
  
}
?>
<!doctype html>
<html lang="en-US">
<head>
<title>YouAreMoving - E-mail sent</title>
</head>
<body>
<br />
<a href="index.php">
<button>Return to main page</button></a>
</body>
</html>
