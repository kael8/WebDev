<?php
    // Connect to the database
    include 'connection.php';
    if(isset($_POST['sid']) && isset($_POST['price'])) {
        $sid = $_POST['sid'];
        $price = $_POST['price'];
        $sql = "UPDATE product SET Price = '$price' WHERE ID = '$sid'";
        $result = mysqli_query($conn, $sql);
        
    // Execute the SQL query and handle errors
    }
    else
    {
            echo "Error";
    }
?>