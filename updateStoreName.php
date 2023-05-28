<?php
  // Connect to the database
  include 'connection.php';
  $sid = $_POST['sid'];
  $storeName = $_POST['storeName'];
  $sql = "UPDATE store SET StoreName = '$storeName' WHERE ID = '$sid'";
  $result = mysqli_query($conn, $sql);
  // Execute the SQL query and handle errors
?>