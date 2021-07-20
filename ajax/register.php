<?php
    session_start();
    $referral_username = $_SESSION['referral_username'];
    require('../php-includes/connect.php');

 if(isset($_POST['username'])){
    $name=mysqli_real_escape_string($con,$_POST['name']);
     $username=mysqli_real_escape_string($con,$_POST['username']);
     $email=mysqli_real_escape_string($con,$_POST['email']);
     $referral_username=mysqli_real_escape_string($con,$_POST['referral_username']);
     $mobile=mysqli_real_escape_string($con,$_POST['mobile']);
     $address=mysqli_real_escape_string($con,$_POST['address']);
     $password=mysqli_real_escape_string($con,$_POST['password']);
     $password_confirm=mysqli_real_escape_string($con,$_POST['password_confirm']);
    
     $referral_user = 1;
     //fetch and compare the id against the username from the form
     $query_check = mysqli_query($con, "SELECT `id` from user where username='$referral_username' and status ='Activated' limit 1");
    
     $fetched_id = mysqli_fetch_assoc($query_check);

     $converted = $fetched_id['id'];

     $reg_date = date("Y-m-d h:i:s");

     $flag_check = false;


     $query_check_info = mysqli_query($con, "SELECT `id` from user where username='$username' 
     or email = '$email' or mobile = '$mobile' limit 1" );


    //insert into the user table
     $sql = "INSERT INTO user (`username`, `name`, `email`, `mobile`, `address`, `referral_user`, `join_date`)
     	VALUES ('$username', '$name', '$email',  '$mobile', '$address', $converted, '$reg_date')";

if($password != $password_confirm){
    echo "passwords should be the same";
}else if(mysqli_num_rows($query_check_info)==0){

    $flag_check = true;
    if(mysqli_query($con, $sql)){
        echo "Registration Successful.";
    } else{echo "ERROR: Could not be able to execute".mysqli_error($con);}
}else{
    echo "invalid username, email or mobile number";
}

 }

?>
 
