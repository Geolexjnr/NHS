<?php
require('../php-includes/connect.php');

include('php-includes/check-login.php');

//$remark_text = $_POST['rmk'] ;
//echo 'data received'.$remark_text;


 if(isset($_POST["rmk"])){
   $id = mysqli_real_escape_string($con, $_POST['userID']);

   $query = mysqli_query($con, "SELECT * FROM epin_request where id = '$id' limit 1");
   $result = mysqli_fetch_assoc($query);

  $userid =  $result['userid'];
  
  $no_of_epin = $result['no_of_epin'];
   $rmk = $_POST["rmk"];
  

   
   for($i=0; $i<$no_of_epin; $i++){
      $epin = rand(1000000,2000000);
     $sql = "INSERT INTO epin_list (userid, epin, remark)
     	VALUES ('$userid', '$epin', '$rmk')";
   if(mysqli_query($con, $sql)){
      echo "Registration Successful.";
  } else{echo "ERROR: Could not be able to execute".mysqli_error($con);}

  }
}else{
   echo "not posted";
}

 

?>