<?php

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
        <title>NHS|Admin-Dashboard</title>

       <?php include('php-includes/header-content.php') ?>

    </head>
    <body class="sb-nav-fixed">

    <?php include('php-includes/header.php') ?>


        <div id="layoutSidenav">

        <?php include('php-includes/sidebar.php') ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">NHS | Admin-Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                     <hr>
                    </div>
                </main>
               <?php include('php-includes/footer.php') ?>
            </div>
        </div>
        <?php include('php-includes/main-script.php') ?>
    </body>
</html>
