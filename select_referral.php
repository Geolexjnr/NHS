<?php
session_start();

include"php-includes/connect.php";
    $referral_user_ID=0;
$sql="SELECT * FROM user WHERE referral_user=$referral_user_ID";
$result=mysqli_query($con,$sql);

	$row = mysqli_fetch_assoc($result); 

    $_SESSION['referral_username'] = $row['username'];




echo json_encode($row);
mysqli_close($con);
?>

