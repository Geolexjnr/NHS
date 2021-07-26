<?php

require('../php-includes/connect.php');

include('php-includes/check-login.php');


if(isset($_POST["cancel"])){
    $id = mysqli_real_escape_string($con, $_POST['ID']);

    $query = mysqli_query($con, "SELECT * FROM epin_request where id = '$id' limit 1");
    $result = mysqli_fetch_assoc($query);
 
   $userid =  $result['userid'];
   
   $no_of_epin = $result['no_of_epin'];
   

    $cancel = $_POST["cancel"];
    $id = $_POST['ID'];

    $query_update = mysqli_query ($con, "UPDATE epin_request set status= 'Cancelled', remark = '$cancel' where id = '$id' limit 1");

    echo 1;
}

?>