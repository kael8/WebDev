<?php
    // Connect to the database
    include 'connection.php';
    if(isset($_POST['sid']) && isset($_POST['contactNo'])) {
        $sid = $_POST['sid'];
        $contactNo = $_POST['contactNo'];
        $sql = "UPDATE store SET ContactNo = '$contactNo' WHERE ID = '$sid'";
        $result = mysqli_query($conn, $sql);
        
    // Execute the SQL query and handle errors
    }
    else
    {
            echo "Error";
    }
?>