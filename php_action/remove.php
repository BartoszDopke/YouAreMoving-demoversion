<?php 
 
require_once 'db_connect.php';
 
if($_POST) {
    $id = $_POST['id'];
 
    $sql = "UPDATE articles SET active = 2 WHERE id = {$id}";
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
<html lang="en-US">
<head>
    <title>Article Removed</title>
	<link rel="stylesheet" href="edit.css">
</head>
<body>
</body>
</html>