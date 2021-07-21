<?php 

include ('php-includes/check-login.php');

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
            <h1 class="h3 mb-4 text-gray-800">E-Pin Requests</h1>

            <hr>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">EPin Request Form</h6>
                </div>
                <div class="card-body">
                <form action="">
                <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>How many Epin(s) are you requesting</label>
                                <input type="number" name="no_of_epin" id="no_of_epin" class="form-control" required="">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group"> 
                                <label>Amount to be paid</label>
                                <input type="number" id="amount_to_pay" class="form-control" value="0" readonly="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"> 
                                <label>Upload Payment Receipt</label>
                                <input type="file" name="receipt_file" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-file-invoice-dollar"></i>
                            </span>
                            <span class="text">Submit EPin Request</span>
                        </button>
                            
                        </div>
                    </div>
                    </form>
                </div>
            </div>

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
<?php echo include('php-includes/footer.php') ?>

<script type="text/javascript">
    var single_epin = 250;

    $("#no_of_epin").keyup(function(){
        var total_amount_to_pay = $(this).val() * single_epin;
        $("#amount_to_pay").val(total_amount_to_pay);
    })
</script>

</body>

</html>