<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "slopez", "Password123!", "slopez");
$user = $_POST['user'];

/* check connection */
if ($mysqli->connect_errno) {
     echo"$mysqli->connect_error)";
    exit();
}


$query = "SELECT user_id FROM Users LIMIT 0,30";
$userExists = false;
if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) 
    {
	
		if($row["user_id"] == $user)
		{
		  $userExists = true;
		}		

    }
			
    /* free result set */
    $result->free();
}

$query = "INSERT INTO Users (user_id) VALUES ('$user')";
if($userExists)
{
	echo"User already created, cannot create duplicate.";
}
else if ($result = $mysqli->query($query))
 {
 	echo"User: $user created successfully!";
 $result->free();
}



/* close connection */
$mysqli->close();
?>
