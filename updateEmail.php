<?php
include 'connection.php';
session_start();
    if($_SESSION['admin'])
    {
        $id = $_SESSION['admin'];
        $demail = $_POST['demail'];
        $sql = "UPDATE admin
        SET Email = '$demail'
        WHERE ID = '$id'";
        $result = mysqli_query($conn, $sql);
    }
    else if($_SESSION['account'])
    {
        $id = $_SESSION['id'];
        $demail = $_POST['demail'];
        $sql = "UPDATE accounts
        SET Email = '$demail'
        WHERE ID = '$id'";
        $result = mysqli_query($conn, $sql);
    }

?>