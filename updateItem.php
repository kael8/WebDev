<?php
    // Connect to the database
    include 'connection.php';
    if(isset($_POST['sid']) && isset($_POST['item'])) {
        $sid = $_POST['sid'];
        $item = $_POST['item'];
        $sql = "UPDATE product SET Item = '$item' WHERE ID = '$sid'";
        $result = mysqli_query($conn, $sql);
        
    // Execute the SQL query and handle errors
    }
    else
    {
            echo "Error";
    }
?>