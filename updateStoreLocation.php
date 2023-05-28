<?php
    // Connect to the database
    include 'connection.php';
  $sid = $_POST['sid'];
  $address = $_POST['displayName'];
  $lat = $_POST['lat'];
  $lng = $_POST['lng'];
  $sql = "UPDATE store SET StoreLocation = '$address', Latitude = '$lat', Longitude = '$lng' WHERE ID = '$sid'";
  $result = mysqli_query($conn, $sql);
  // Execute the SQL query and handle errors
  echo "1";
?>