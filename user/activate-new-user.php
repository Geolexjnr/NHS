<?php 
include ('../php-includes/connect.php');
include ('php-includes/check-login.php');

$page_title = "Activate New User";
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php include('php-includes/header-content.php')?>
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<?php include('php-includes/sidebar.php') ?>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
            <?php include('php-includes/header.php') ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?php echo $page_title;?></h1>

            <hr>
            <?php 
            
            $userid = $_SESSION['user_id'];
            
            $query_epin_check =  mysqli_query($con, "SELECT count(*) as total_epin from epin_list where userid = '$userid' and status = 'unused' ");
            
            $total_epin =  mysqli_fetch_array($query_epin_check)['total_epin'];

            if($total_epin > 0){
            ?>
           
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">New User Activation Form</h6>
                </div>
                <div class="card-body">
                <form id="form_activate_user">
                <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group"> 
                                <label>User to be activated</label>
                                <input type="text" id="name" class="form-control" value="" readonly="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"> 
                                <label>Available Epin(s)</label>
                                <input type="number" name="available_epins" class="form-control " 
                                value="<?php echo $total_epin ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-user-plus"></i>
                            </span>
                            <span class="text">Activate - <span id="submit_name">?</span></span>
                        </button>
                            
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <?php 
            }else{

            ?>
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">EPin Request Form</h6>
                </div>
                <div class="card-body">
                <p>You do not have any active Epin. Please generate a pin and come back here soon</p>
                </div>
            </div>
            <?php
            }
            ?>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <?php include('php-includes/footer-copyright.php') ?>
    <!-- End of Footer -->

</div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->
<?php include('php-includes/footer.php') ?>

<script type="text/javascript">
   
  $("#username").on('change', function(){

    var username = $(this).val();

    $.ajax({
        url:'ajax/check_username.php?username='+username,
        type: 'GET',
        //data:formData,
        success: function(data){
           
            $("#name").val(data);
            $("#submit_name").html(data);

        },
        cache: false,
        contentType: false,
        processData:false
    });

   
});


 
   
   
   var single_epin = 250;

    $("#no_of_epin").keyup(function(){
        var total_amount_to_pay = $(this).val() * single_epin;
        $("#amount_to_pay").val(total_amount_to_pay);
    });
        //send form data to server
        $("#form_activate_user").submit(function(){
            var formData = new FormData($(this)[0]);
           $.ajax({
               url:'ajax/activate_new_user.php',
               type: "POST",
               data: formData,
               success: function(data){
                   //code run successfully
                   if(data==1){
                       alert(data);
                     //  $("#form_epin_request").trigger("reset");
                     // alert(data);
                   }else{

                    alert(data);

                   }
               },
               cache: false,
               contentType: false,
               processData:false
           });
            return false;
        });

</script>

</body>

</html>