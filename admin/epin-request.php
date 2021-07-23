<?php

require('../php-includes/connect.php');

include('php-includes/check-login.php');

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Epin_Request</title>

       <?php 
       
       include('php-includes/header-content.php');
     
       ?>

    </head>
    <body class="sb-nav-fixed">

    <?php include('php-includes/header.php') ?>


        <div id="layoutSidenav">

        <?php include('php-includes/sidebar.php') ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Epin Request</h1>
                     <hr>

                     <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               EPin Requests
                            </div>
                            <div class="card-body">
                            
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>S/No.</th>
                                            <th>User's Name</th>
                                            <th>No. of Epin</th>
                                            <th>Receipt</th>
                                            <th>Date</th>
                                            <th>Remark</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>S/No.</th>
                                            <th>User's Name</th>
                                            <th>No. of Epin</th>
                                            <th>Receipt</th>
                                            <th>Date</th>
                                            <th>Remark</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                <?php

                                $query = "SELECT * FROM epin_request where status = 'Open'";
                                $sql = mysqli_query($con, $query);
                                
                                $i = 1;

                                while ($row = mysqli_fetch_array($sql)) {
                                    
                                    $userid = $row['userid'];
                                    $query_user = mysqli_query($con, "SELECT name from user where id = '$userid' limit 1");
                                    $result_user = mysqli_fetch_array($query_user);

                                    $id = $row['id'];
                                    $img_address = "../user/receipt/".$id."png";

                                ?>
                                
                                 <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $result_user['name']; ?></td>
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
                                            
                                            
                                            <form action="" method="post">
                                                <td>
                                                    <input type="text" class="form-control" placeholder="Remark" name="remark" required="">
                                                </td>

                                                <td>
                                                
                                                    <button type="submit" class="btn btn-success">Approve</button>
                                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                                   
                                                </td>
                                            </form>

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
                </main>
               <?php include('php-includes/footer.php') ?>
            </div>
        </div>
        <?php include('php-includes/main-script.php') ?>
    </body>
</html>
