<?php
    // Connect to the database
    include 'connection.php';
    if(isset($_POST['query']))
    {
        $search = $_POST['query'];
        

        ?>
        <table class = "table   table-rounded" style = "border-collapse: separate; border-spacing: 0 10px; border-radius: 10px;">
                            <tr>
                                <th>ID</th>
                                <th>Store Name</th>
                                <th>Location</th>
                                <th>Account Name</th>
                                <th>Action</th>
                            </tr>
                            <?php
                               $sql = "SELECT s.ID, s.StoreName, s.StoreLocation, concat(a.FirstName, ' ', a.LastName) as OwnerName, s.ID as StoreID
                               FROM store as s
                               INNER JOIN accounts as a
                               ON s.OwnerID = a.ID
                               WHERE s.StoreName LIKE '%$search%' OR s.StoreLocation LIKE '%$search%' OR concat(a.FirstName, ' ', a.LastName) LIKE '%$search%'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>".$row['ID']."</td>";
                                        echo "<td><a href = 'shopfeed.php?id=".$row['StoreID']."'>".$row['StoreName']."</a></td>";
                                        echo "<td>".$row['StoreLocation']."</td>";
                                        echo "<td>".$row['StoreName']."</td>";
                                        echo "<td>
                                                <div class='row'>
                                                    <div class='col-6 p-1'>
                                                        <a class = 'btn btn-primary' href = 'manageProducts.php?StoreID=".$row['StoreID']."&store=".$row['StoreName']."'><i class='fa-solid fa-eye fa-xs'></i></a>
                                                    </div>
                                                    <div class='col-6 p-1'>
                                                        <form action = 'storeDelete.php' method = 'POST'> 
                                                            <button class = 'btn btn-danger'><i class='fa-solid fa-trash-can fa-xs'></i></button> 
                                                            <input type = 'hidden' name = 'id' value = '".$row['ID']."'>
                                                        </form>
                                                    </div>
                                                </div>
                                             </td>";
                                        echo "</tr>";
                                    }
                                } 
                            ?>
                        </table>
        <?php
    }
?>