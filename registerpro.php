<?php
session_start();
include 'connection.php';

if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['pass']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    
    $sql = "SELECT * FROM accounts WHERE Email = '$email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0)
    {
        echo "4";
    }
    else
    {
        $sql = "INSERT INTO accounts (FirstName, LastName, Email, Password) VALUES ('$fname', '$lname', '$email', '$pass')";
        $conn->query($sql);
        echo "1";
    }
}
?>