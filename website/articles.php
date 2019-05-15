<?php
	require_once 'php_action/db_connect.php';
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
	<title>YouAreMoving - Articles</title>
		<meta charset="UTF-8">
		<meta name="Description" content="This site is made for you to help create the best version of you!"/>
		<meta name="Keywords" content="you,are,moving,training,nutrition,exercises,calisthenics,weightlifting,bodybuilding"/>
		<link rel="stylesheet" href="yam-articles.css">	
	</head>
	<body>
	<h1>Articles</h1>
	
	<p>This is our library of articles. If you want to<span id="dots">...</span>
	<span id="more">
	 see more, scroll down for more. Enjoy reading!
	</span></p><button onclick="myFunction()" id="btn-up" class="button">Read more</button>
	<br /><br /><br />
	<div class="manageMember">   
    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>Article</th>
                <th>Author</th>
                <th>Category</th>               
            </tr>
        </thead>
        <tbody>
		<script>
		function getPage(id) {
		$('#output').html('<img src="loading_icon.gif" />');
		jQuery.ajax({
		url: "get_article.php",
		data:'id='+id,
		type: "POST",
		success:function(data){$('#output').html(data);}
		});
}          
	</script>
	 <?php
            $sql = "SELECT * FROM articles WHERE active = 1";
            $result = $connect->query($sql);
 
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>".$row['article']." </td>
                        <td>".$row['author']."</td>
                        <td>".$row['category']."</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<?php
/*
echo "Article: ".$_SESSION['article'];
*/
?>

<script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("btn-up");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
	} else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
  
}
</script>
	</body>	
	</html>