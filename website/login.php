<?php

	session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['password'])))
	{
		header('Location: index.php');
		exit();
	}

	require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['password'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		
	
		if ($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM users WHERE nickname='%s'",
		mysqli_real_escape_string($polaczenie,$login))))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$wiersz = $rezultat->fetch_assoc();
				
				if(password_verify($haslo,$wiersz['password']))
				{					
				
					$_SESSION['zalogowany'] = true;
					
					
					$_SESSION['id'] = $wiersz['id'];
					$_SESSION['nickname'] = $wiersz['nickname'];					
					unset($_SESSION['blad']);
					$rezultat->free_result();
					
					//dzieki temu dziala przechodzenie ze stron usera i admina
					
					if($_SESSION['nickname']=='admin')
					{
					header('Location: yam-zalogowanyadmin.php');
					}
					else{
						header('Location: yam-zalogowany.php');
					}
				}
				else
				{
				
					$_SESSION['blad'] = '<span style="color:red">Wrong nickname or password!</span>';
					header('Location: index.php');
				
				}
				
				
			} else {
				
				$_SESSION['blad'] = '<span style="color:red">Wrong nickname or password!</span>';
				header('Location: index.php');
				
			}
			
		}
		
		$polaczenie->close();
	}
	
?>