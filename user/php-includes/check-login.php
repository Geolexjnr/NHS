<?php 

session_start();

if(isset($_SESSION['id']) && $_SESSION['login_type']=='user'){

}else{
    echo '<script>alert("Access Denied");window.location.assign("../login.php");</script>';
}
?>