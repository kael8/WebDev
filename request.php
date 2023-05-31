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
<style>
    .table-container {

    overflow: auto;
}

</style>

    <body style="background: #eeecee;">
        <?php include 'header.php'; ?>
       
        
        <div class="container p-4" >
            <div class = "row p-4  o-hidden p-3 shadow-lg" style="border-radius: 20px;">
                <div class="col-lg-12 text-dark">
                    <div class="row ">
                        <div class="col">
                            <h1>Request</h1>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <div class="form-inline">
                                <div class="form-group">
                                    <input type="text" name="query" class="form-control mr-sm-2" id = "search" placeholder="Search..." />
                                </div>
                                    
                            </div>

                        </div>
                    </div>
                    <hr>
                    <div class="row table-container" id = "box">
                        <table class = "table  table-rounded" style = "border-collapse: separate; border-spacing: 0 10px; border-radius: 10px;">
                            <tr>
                                <th>Request ID</th>
                                <th>Store Name</th>
                                <th>Location</th>
                                <th>Request Type</th>
                                <th>Account Name</th>
                                <th>Action</th>
                            </tr>
                            <?php
                                $sql = "SELECT r.ID, concat(a.FirstName, ' ', a.LastName) as OwnerName, r.StoreName, r.Location, r.StoreLocation, r.Facebook, r.ContactNo, r.Type, r.Longitude, r.Latitude
                                FROM request as r
                                INNER JOIN accounts as a
                                ON r.OwnerID = a.ID";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result)){
                                    $request_id = $row['ID'];
                                    $store_name = $row['StoreName'];
                                    $location = $row['Location'];
                                    $owner = $row['OwnerName'];
                                    $longitude = $row['Longitude'];
                                    $latitude = $row['Latitude'];
                                    $facebook = $row['Facebook'];
                                    $contact = $row['ContactNo'];
                                    $type = $row['Type'];
                                    $store_location = $row['StoreLocation'];
                                    echo "<tr>";
                                    echo "<td>".$request_id."</td>";
                                    echo "<td>".$store_name."</td>";
                                    echo "<td>".$store_location."</td>";
                                    echo "<td>".$type."</td>";
                                    echo "<td>".$owner."</td>";
                                    echo "<td>
                                    <div class='row'>
                                        <div class='col p-1'>
                                            <form action = 'approve.php' method = 'POST'>
                                                <button class = 'btn btn-primary'>Approve</button>
                                                <input type = 'hidden' name = 'id' value = '".$request_id."'>
                                            </form>
                                        </div>
                                        <div class='col p-1'>
                                            <form action = 'reject.php' method = 'POST'> 
                                                <button class = 'btn btn-danger'>Reject</button> 
                                                <input type = 'hidden' name = 'id' value = '".$request_id."'>
                                            </form>
                                        </div>
                                    </div>
                                    
                                    
                                    </td>";
                                }
                                ?>
                        </table>
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

<script>
    $('#search').on("input", function(){
        var query = $(this).val();
        console.log(query);
        $.ajax({
            url: "searchRequest.php",
            method: "POST",
            data: {query:query},
            success:function(data){
                $('#box').html(data);
            }
        });
    });
</script>