<?php
    // Connect to the database
    include 'connection.php';
    if(isset($_POST['query']))
    {
        $search = $_POST['query'];
        
                $cat = $_POST['cat'];
                $sql = "SELECT Item, ImageLocation, Price, ID 
                    FROM product
                    WHERE Category = '$cat' AND (Item LIKE '%$search%')";
            
            
        
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
            echo '<img src="' . $imgSrc . '" alt="' . $item . '" style="width: 100%; height: 200px; object-fit: cover;">';
            echo '<p>' . $item . '<br><font>₱' . $price . '</font></p>';

            echo '</a>';
            echo '</center>';
            echo '</div>';
            echo '</div>';
          }
          


        
                             
  
}
?>