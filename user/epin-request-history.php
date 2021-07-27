<?php 

include ('php-includes/check-login.php');
include ('../php-includes/connect.php');

$page_title = "Epin Request History";
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
                    <h1 class="h3 mb-4 text-gray-800"><?php echo $page_title ?></h1>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            EPin Requests
                        </div>
                        <div class="card-body">
                        
                            <table class="table table-bordered dataTable" id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>S/No.</th>
                                        <th>No. of Epin</th>
                                        <th>Receipt</th>
                                        <th>Date</th>
                                        <th>Remark</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>S/No.</th>
                                        <th>No. of Epin</th>
                                        <th>Receipt</th>
                                        <th>Date</th>
                                        <th>Remark</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                            <?php

                            function get_color_class($status){
                                $result_color = "bg-primary";
                                if($status == 'Closed'){
                                    $result_color = "bg-success";
                                }elseif ($status == 'Cancelled') {
                                   $result_color = "bg-danger";
                                }
                                return $result_color;
                            }

                            $userid = $_SESSION['user_id'];
                            $query = "SELECT * FROM epin_request where userid = '$userid'";
                            $sql = mysqli_query($con, $query);
                            
                            $i = 1;

                            while ($row = mysqli_fetch_array($sql)) {
                                

                                $id = $row['id'];
                                $img_address = "receipt/".$id."png";

                            ?>
                            
                                <tr style="color:white" class="<?php echo get_color_class($row['status']); ?>">
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['no_of_epin']; ?></td>
                                        <td>
                                            <?php 
                                            
                                            if(file_exists($img_address)){
                                            ?>

                                                <a href="<?php echo $img_address ?>" target="_blank">
                                                <img src="<?php echo $img_address ?>" height="50" width="50" 
                                                alt="receipt">
                                                </a>

                                            <?php
                                            }else{
                                                
                                                echo "No receipt found";
                                            }
                                            
                                            ?>   
                                        
                                            
                                        </td>
                                        
                                        <td><?php echo $row['date']; ?></td>
                                        
                                        <td><?php echo $row['remark']; ?></td>
                                        
                                        <td><?php echo $row['status']; ?></td>
                                        
                                    </tr>
                                    
                            <?php
                            $i++;
                            }

                            ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

          

        </div>
        <!-- End of Content Wrapper -->
  <!-- Footer -->
            <?php include('php-includes/footer-copyright.php') ?>
            <!-- End of Footer -->
    </div>
    <!-- End of Page Wrapper -->
    <?php include('php-includes/footer.php') ?>
    
</body>

</html>