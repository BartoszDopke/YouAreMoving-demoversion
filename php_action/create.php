<?php 
 
require_once 'db_connect.php';
 
if($_POST) {
    $article = $_POST['article'];
    $author = $_POST['author'];
    $category = $_POST['category'];
 
    $sql = "INSERT INTO articles (author,article,category, active) VALUES ('$author','".$_POST['$article']."', '$category',1)";
	//$query="INSERT INTO ARTICLES (TITLE, BY, IN, POST)           VALUES('$title', '$by', '$in', '". $_POST['post'] ."')";*/
    if($connect->query($sql) === TRUE) {
        echo "<p>New Record Successfully Created</p>";
        echo "<a href='../create.php'><button type='button'>Back</button></a>";
        echo "<a href='../yam-zalogowanyadmin.php'><button type='button'>Home</button></a>";
    } else {
        echo "Error " . $sql . ' ' . $connect->connect_error;
    }
 
    $connect->close();
}
 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Article Created</title>
	<meta charset="utf-8">
	<style>
	body{
		background-color: #f9f9d6;
		}
	</style>
</head>
<body>
</body>
</html>