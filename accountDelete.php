<?php
    // Connect to the database
    include 'connection.php';
    if(isset($_POST['id']) && isset($_POST['storeid']))
    {
        $id = $_POST['id'];
        $sid = $_POST['storeid'];

        $sql = "DELETE FROM product WHERE storeID = $sid";
        $result = mysqli_query($conn, $sql);

        $sql = "DELETE FROM store WHERE OwnerID = $id";
        $result = mysqli_query($conn, $sql);

        $sql = "DELETE FROM accounts WHERE ID = $id";
        $result = mysqli_query($conn, $sql);
        header("Location: manageAccounts.php");
    }
?>