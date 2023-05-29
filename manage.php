<?php
session_start();
include 'connection.php';
$adminLogin = (isset($_SESSION['admin'])?$_SESSION['admin']:0);

    if (empty($adminLogin)){
      
        header("Location: login.php");
    
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome!</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
    

    <body style="background: #eeecee;">
        <?php include 'header.php'; ?>
       
        
        <div class="container p-4" >
            <div class = "row p-4  o-hidden p-3 shadow-lg" style="border-radius: 20px;">
                <div class="col-lg-12 text-dark">
                    <div class="row ">
                        <h1>Manage</h1>
                        
                    </div>
                    <hr>
                    <div class="row" >
                        <div class="col-lg-6 p-3 ">
                            <div class="p-3 o-hidden p-3 shadow-lg" style="border-radius: 20px;">
                                <h3>Manage Account</h3>
                                <p>Manage accounts</p>
                                <a href="manageAccounts.php" class="btn btn-primary">Manage Users</a>
                            </div>
                            
                        </div>
                        <div class="col-lg-6 p-3 " style="border-radius: 20px;">
                            <div class="p-3 o-hidden p-3 shadow-lg" style="border-radius: 20px;">
                                <h3>Manage Products</h3>
                                <p>Manage products</p>
                                <a href="manageProducts.php" class="btn btn-primary">Manage Products</a>
                            </div>
                            
                        </div>
                        <div class="col-lg-6 p-3 " style="border-radius: 20px;">
                            <div class="p-3 o-hidden p-3 shadow-lg" style="border-radius: 20px;">
                                <h3>Manage Stores</h3>
                                <p>Manage stores</p>
                                <a href="manageStores.php" class="btn btn-primary">Manage Stores</a>
                            </div>
                            
                        </div>
                        <div class="col-lg-6 p-3 " style="border-radius: 20px;">
                            <div class="p-3 o-hidden p-3 shadow-lg" style="border-radius: 20px;">
                                <h3>Manage Requests</h3>
                                <p>Manage request</p>
                                <a href="request.php" class="btn btn-primary">Manage Requests</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
       
          
    </body>
    
</html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="assets/js/jquery-1.10.2.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://kit.fontawesome.com/4f2d05d9c9.js" crossorigin="anonymous"></script>

