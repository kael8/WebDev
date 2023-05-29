<?php
include 'connection.php';
session_start();
$id = $_SESSION['id'];
$dpassword = $_POST['dpassword'];
$sql = "UPDATE accounts
        SET Password = '$dpassword'
        WHERE ID = '$id'";
$result = mysqli_query($conn, $sql);
echo "<script>window.location.href='settings.php';</script>"
?>