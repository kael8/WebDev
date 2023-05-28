<?php
session_start();
$_SESSION['id'] = null;
$_SESSION['account'] = null;
header("location: login.php");
?>
