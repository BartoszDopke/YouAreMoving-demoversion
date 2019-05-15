<?php 
 
require_once 'php_action/db_connect.php';
 
if($_GET['id']) {
    $id = $_GET['id'];
 
    $sql = "SELECT * FROM users WHERE id = {$id}";
    $result = $connect->query($sql);
 
    $data = $result->fetch_assoc();
 
    $connect->close();
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Edit Member</title>
	<meta charset="UTF-8">
	<meta name="Description" content="This site is made for you to help create the best version of you!"/>
	<meta name="Keywords" content="you,are,moving,training,nutrition,exercises,calisthenics,weightlifting,bodybuilding"/>	
    <style>
	body{
		background-color: #f9f9d6;
		}
	</style>
 
</head>
<body>
 
<fieldset>
    <legend>Edit Article</legend>
 
    <form action="php_action/updateuser.php" method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <th>Nickname</th>
                <td><input type="text" name="nickname" placeholder="Nickname" value="<?php echo $data['nickname'] ?>" /></td>
            </tr>
			<br />		
            <tr>
                <th>E-Mail</th>
                <td><input type="text" name="mail" placeholder="E-mail" value="<?php echo $data['mail'] ?>" /></td>
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