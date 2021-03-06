<?php 
require('php-includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="name" class="form-control form-control-user"
                                            placeholder="Name" required="">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="username" id="username" class="form-control form-control-user" 
                                            placeholder="Username" required="">
                                            <div id="username_status"class="text-center"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="email"  name="email" class="form-control form-control-user" 
                                            placeholder="Email Address" required="">
                                    </div>

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="referral_username" class="form-control form-control-user"
                                        value="<?php echo $referral_username ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="mobile" class="form-control form-control-user"
                                            placeholder="Mobile" required="">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="address" class="form-control form-control-user" 
                                            placeholder="Address" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            name="password" placeholder="Password" required="">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="confirm_password" class="form-control form-control-user"
                                             placeholder="Repeat Password" required="">
                                    </div>
                                </div>
                                
                                <input class="btn btn-primary btn-user btn-block" type="submit" value="Register Account">
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script type="text/javascript">

        $("#username").change(function(){
            var username = $("#username").val();

            $.post("ajax/check-username-validity.php", {username:username}, function(data){
                if(data==1){
                    $("#username_status").html("Valid Username");
                }else{
                    $("#username_status").html("Invalid Username");
                }
            })
        })
    
    </script>

<script>
	function get_referral_by_ID(){
	$.ajax({ 
	type: "POST",
	url: "select_referral.php",
			 success: function(data){		  
			let opts = JSON.parse(data);
		  	var ref=opts.name;
			console.log(ref);
			
				$("#referral_username").val(ref);
              
			}  
        }); 
	}	
	get_referral_by_ID();
	</script>

</body>

</html>