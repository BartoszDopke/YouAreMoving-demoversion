<?php 
 
require_once 'php_action/db_connect.php';
 
if($_GET['id']) {
    $id = $_GET['id'];
 
    $sql = "SELECT * FROM articles WHERE id = {$id}";
    $result = $connect->query($sql);
 
    $data = $result->fetch_assoc();
 
    $connect->close();
 
?>
 
<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Edit Member</title>
	<meta charset="UTF-8">
	<meta name="Description" content="This site is made for you to help create the best version of you!"/>
	<meta name="Keywords" content="you,are,moving,training,nutrition,exercises,calisthenics,weightlifting,bodybuilding"/>	
	<link rel="stylesheet" href="edit.css">
 
</head>
<body>
 
<fieldset>
    <legend>Edit Article</legend>
 
    <form action="php_action/update.php" method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <th>Article</th>
                <td><textarea input type="text" name="article" placeholder="First Name" style="height:200px width: 300px"> <?php echo $data['article'] ?> </textarea></td>
            </tr>
			<br />		
            <tr>
                <th>Author</th>
                <td><input type="text" name="author" placeholder="Last Name" value="<?php echo $data['author'] ?>" /></td>
            </tr>
            <tr>
                <th>Category</th>
                <td><input type="text" name="category" placeholder="Age" value="<?php echo $data['category'] ?>" /></td>
            </tr>
            <tr>
                <input type="hidden" name="id" value="<?php echo $data['id']?>" />
                <td><button type="submit">Save Changes</button></td>
                <td><a href="yam-zalogowanyadmin.php"><button type="button">Back</button></a></td>
            </tr>
        </table>
    </form>
 
</fieldset>
 
</body>
</html>
 
<?php
}
?>