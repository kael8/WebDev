<?php
    // Connect to the database
    include 'connection.php';
    if(isset($_POST['query']))
    {
        $search = $_POST['query'];
        

        ?>
        <table class = "table  table-rounded" style = "border-collapse: separate; border-spacing: 0 10px; border-radius: 10px;">
                            <tr>
                                <th>Request ID</th>
                                <th>Store Name</th>
                                <th>Location</th>
                                <th>Request Type</th>
                                <th>Account Name</th>
                                <th>Action</th>
                            </tr>
                            <?php
                                $sql = "SELECT r.ID, concat(a.FirstName, ' ', a.LastName) as OwnerName, r.StoreName, r.Location, r.StoreLocation, r.Facebook, r.ContactNo, r.Type, r.Longitude, r.Latitude
                                FROM request as r
                                INNER JOIN accounts as a
                                ON r.OwnerID = a.ID
                                WHERE r.StoreName LIKE '%$search%' OR r.StoreLocation LIKE '%$search%' OR r.Type LIKE '%$search%' OR concat(a.FirstName, ' ', a.LastName) LIKE '%$search%'";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result)){
                                    $request_id = $row['ID'];
                                    $store_name = $row['StoreName'];
                                    $location = $row['Location'];
                                    $owner = $row['OwnerName'];
                                    $longitude = $row['Longitude'];
                                    $latitude = $row['Latitude'];
                                    $facebook = $row['Facebook'];
                                    $contact = $row['ContactNo'];
                                    $type = $row['Type'];
                                    $store_location = $row['StoreLocation'];
                                    echo "<tr>";
                                    echo "<td>".$request_id."</td>";
                                    echo "<td>".$store_name."</td>";
                                    echo "<td>".$store_location."</td>";
                                    echo "<td>".$type."</td>";
                                    echo "<td>".$owner."</td>";
                                    echo "<td>
                                    <div class='row'>
                                        <div class='col p-1'>
                                            <form action = 'approve.php' method = 'POST'>
                                                <button class = 'btn btn-primary'>Approve</button>
                                                <input type = 'hidden' name = 'id' value = '".$request_id."'>
                                            </form>
                                        </div>
                                        <div class='col p-1'>
                                            <form action = 'reject.php' method = 'POST'> 
                                                <button class = 'btn btn-danger'>Reject</button> 
                                                <input type = 'hidden' name = 'id' value = '".$request_id."'>
                                            </form>
                                        </div>
                                    </div>
                                    
                                    
                                    </td>";
                                }
                                ?>
                        </table>
                        <?php
    }
    ?>