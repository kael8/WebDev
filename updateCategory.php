<?php
    // Connect to the database
    include 'connection.php';
    if(isset($_POST['sid']) && isset($_POST['categoryName'])) {
        $sid = $_POST['sid'];
        $category = $_POST['categoryName'];
        $sql = "UPDATE product SET Category = '$category' WHERE ID = '$sid'";
        $result = mysqli_query($conn, $sql);
        
    // Execute the SQL query and handle errors
    }
    else
    {
            echo "Error";
    }
?>