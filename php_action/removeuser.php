<?php 
 
require_once 'db_connect.php';
 
if($_POST) {
    $id = $_POST['id'];
    $sql = "DELETE FROM users WHERE id = {$id} LIMIT 1";
    if($connect->query($sql) === TRUE) {
        echo "<p>Successfully removed!!</p>";
        echo "<a href='../yam-zalogowanyadmin.php'><button type='button'>Back</button></a>";
    } else {
        echo "Error updating record : " . $connect->error;
    }
 
    $connect->close();
}
 
?>

<!DOCTYPE html>
<html>
<head>
    <title>User has been removed</title>
	<style>
	body{
		background-color: #f9f9d6;
		}
	</style>
</head>
<body>
</body>
</html>