<?php
include 'connection.php';
session_start();
$id = $_SESSION['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$sql = "UPDATE accounts
        SET FirstName = '$fname', LastName = '$lname'
        WHERE ID = '$id'";
$result = mysqli_query($conn, $sql);
?>