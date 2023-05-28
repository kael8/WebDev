<?php
session_start();
include 'connection.php';

if(isset($_POST['email']) && isset($_POST['pass']))
{
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    
    $sql = "SELECT * FROM accounts WHERE Email = '$email' AND Password = '$pass'";
    $result = mysqli_query($conn, $sql);
    foreach($result as $row)
    {
        $id = $row['ID'];
        if(mysqli_num_rows($result) > 0)
        {
            $_SESSION['account'] = $id;
            echo "1";
        }
        else
        {
            echo "2";
        }
    }
    
}
?>