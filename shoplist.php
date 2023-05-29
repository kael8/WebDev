<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome!</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>
    <style>

    
  .td:hover {
    transform: scale(1.05);
    transition-duration: 0.3s;
   
  }
  .td {
  transition: transform 0.3s;
}

font{
    color: #9bc1fa;
    font-size: 20px;
    font-weight: bold;
}
  </style>
    <body style="background: #eeecee;">
        <?php include 'header.php'; ?>

        
        <div class="container">
            <div class = "row p-3">
              <div class="container-fluid p-3" style="display: flex; justify-content: center; align-items: center; width: 100%;">
                    <div class="o-hidden border-0 shadow-lg col-lg-12 text-light p-3" style="color: white;border-radius: 20px;">
                        <div class="row">
                            <div class="col">
                            <div class="container">
                              <div class="row">
  <?php
 


  $sql = "SELECT store.ID as sid, concat(FirstName, ' ', LastName) as Owner, StoreName, Latitude, Longitude, Facebook, ContactNo, Location, StoreLocation 
  from store 
  INNER JOIN accounts 
  ON store.OwnerID = accounts.ID;";

  $results = mysqli_query($conn, $sql);
  

  foreach($results as $rows) {
     
    echo '<div class="col-md-3 col-sm-6 td">
    <div class="thumbnail">
    <center>';

          $storeName = $rows['StoreName'];
          $location = $rows['Latitude'] . ', ' . $rows['Longitude'];
          $imgSrc = $rows['Location']; 
          $storeLocation = $rows['StoreLocation'];
          $id = $rows['sid'];
          echo '<a href="shopfeed.php?id=' . $id . '" style="text-decoration:none; color: black;">';
          echo '<img src="' . $imgSrc . '" alt="' . $storeName . '" style="width: 100%; height: 200px; object-fit: cover;">';
          echo '<p>' . $storeName . '</p>';
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