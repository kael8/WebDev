<?php
session_start();
include 'connection.php';

if(isset($_POST['itemName'])){
    $itemName = $_POST['itemName'];
    $itemPrice = $_POST['price'];
    $itemQuantity = $_POST['quantity'];
    $itemCategory = $_POST['category'];
    $itemDescription = $_POST['description'];
    $sql = "SELECT ID FROM store WHERE OwnerID = '".$_SESSION['id']."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $storeID = $row['ID'];

    $image = $_FILES['image'];
    $image_name = $image['name'];
    $image_tmp_name = $image['tmp_name'];
    $image_error = $image['error'];

if ($image_error === UPLOAD_ERR_OK) {
    // Specify the directory where you want to move the uploaded file
    $target_directory = "uploads/item/";
    $file_extension = pathinfo($image_name, PATHINFO_EXTENSION); // Get the file extension
    $target_file = $target_directory . uniqid() . '.' . $file_extension; // Append unique ID and file extension to the target file
    move_uploaded_file($image_tmp_name, $target_file);
    // Now you can use $target_file as the file path to store in your database or perform other operations
}
    $sql = "INSERT INTO product (Item, Price, Quantity, Category, Description, ImageLocation, storeID) VALUES ('$itemName', '$itemPrice', '$itemQuantity', '$itemCategory', '$itemDescription', '$target_file', '$storeID')";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        $sql = "SELECT * FROM category WHERE CategoryName = '$itemCategory'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 0){
            $sql = "INSERT INTO category (CategoryName) VALUES ('$itemCategory')";
            $result = mysqli_query($conn, $sql);
        }
            echo "1";   
    }
    
}
else{
    echo "Error";
}
?>