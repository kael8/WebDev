<?php
$dbhost = "localhost";
$dbname = "autoparts";
$dbuser = "root";
$dbpass = "";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if(!$conn)
{
    echo "Error";
}
?>