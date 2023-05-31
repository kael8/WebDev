<?php
    // Connect to the database
    include 'connection.php';
    if(isset($_POST['query']))
    {
        $search = $_POST['query'];
        

        ?>
        <?php
  // Assuming $results is an array of data to be displayed in the table

  // Fetch data from the database
  $sql = "SELECT Item, ImageLocation, Price, ID 
  FROM product
  WHERE Item LIKE '%$search%'
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
        
    
      
    

  
    }   
