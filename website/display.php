<?php
require_once "connect.php";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else{

	$sql = "SELECT * FROM users WHERE id > 1";
            $result = $polaczenie->query($sql);
 
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {

echo "<table>
<tr>
<td align=center><b>Nickname</b></td>
<td align=center><b>E-Mail Address</b></td></td>";
 
    echo "<tr>
            <td>".$row['nickname']."</td>
            <td>".$row['mail']."</td>
			<td>
                            <a href='edituser.php?id=".$row['id']."'><button type='button'>Edit</button></a>
                            <a href='removeuser.php?id=".$row['id']."'><button type='button'>Remove</button></a>
                        </td>			
          </tr>";
}
echo "</table>";
	}
	}
?>
<!doctype html>
<html lang="en-US">
	<head>
	<title>YouAreMoving - Admin Panel</title>
		<meta charset="utf-8">
		<meta name="Description" content="This site is made for you to help create the best version of you!"/>
		<meta name="Keywords" content="you,are,moving,training,nutrition,exercises,calisthenics,weightlifting,bodybuilding"/>
		<link rel="stylesheet" href="yam-articles.css">	
		</head>
	<body>
	</body>
	</html>