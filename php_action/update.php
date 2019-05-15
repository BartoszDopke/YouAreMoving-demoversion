<?php 
 
require_once 'db_connect.php';
 
if($_POST) {
    $article = $_POST['article'];
    $author = $_POST['author'];
    $category = $_POST['category'];
   
    $id = $_POST['id'];
 
    $sql = "UPDATE articles SET article = '$article', author = '$author', category = '$category' WHERE id = {$id}";
    if($connect->query($sql) === TRUE) {
        echo "<p>Succcessfully Updated</p>";
        echo "<a href='../edit.php?id=".$id."'><button type='button'>Back</button></a>";
        echo "<a href='../yam-zalogowanyadmin.php'><button type='button'>Home</button></a>";
    } else {
        echo "Erorr while updating record : ". $connect->error;
    }
 
    $connect->close();
 
}
 
?>