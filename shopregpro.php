<?php
session_start();
include 'connection.php';

if(isset($_POST['storeName']) && isset($_POST['fpage']) && isset($_POST['contact']) && isset($_POST['lat']) && isset($_POST['lng'])){
    $storeName = $_POST['storeName'];
    $page = $_POST['fpage'];
    $contact = $_POST['contact'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $ownerid = $_SESSION['account'];
    $storeLocation = $_POST['displayName'];

    // Sanitize input data
    $storeName = mysqli_real_escape_string($conn, $storeName);
    $page = mysqli_real_escape_string($conn, $page);
    $contact = mysqli_real_escape_string($conn, $contact);
    $lat = mysqli_real_escape_string($conn, $lat);
    $lng = mysqli_real_escape_string($conn, $lng);
    $ownerid = mysqli_real_escape_string($conn, $ownerid);
    $storeLocation = mysqli_real_escape_string($conn, $storeLocation);


    $image = $_FILES['image'];
    $image_name = $image['name'];
    $image_tmp_name = $image['tmp_name'];
    $image_error = $image['error'];

    if ($image_error === UPLOAD_ERR_OK) {
        // Specify the directory where you want to move the uploaded file
        $target_directory = "uploads/store/";
        $file_extension = pathinfo($image_name, PATHINFO_EXTENSION); // Get the file extension
        $target_file = $target_directory . uniqid() . '.' . $file_extension; // Append unique ID and file extension to the target file
        move_uploaded_file($image_tmp_name, $target_file);
        // Now you can use $target_file as the file path to store in your database or perform other operations
    }
    $target_file = mysqli_real_escape_string($conn, $target_file);
    $sql = "INSERT INTO `request` (`OwnerID`, `StoreName`, `ContactNo`, `Facebook`, `Latitude`, `Longitude`, `Location`, `StoreLocation`, `Type`) VALUES ('$ownerid', '$storeName', '$contact', '$page', '$lat', '$lng', '$target_file', '$storeLocation', 'Shop Registration')";
    $result = mysqli_query($conn, $sql);
if ($result) {
    echo "1";
} else {
    echo "2";
    echo "Error: " . mysqli_error($conn);
}

}
else{
    echo $_POST['storeName'] . $_POST['page'] . $_POST['no.'] . $_POST['lat'] . $_POST['lng'];
}
?>
