<?php
    // Connect to the database
    include 'connection.php';
  $sid = $_POST['sid'];
  $facebook = $_POST['facebook'];
  $sql = "UPDATE store SET Facebook = '$facebook' WHERE ID = '$sid'";
  $result = mysqli_query($conn, $sql);
  // Execute the SQL query and handle errors
?>