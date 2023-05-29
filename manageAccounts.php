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
                        <h1>Manage Accounts</h1>
                        
                    </div>
                    <hr>
                    <div class="row" >
                        <table class = "table table-striped  table-rounded text-center" style = "border-collapse: separate; border-spacing: 0 10px; border-radius: 10px;">
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name Name</th>
                                <th>Owned Store</th>
                                <th>Action</th>
                            </tr>
                            <?php
                               $sql = "SELECT a.ID, s.StoreName, a.FirstName, a.LastName, s.ID as StoreID
                               FROM store as s
                               INNER JOIN accounts as a
                               ON s.OwnerID = a.ID";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>".$row['ID']."</td>";
                                        echo "<td>".$row['FirstName']."</td>";
                                        echo "<td>".$row['LastName']."</td>";
                                        echo "<td><a href = 'shopfeed.php?id=".$row['StoreID']."'>".$row['StoreName']."</a></td>";
                                        echo "<td>
                                                <div class='row'>
                                                    <div class='col p-1'>
                                                        <form action = 'accountDelete.php' method = 'POST'> 
                                                            <button class = 'btn btn-danger'>Delete</button> 
                                                            <input type = 'hidden' name = 'id' value = '".$row['ID']."'>
                                                            <input type = 'hidden' name = 'storeid' value = '".$row['StoreID']."'>
                                                        </form>
                                                    </div>
                                                </div>
                                             </td>";
                                        echo "</tr>";
                                    }
                                } 
                            ?>
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

