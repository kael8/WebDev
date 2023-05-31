<?php
    // Connect to the database
    include 'connection.php';
    if(isset($_POST['query']))
    {
        $search = $_POST['query'];
        

        ?>
        <table class = "table table-rounded text-center" style = "border-collapse: separate; border-spacing: 0 10px; border-radius: 10px;">
                            <tr>
                                <th>ID</th>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th>Store</th>
                                <th>Action</th>
                            </tr>
                            <?php
                                if(isset($_POST['store']))
                                {
                                    $store = $_POST['store'];
                                    $sql = "SELECT p.ID, p.Item, p.Price, p.Quantity, p.Category, s.StoreName, s.ID as StoreID
                                    FROM product as p
                                    INNER JOIN store as s
                                    ON p.StoreID = s.ID
                                    WHERE s.ID = $store AND (p.Item LIKE '%".$search."%' OR p.Category LIKE '%".$search."%' OR s.StoreName LIKE '%".$search."%' OR p.Price LIKE '%".$search."%' OR p.Quantity LIKE '%".$search."%')";
                                }
                                else
                                {
                                    $sql = "SELECT p.ID, p.Item, p.Price, p.Quantity, p.Category, s.StoreName, s.ID as StoreID
                                    FROM product as p
                                    INNER JOIN store as s
                                    ON p.StoreID = s.ID
                                    WHERE p.Item LIKE '%".$search."%' OR p.Category LIKE '%".$search."%' OR s.StoreName LIKE '%".$search."%' OR p.Price LIKE '%".$search."%' OR p.Quantity LIKE '%".$search."%'";
                                }
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>".$row['ID']."</td>";
                                        echo "<td><a href = 'productview.php?id=".$row['ID']."'>".$row['Item']."</a></td>";
                                        echo "<td>".$row['Price']."</td>";
                                        echo "<td>".$row['Quantity']."</td>";
                                        echo "<td>".$row['Category']."</td>";
                                        echo "<td><a href = 'shopfeed.php?id=".$row['StoreID']."'>".$row['StoreName']."</a></td>";
                                        echo "<td>
                                                <div class='row'>
                                                    <div class='col p-1'>
                                                        <form action = 'productDelete.php' method = 'POST'> 
                                                            <button class = 'btn btn-danger'>Delete</button> 
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