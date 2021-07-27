<?php 

include ('../../php-includes/connect.php');
include ('../php-includes/check-login.php');

if(isset($_POST['username'])){

    $username = mysqli_real_escape_string($con, $_POST['username']);

    $flag_check = false;
    $message = "";


    //checking the username

    $query = mysqli_query($con, "SELECT id from user where username = '$username' and status = 'Pending' limit 1");

    if(mysqli_num_rows($query)==1){

        $userid = $_SESSION['user_id'];
        
        $query_epin_check =  mysqli_query($con, "SELECT count(*) as total_epin from epin_list where userid = '$userid' and status = 'unused' ");
        
        $total_epin =  mysqli_fetch_array($query_epin_check)['total_epin'];

       if($total_epin>0){
        $flag_check = true;
    
    }else{
        $message = "You do not have any Epin available to Activate a new user";
    }

}else{
    $message = "Invalid Username";
}

    if($flag_check){

       echo "You are now activating the user"; 

    }else{

        echo $message;

    }

  
}

?>