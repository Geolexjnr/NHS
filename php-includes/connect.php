<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name  = "NHS";

    $con = mysqli_connect($db_host,$db_user, $db_pass, $db_name);
      if(mysqli_connect_error()){
        echo "connection to the database failed";
      }
 ?>
