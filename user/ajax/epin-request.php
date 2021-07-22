<?php 

require('../../php-includes/connect.php');
include ('../php-includes/check-login.php');



   if(isset($_POST['no_of_epin'])){
       $no_of_epin = mysqli_real_escape_string($con, $_POST['no_of_epin']);
       $user_id = $_SESSION['user_id'];
       $query = mysqli_query($con, "INSERT INTO epin_request(`userid`, `no_of_epin`, `date`)
       VALUES('$user_id', '$no_of_epin', now())");

       if(!empty($_FILES['receipt_file']['tmp_name'])){

           $new_id = mysqli_insert_id($con);
            
           move_uploaded_file($_FILES['receipt_file']['tmp_name'], "../receipt/".$new_id."png");
        
           echo 1;
       }else{
           echo 'no file found';
       }
   }
 


?>