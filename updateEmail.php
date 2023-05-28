<?php
include 'connection.php';
session_start();
$id = $_SESSION['id'];
$demail = $_POST['demail'];
$sql = "UPDATE accounts
        SET Email = '$demail'
        WHERE ID = '$id'";
$result = mysqli_query($conn, $sql);
?>