<?php
require('../php-includes/connect.php');

include('php-includes/check-login.php');



//$remark_text = $_POST['rmk'] ;
//echo 'data received'.$remark_text;


 if(isset($_POST["rmk"])){
   $id = mysqli_real_escape_string($con, $_POST['ID']);

   $query = mysqli_query($con, "SELECT * FROM epin_request where id = '$id' limit 1");
   $result = mysqli_fetch_assoc($query);

  $userid =  $result['userid'];
  
  $no_of_epin = $result['no_of_epin'];
   $rmk = $_POST["rmk"];
  

   
   for($i=0; $i<$no_of_epin; $i++){
      $epin = create_epin();
     $sql = "INSERT INTO epin_list (userid, epin)
     	VALUES ('$userid', '$epin')";
   if(mysqli_query($con, $sql)){
      //echo "Registration Successful.";
  } else{echo "ERROR: Could not be able to execute".mysqli_error($con);}

  }

  $query_update = mysqli_query ($con, "UPDATE epin_request set status= 'Closed', remark = '$rmk' where id = '$id' limit 1");

echo 1;

}else{
   echo "not posted";
}

//Epin generator function
function create_epin(){

   $random_number = sha1(rand(1000000,2000000));
   
   return $random_number;

}


?>


