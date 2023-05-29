<?php
    // Connect to the database
    include 'connection.php';
    if(isset($_POST['id']))
    {
        $id = $_POST['id'];
        
        $sql = "DELETE FROM request WHERE ID = $id";
        $result = mysqli_query($conn, $sql);
        header("Location: request.php");
    }
?>