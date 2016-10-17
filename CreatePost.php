<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "slopez", "Password123!", "slopez");
$user = $_POST['user'];
$post = $_POST['post'];

/* check connection */
if ($mysqli->connect_errno) {
     echo"$mysqli->connect_error)";
    exit();
}

$query = "SELECT user_id FROM Users";
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
$post = $mysqli->real_escape_string($post);
$post_id = $row["post_id"];		
$query = "INSERT INTO Posts (post_id,content,author_id) VALUES ('$post_id','$post','$user')";

if($userExists && $result = $mysqli->query($query) )
	{
        
	/* free result set */
	echo "$user created a post successfully!";
    $result->free();
	}
else{
	echo "$user doesn't exist, couldn't create the post.";
}
/* close connection */
$mysqli->close();
?>
