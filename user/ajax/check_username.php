<?php 
include ('../../php-includes/connect.php');
include ('../php-includes/check-login.php');

if(isset($_GET['username'])){

     $username = mysqli_real_escape_string($con, $_GET['username']);

     $query = mysqli_query($con, "SELECT status, name from user where username ='$username' limit 1");

     if(mysqli_num_rows($query)==1){
         $fetched_array =  mysqli_fetch_array($query);
         
         $status =$fetched_array['status'];

         if($status=='Pending'){

             echo $fetched_array['name'];

         }else{
             echo 'User is already activated';
         }
     }else{
         echo 'Invalid Username';
     }
}
?>