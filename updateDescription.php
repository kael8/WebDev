<?php
    // Connect to the database
    include 'connection.php';
    if(isset($_POST['sid']) && isset($_POST['description'])) {
        $sid = $_POST['sid'];
        $description = $_POST['description'];
        $sql = "UPDATE product SET Description = '$description' WHERE ID = '$sid'";
        $result = mysqli_query($conn, $sql);
        
    // Execute the SQL query and handle errors
    }
    else
    {
            echo "Error";
    }
?>