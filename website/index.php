<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: yam-zalogowany.php');
		exit();
	}
	
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="Description" content="This site is made for you to help create the best version of you!"/>
	<meta name="Keywords" content="you,are,moving,training,nutrition,exercises,calisthenics,weightlifting,bodybuilding"/>
	<link rel="stylesheet" href="index.css">	
	<title>YouAreMoving - Login</title>
</head>

<body>
	<h2>Welcome to YouAreMoving.com!</h2>
	<h3>To have full access to website, please sign in!</h3>
	<br />
	
	<form action="login.php" method="post">
	
		Nickname: <br /> <input type="text" name="login" /> <br />
		Password: <br /> <input type="password" name="password" /> <br /><br />
		<input type="submit" value="Log In" />
		<a href="signup.php">
		<input type="button" value="Sign Up" /></a>
	</form>
	
	<div id="logo">
	<img src="tlo.jpg" alt="tlo">
	</div>
	
	
<?php
	if(isset($_SESSION['blad']))
	{		
		echo $_SESSION['blad'];
	}
?>

</body>
</html>
