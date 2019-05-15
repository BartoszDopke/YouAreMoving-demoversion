<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>

<!doctype html>
<html lang="en-US">
	<head>	
	<title>YouAreMoving</title>
		<meta charset="utf-8">
		<meta name="Description" content="This site is made for you to help create the best version of you!"/>
		<meta name="Keywords" content="you,are,moving,training,nutrition,exercises,calisthenics,weightlifting,bodybuilding"/>		
		<link rel="stylesheet" href="yam.css">
	</head>
	<body>
	<?php

	echo "<p>Welcome, ".$_SESSION['nickname'].'! [ <a href="logout.php">Log out!</a> ]</p>';
	?>
	<div id="strona">		
	<ul>
	<div class="btn-group">
		<li><a href="yam-exercises.html"><button>Exercises</button></a></li>
		<li><a href="yam-nutrition.html"><button>Nutrition</button></a></li>
		<li><a href="yam-articles.php"><button>Articles</button></a></li>
		<li><a href="adminpanel.php"><button>Admin Panel</button></a></li>
	</div>	
	</ul>
	<div id="logo">
	<img src="tlo.jpg" alt="tlo">
	</div>
	</div>
	<div style="clear:both"></div>
	<br />
	
	
	<section id="cytaty">
		<?php
		require_once "connect.php";

		$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
		if ($polaczenie->connect_errno!=0)
		{
			echo "Error: ".$polaczenie->connect_errno;
		}
		else
		{
			foreach($polaczenie->query('SELECT * FROM quotes WHERE ID=1') as $row)
			{
				
				echo ($row['quote'])."<br />";
				echo ($row['author']);
			} 
			
		
		}
		?>
	</section>
	<div style="clear:both">
	<section id="sylwetki">
	<h2>Sylwetki sportowców</h2>
	<h3>Ido Portal urodził się...</h3>
	<img src="https://www.livemint.com/rf/Image-621x414/LiveMint/Period2/2017/01/07/Photos/Processed/Coach-k5nG--621x414@LiveMint.jpg" alt="Tutaj bedzie zdjecie sportowca">		
	</section>
	</div>
	</body>
</html>