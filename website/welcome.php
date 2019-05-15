<?php

	session_start();
	
	if (!isset($_SESSION['udanarejestracja']))
	{
		header('Location: index.php');
		exit();
	}
	else
	{
		unset($_SESSION['udanarejestracja']);
	}
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	
	<title>YouAreMoving</title>
	<style>
	body{
		background-color: #f9f9d6;
		}
	</style>
</head>

<body>
	Thank you for signing up! You can now log in to your new account!
	<br />
	
	<a href="index.php">
	<input type="button" value="Log In"> 
	</a>
</body>
</html>
