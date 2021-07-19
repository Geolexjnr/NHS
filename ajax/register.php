<?php
    session_start();
    $referral_username = $_SESSION['referral_username'];
    require('../php-includes/connect.php');

 if(isset($_POST['username'])){
    $name=mysqli_real_escape_string($con,$_POST['name']);
     $username=mysqli_real_escape_string($con,$_POST['username']);
     $email=mysqli_real_escape_string($con,$_POST['username']);
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
    //insert into the user table
     $sql = "INSERT INTO user (username, name, email, mobile, address, referral_user, join_date)
     	VALUES ('$username', '$name', '$email',  '$mobile', '$address', $converted, '$reg_date')";

    if(mysqli_query($con, $sql)){
        echo "Registration Successful.";
    } else{echo "ERROR: Could not be able to execute".mysqli_error($con);}

 }

?>
 
