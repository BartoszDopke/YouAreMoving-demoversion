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
	<title>YouAreMoving - Admin Panel</title>
		<meta charset="utf-8">
		<meta name="Description" content="This site is made for you to help create the best version of you!"/>
		<meta name="Keywords" content="you,are,moving,training,nutrition,exercises,calisthenics,weightlifting,bodybuilding"/>
		<link rel="stylesheet" href="yam-articles.css">	
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"> </script>

 <script type="text/javascript">

 $(document).ready(function() {

    $("#display").click(function() {                

      $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "display.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#responsecontainer").html(response); 
            //alert(response);
        }

    });
});
});

</script>

	</head>
	<body>
	<h1>Admin Panel</h1>
	
	
	<div class="manageMember">   
    <table>
        <thead>
            <tr>
                <th>User</th>
                <th>E-Mail</th>              
            </tr>
        </thead>
        <tbody>
             <?php
            $sql = "SELECT * FROM users WHERE id > 1";
            $result = $connect->query($sql);
 
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>".$row['nickname']."</td>
                        <td>".$row['mail']."</td>
                        <td>
                            <a href='edituser.php?id=".$row['id']."'><button type='button'>Edit</button></a>
                            <a href='removeuser.php?id=".$row['id']."'><button type='button'>Remove</button></a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
            }
            ?>
        </tbody>
    </table>
	<br />
	<a href="yam-zalogowanyadmin.php">
	<button>Back To Home Page</button>
	</a>
</div>
<!---<h3 align="center">Manage Users</h3>
<table border="1" align="center">
   <tr>
       <td> <input type="button" id="display" value="Display All Data" /> </td>
   </tr>
</table>
<div id="responsecontainer" align="center">

</div>--->
	</body>	
	</html>