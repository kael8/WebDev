<?php
    // Connect to the database
    include 'connection.php';
    if(isset($_POST['id']))
    {
        $id = $_POST['id'];
        $sql = "SELECT r.ID, r.OwnerID, r.StoreName, r.Location, r.StoreLocation, r.Facebook, r.ContactNo, r.Type, r.Longitude, r.Latitude
        FROM request as r
        INNER JOIN accounts as a
        ON r.OwnerID = a.ID
        WHERE r.ID = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $request_id = $row['ID'];
                                    $store_name = $row['StoreName'];
                                    $location = $row['Location'];
                                    $owner = $row['OwnerID'];
                                    $longitude = $row['Longitude'];
                                    $latitude = $row['Latitude'];
                                    $facebook = $row['Facebook'];
                                    $contact = $row['ContactNo'];
                                
                                    $store_location = $row['StoreLocation'];

        $sql = "INSERT INTO store (OwnerID, StoreName, Location, StoreLocation, Facebook, ContactNo, Longitude, Latitude) VALUES ('$owner', '$store_name', '$location', '$store_location', '$facebook', '$contact', '$longitude', '$latitude')";
        $result = mysqli_query($conn, $sql);
        $sql = "DELETE FROM request WHERE ID = $id";
        $result = mysqli_query($conn, $sql);
        header("Location: request.php");
    }
?>