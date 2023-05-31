<?php
    // Connect to the database
    include 'connection.php';
    if(isset($_POST['query']))
    {
        $search = $_POST['query'];
        

        ?>
        <table class = "table  table-rounded text-center" style = "border-collapse: separate; border-spacing: 0 10px; border-radius: 10px;">
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name Name</th>
                                <th>Owned Store</th>
                                <th>Action</th>
                            </tr>
                            <?php
                               $sql = "SELECT a.ID, s.StoreName, a.FirstName, a.LastName, s.ID as StoreID
                               FROM store as s
                               INNER JOIN accounts as a
                               ON s.OwnerID = a.ID
                               WHERE s.StoreName LIKE '%$search%' OR a.FirstName LIKE '%$search%' OR a.LastName LIKE '%$search%'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>".$row['ID']."</td>";
                                        echo "<td>".$row['FirstName']."</td>";
                                        echo "<td>".$row['LastName']."</td>";
                                        echo "<td><a href = 'shopfeed.php?id=".$row['StoreID']."'>".$row['StoreName']."</a></td>";
                                        echo "<td>
                                                <div class='row'>
                                                    <div class='col p-1'>
                                                        <form action = 'accountDelete.php' method = 'POST'> 
                                                            <button class = 'btn btn-danger'>Delete</button> 
                                                            <input type = 'hidden' name = 'id' value = '".$row['ID']."'>
                                                            <input type = 'hidden' name = 'storeid' value = '".$row['StoreID']."'>
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