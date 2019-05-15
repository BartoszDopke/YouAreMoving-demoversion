<?php 
 
require_once 'db_connect.php';
 
if($_POST) {
    $user = $_POST['nickname'];
    $mail = $_POST['mail'];
   
    $id = $_POST['id'];
 
    $sql = "UPDATE users SET nickname = '$user', mail = '$mail' WHERE id = {$id}";
    if($connect->query($sql) === TRUE) {
        echo "<p>Succcessfully Updated</p>";
        echo "<a href='../edituser.php?id=".$id."'><button type='button'>Back</button></a>";
        echo "<a href='../yam-zalogowanyadmin.php'><button type='button'>Home</button></a>";
    } else {
        echo "Erorr while updating record : ". $connect->error;
    }
 
    $connect->close();
 
}
 
?>