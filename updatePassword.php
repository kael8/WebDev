<?php
include 'connection.php';
session_start();
if($_SESSION['admin'])
{
        $id = $_SESSION['admin'];
        $dpassword = $_POST['dpassword'];
        $sql = "UPDATE admin
        SET Password = '$dpassword'
        WHERE ID = '$id'";
        $result = mysqli_query($conn, $sql);
        echo "<script>window.location.href='adminSettings.php';</script>";
}
else if($_SESSION['account'])
{
        $id = $_SESSION['account'];
        $dpassword = $_POST['dpassword'];
        $sql = "UPDATE accounts
        SET Password = '$dpassword'
        WHERE ID = '$id'";
        $result = mysqli_query($conn, $sql);
        echo "<script>window.location.href='settings.php';</script>";
}

?>