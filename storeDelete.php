<?php
    // Connect to the database
    include 'connection.php';
    if(isset($_POST['id']))
    {
        $id = $_POST['id'];
        
        $sql = "DELETE FROM product WHERE storeID = $id";
        $result = mysqli_query($conn, $sql);

        $sql = "DELETE FROM store WHERE ID = $id";
        $result = mysqli_query($conn, $sql);
        header("Location: manageStores.php");
    }
?>