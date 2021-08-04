
<?php 
     
     include "config.php";

     require 'db-read.php';
     $successMessage = $errMessage = "";
     $username = empty($_GET['username']) ? "" : $_GET['username'];
     if(empty($_GET['search']) or empty($username))
     {
     	$userlist = getallusers($username);
     }
     else
     {
     	$userlist = getuser($username);
     }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Users List</title>
</head>
<body>
	<h1><?php include 'header.php'; ?></h1>
<h1> Users List</h1>
<br>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" METHOD="GET">
	<input type="text" name="username" value="<?php $username; ?>">
	<input type="submit" name="search" value="Search">
	</form>
	<br>
<?php

 if(count($userlist) > 0)
 {
	echo"<table>";
	echo "<tr>";
	echo "<th>ID</th>";
	echo "<th>Username</th>";
	echo "<th>Action</th>";
	echo "</tr>";
	    for($i = 0; $i < count($userlist); $i++)
	    {
	    	echo "<tr>";
	        echo "<td>". $userlist[$i]["id"]."</td>";
	        echo "<td>". $userlist[$i]["username"]."</td>";
            echo "<td>". "<a>Delete</a>"."</td>";
	        echo "</tr>";

	    }
	    echo "</table>";
	}

	else 
	{
		echo "<h3> No records found! </h3>";

	}

	?>


<p>Go to <a href="welcomepage.php">HOME</p>

  <?php include 'footer.php'; ?>

</body>	
</html>