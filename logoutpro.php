<?php
session_start();
$_SESSION['id'] = null;
$_SESSION['account'] = null;
$_SESSION['admin'] = null;
header("location: login.php");
?>
