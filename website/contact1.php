<!DOCTYPE html>
<html lang="en-US">
<head>
<title>YouAreMoving - Contact</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="contact.css">
</head>
<body>
<h3>Contact us!</h3>

<div class="container">
  <form action="contact.php" method="post">

    <label for="nickname">Nickname</label>
    <input type="text" id="nickname" name="nickname" placeholder="Your nickname..">

	<label for="mail">E-mail Address</label>
    <input type="text" id="mail" name="mail" placeholder="E-mail Address..">
	
	<label for="subject">Subject</label>
    <input type="text" id="subject" name="subject" placeholder="Subject..">

    <label for="text">Text</label>
    <textarea id="text" name="text" placeholder="Write something.." style="height:200px"></textarea>

    <button type="submit" name="send_message_btn">Send</button>
</form>
</div>
<?php
	//session_start();
	//nickname to zmienna gdzie sa dane loginu z okna logowania!
	

if (empty($_POST['firstname']) Or empty($_POST['lastname']) 
		Or empty($_POST['mail']) Or empty($_POST['subject'])) { 
		echo "<span style=\"color: #FF0000; text-align: center;\">Wypełnij wszystkie pola formularza!</span>";
	}
?>

</body>
</html>