<?php
session_start();
include 'connection.php';
$hasLogin = (isset($_SESSION['account'])?$_SESSION['account']:0);

    if($hasLogin)
    {
      
      $_SESSION['id'] = $_SESSION['account'];
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome!</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <style>

    
  .td:hover {
    transform: scale(1.1);
    transition-duration: 0.3s;

  }
  .td {
  transition: transform 0.3s;
}

font{
    color: green;
    
    font-weight: bold;
}
  </style>
    <body style="background: #eeecee;">
        <?php include 'header.php'; ?>

        
            <div class="container">
            <div class = "row p-4">
              <div class="container-fluid" style="display: flex; justify-content: center; align-items: center; width: 100%;">
                
                    <div class="o-hidden border-0 shadow-lg col-lg-12 text-light p-3" style="color: white;border-radius: 20px;">
                        <div class="row">
                            <div class="col">
                            <div class="container">
                <div class="row">
                    
                                <?php
  // Assuming $results is an array of data to be displayed in the table

  // Fetch data from the database
  $sql = "SELECT Item, ImageLocation, Price, ID 
  FROM product
  ORDER BY ID DESC;";

  $results = mysqli_query($conn, $sql);
  
 
    // Loop through the rows
    foreach($results as $rows) {
     
          echo '<div class="col-md-3 col-sm-6 td p-0" style = "background-color: white; border: 5px solid #eeecee;">
          <div class="thumbnail">
          <center>';
        
          // Check if there is a result for the current column
          $itemName = $rows['Item']; // Assuming the name is stored in 'Name' column
          $imgSrc = $rows['ImageLocation']; // Assuming the image source is stored in 'Latitude' column
          $price = $rows['Price']; // Assuming the image source is stored in 'Latitude' column
          $id = $rows['ID'];
          echo '<a href="productview.php?id=' . $id . '" style="text-decoration:none; color: black;">';
          echo '<img src="' . $imgSrc . '" alt="' . $itemName . '" style="width: 100%; height: 200px; object-fit: cover;">';
          echo '<p>' . $itemName . '<br><font>₱' . $price . '</font></p>';
          echo '</a>';

          echo '</center>';
          echo '</div>';
          echo '</div>';
        }
        
    
      
    

  
  ?>   
                                    
                                    </div>
                        </div>           
                                    
                             
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Modal Title</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <p>Modal content goes here...</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
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
<script src="assets/js/custom.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://kit.fontawesome.com/4f2d05d9c9.js" crossorigin="anonymous"></script>