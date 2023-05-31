<?php
    // Connect to the database
    include 'connection.php';
    if(isset($_POST['query']))
    {
        $search = $_POST['query'];
        

        ?>
        <?php
 


 $sql = "SELECT store.ID as sid, concat(FirstName, ' ', LastName) as Owner, StoreName, Latitude, Longitude, Facebook, ContactNo, Location, StoreLocation 
 from store 
 INNER JOIN accounts 
 ON store.OwnerID = accounts.ID
 WHERE StoreName LIKE '%$search%';";

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
       

    }
 ?>