<?php
        $mysqli = new mysqli("mysql.eecs.ku.edu", "slopez", "Password123!", "slopez");
        $author_id = $_POST['selectOption'];
        $noPosts = true;
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
        $query = "SELECT * FROM Posts";
         if ($result = $mysqli->query($query)) {
         
         echo "
         
         <table border='2' style= 'background-color: blue; color: white; margin: 0 auto;' >
      <thead>
        <tr>
          <th>Posts By: $author_id</th>          
        </tr>
      </thead>               
         ";

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        
        if($row['author_id'] == $author_id)
        {
        $noPosts = false;
        echo 
            "<tr>
              <td>{$row['content']}</td>
             
            </tr>\n";
        }
                                        
    }
        
    /* free result set */
    $result->free();
    echo "</table>";
    if($noPosts)
    {
        echo " $author_id hasn't posted anything yet!";
    }
}
        ?>
