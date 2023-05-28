<?php
    // Connect to the database
    include 'connection.php';
    if(isset($_POST['sid']) && isset($_POST['quantity'])) {
        $sid = $_POST['sid'];
        $quantity = $_POST['quantity'];
        $sql = "UPDATE product SET Quantity = '$quantity' WHERE ID = '$sid'";
        $result = mysqli_query($conn, $sql);
        
    // Execute the SQL query and handle errors
    }
    else
    {
            echo "Error";
    }
?>