<?php include 'connection.php'; 
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome!</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        
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
    color: green;
    
    font-weight: bold;
}
    </style>
    <body style="background: #eeecee;">
        <?php include 'header.php'; ?>
      
        
        <div class="container">
            <div class = "row p-4">
                    <div class="o-hidden border-0 shadow-lg col-lg-12 text-dark" style="border-radius: 20px;">
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="row border-bottom border-secondary-subtle border-1">
                                    <div style="width:100%;">
                                        <h6 class="p-3" style="width: 100%;">Categories</h6>                            
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="container-fluid" style="width:100%">
                                    <ul>
                                      <?php 
                                      $sql = "SELECT CategoryName FROM category";
                                      $result = mysqli_query($conn, $sql);
                                      foreach($result as $row)
                                      {
                                        echo "<li><a href='products.php?cat=".$row['CategoryName']."' style='text-decoration:none;'>".$row['CategoryName']."</a></li>";
                                      }
                                      ?>
                                    </ul>
                                                          
                                    </div>
                                </div>
                                                                    
                            </div>
                           <div class="col-md-9 col-sm-12 p-0  border-start border-secondary-subtle border-1" >
                                <h6 class = "p-3">Products</h6>
                                <div class="p-3  border-top border-secondary-subtle border-1">
                                    
                                <div class="container">
                                          <div class="row">                             
                                    <?php
                                      // Assuming $results is an array of data to be displayed in the table

                                    // Fetch data from the database
                                    if(isset($_GET['cat']) && !empty($_GET['cat'])) {
                                        $cat = $_GET['cat'];
                                        $sql = "SELECT Item, ImageLocation, Price, ID 
                                                FROM product
                                                WHERE Category = '$cat'";
                                      
                                        $results = mysqli_query($conn, $sql);
                                        
                                        // Check if query was successful
                                        foreach($results as $rows) {
     
                                          echo '
                                          <div class="col-md-3 col-sm-12 td">
                                          <div class="thumbnail">
                                          <center>';
                                                // Check if there is a result for the current column
                                                $item = $rows['Item'];
                                                $imgSrc = $rows['ImageLocation'];
                                                $price = $rows['Price'];
                                                $id = $rows['ID'];
                                                echo '<a href="productview.php?id=' . $id . '" style="text-decoration:none; color: black;">';
                                                echo '<img src="' . $imgSrc . '" alt="' . $item . '" style="width: 100%; height: 200px;">';
                                                echo '<p>' . $item . '<br><font>₱' . $price . '</font></p>';

                                                echo '</a>';
                                                echo '</center>';
                                                echo '</div>';
                                                echo '</div>';
                                              }
                                              
                                            }
                                            
                                                                 
                                      
                                      
                                ?>
                                    
                              
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


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://kit.fontawesome.com/4f2d05d9c9.js" crossorigin="anonymous"></script>