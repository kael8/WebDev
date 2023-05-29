<?php
session_start();
include 'connection.php';

if(isset($_POST['email']) && isset($_POST['pass']))
{
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    
    $sql = "SELECT * FROM accounts WHERE Email = '$email' AND Password = '$pass'";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        foreach($result as $row)
        {
            $id = $row['ID'];
            if(mysqli_num_rows($result) > 0)
            {
                $_SESSION['account'] = $id;
                echo "1";
                return false;
            }
            else
            {
                echo "2";
            }
        }
        $sql = "SELECT * FROM admin WHERE Email = '$email' AND Password = '$pass'";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['admin'] = $row['ID'];
            echo "1";
        }
    }
    
}
?>