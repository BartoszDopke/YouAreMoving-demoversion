<?php
	session_start();

	if(isset($_POST['email']))
	{
		//validation done right
		$goodvalid = true;
		
		//check if nickname is correct
		$nick = $_POST['nick'];
		//check the length of nickname
		if((strlen($nick)<3) || (strlen($nick)>20))
		{
			$goodvalid = false;
			$_SESSION['e_nick']="Nickname has to have at least 3 characters but not more than 20!";
			
		}
		
		//check if mail address is correct
		$email = $_POST['email'];
		$emailB = filter_var($email,FILTER_SANITIZE_EMAIL); //mail safe
		
		if((filter_var($emailB,FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$goodvalid=false;
			$_SESSION['e_email']="E-mail address is wrong. Try again!";
		}
		
		//check if password is corect
		$password = $_POST['password'];
		$password2= $_POST['password2'];
		
		if((strlen($password)<8) || (strlen($password)>20))
		{
			$goodvalid=false;
			$_SESSION['e_pass']="Password should has at least 8 characters but no more than 20!";
		}
		if($password!=$password2)
		{
			$goodvalid=false;
			$_SESSION['e_pass2']="Passwords are diferrent!";
		}
		
		$password_hash = password_hash($password,PASSWORD_DEFAULT);
		
		//check if terms are accepted
		if(!(isset($_POST['terms'])))
		{
			$goodvalid=false;
			$_SESSION['e_terms']="Accept the rules!";
		}
		
		//bot or not? oto jest pytanie!
		$sekret = "6Leci4gUAAAAAGc-QJmbx3RQeC-dOAPqAvU3tGf3";
		$check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
		$responsegoogle = json_decode($check);
		
		if($responsegoogle->success==false)
		{
			$goodvalid=false;
			$_SESSION['e_bot']="Confirm that you are human!";
		}
		
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT); //zamiast warningów, wyrzuca wyjątki
		
		
		try
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				//does mail already exist?
				$rezultat = $polaczenie->query("SELECT id FROM users WHERE mail = '$email'");
				
				if(!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$goodvalid=false;
					$_SESSION['e_email']="There is an account assigned to this e-mail address!";
				}
				//does login already exist?
				$rezultat = $polaczenie->query("SELECT id FROM users WHERE nickname = '$nick'");
				
				if(!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_nickow = $rezultat->num_rows;
				if($ile_takich_nickow>0)
				{
					$goodvalid=false;
					$_SESSION['e_nick']="There is an user who is using that nickname. Choose another one!";
				}
				if($goodvalid==true)
				{
					if($polaczenie->query("INSERT INTO users VALUES (NULL,'$nick','$password_hash','$email',1)"))
					{
						$_SESSION['udanarejestracja']=true;
						header('Location:welcome.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
				
				
				}			
				$polaczenie->close();
			}
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Server error! Try to sign up later!</span>';
			echo'< /br>Developer information: '.$e;
		}		
		
	}
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>YouAreMoving - Create Free Account!</title>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<style>
	.error
	{
		color:red;
	}
	body{
		background-color: #f9f9d6;
		}
</style>
<body>
	
	<form method="post">
	
	Nickname: <br /> <input type="text" name="nick" /><br />
	
	<?php
	if(isset($_SESSION['e_nick']))
	{
		echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
		unset($_SESSION['e_nick']);
	}
	?>
	E-mail: <br /> <input type="text" name="email" /><br />
	
	<?php
	if(isset($_SESSION['e_email']))
	{
		echo '<div class="error">'.$_SESSION['e_email'].'</div>';
		unset($_SESSION['e_email']);
	}
	?>
	Password: <br /> <input type="password" name="password" /><br />
	<?php
	if(isset($_SESSION['e_pass']))
	{
		echo '<div class="error">'.$_SESSION['e_pass'].'</div>';
		unset($_SESSION['e_pass']);
	}
	?>
	Confirm password: <br /> <input type="password" name="password2" /><br />
	<?php
	if(isset($_SESSION['e_pass2']))
	{
		echo '<div class="error">'.$_SESSION['e_pass2'].'</div>';
		unset($_SESSION['e_pass2']);
	}
	?>
	<label>
	<input type="checkbox" name="terms"/> I accept the rules
	</label>
	<?php
	if(isset($_SESSION['e_terms']))
	{
		echo '<div class="error">'.$_SESSION['e_terms'].'</div>';
		unset($_SESSION['e_terms']);
	}
	?>
	<div class="g-recaptcha" data-sitekey="6Leci4gUAAAAAHDae4ZFfbdEinI5NzXUCgMTxS-G"></div>
	<?php
	if(isset($_SESSION['e_bot']))
	{
		echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
		unset($_SESSION['e_bot']);
	}
	?>
	</br>
	<input type="submit" value="Sign Up!" />
	</form>


</body>
</html>
