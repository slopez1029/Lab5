<?php
    
    $mysqli = new mysqli("mysql.eecs.ku.edu", "slopez", "Password123!", "slopez");
    //$post_id = $_GET['checklist'];
    
    /* check connection */
    if ($mysqli->connect_errno) 
    {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    
    if(!empty($_POST['checklist'])) 
    {
        echo "Success! The following post ids were deleted: <br>";

        foreach ($_POST['checklist'] as $check)
        {
            echo $check."<br />";
            $query = "DELETE FROM Posts WHERE post_id= $check";

            if ($result == $mysqli->query($query)) 
            {                                                                
                /* free result set */          
                $result->free();
            }
            
        }
    }
    else
    {
        echo "Nothing happened since no post was selected for deletion!";
    }
            
?>
