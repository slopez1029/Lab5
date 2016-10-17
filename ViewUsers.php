<?php
        $mysqli = new mysqli("mysql.eecs.ku.edu", "slopez", "Password123!", "slopez");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
        $query = "SELECT user_id FROM Users";
         if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
                                        
        echo 
            "<tr>
              <td>{$row['user_id']}</td>
             
            </tr>\n";                                        
                                        
    }

    /* free result set */
    $result->free();
}
        ?>
