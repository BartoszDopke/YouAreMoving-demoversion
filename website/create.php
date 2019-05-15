<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Add Article</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="yam.css">
</head>
<body>
 
<fieldset>
    <legend>Add Article</legend>
 
    <form action="php_action/create.php" method="post">
        <table>
            <tr>
                <th>Article</th>
                <td><textarea input type="text" name="article" placeholder="Article" style="height:300px; width: 400px"> </textarea></td>
            </tr>     
            <tr>
                <th>Author</th>
                <td><input type="text" name="author" placeholder="Author" /></td>
            </tr>
            <tr>
                <th>Category</th>
                <td><input type="text" name="category" placeholder="Category" /></td>
            </tr>
            <tr>
                <td><button type="submit">Save Changes</button></td>
                <td><a href="yam-zalogowanyadmin.php"><button type="button">Back</button></a></td>
            </tr>
        </table>
    </form>
 
</fieldset>
 
</body>
</html>