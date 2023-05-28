<?php
session_start();
include 'connection.php';
$hasLogin = (isset($_SESSION['account'])?$_SESSION['account']:0);

    if ($hasLogin){
      
        $_SESSION['id'] = $_SESSION['account'];
    
    }
    else
    {
        $_SESSION['id'] = 0;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome!</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    
    <style>

    
  td:hover {
    transform: scale(1.05);
    transition-duration: 0.3s;
    background-color: blue;
  }
  td {
  transition: transform 0.3s;
}
td:hover img{
  box-shadow: 0 -5px 20px grey;
}
td:hover p{
    box-shadow: -5px 0 20px grey;
}
font{
    color: green;

    font-weight: bold;
}
  </style>
    <body style="background: #eeecee;">
        <?php include 'header.php'; ?>
       
        
            
        <div class = "row p-4">
                    <div class="o-hidden border-0 shadow-lg col-lg-12 text-dark" style="border-radius: 20px;">
                        <div class="row">
                          
                          
                              <?php 
                                    $sid = $_GET['id'];
                                    $sql = "SELECT product.Item, product.Price, product.Quantity, product.Category, product.ImageLocation, product.Description, store.OwnerID, store.ID, store.StoreName
                                    FROM product
                                    INNER JOIN store
                                    ON product.storeID = store.ID 
                                    WHERE product.ID = '$sid';";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    $item = $row['Item'];
                                    $price = $row['Price'];
                                    $quantity = $row['Quantity'];
                                    $category = $row['Category'];
                                    $image = $row['ImageLocation'];
                                    $description = $row['Description'];
                                    $ownerid = $row['OwnerID'];
                                    $storeid = $row['ID'];
                                    $storename = $row['StoreName'];
                                    echo "<div class='col-md-6 col-sm-12 p-5' style='display: flex; justify-content: center; align-items: center;'> <img src='$image' style='height: 100%; width: 100%; border: 1px solid black;'></div>";
                                    echo "<div class='col-md-6 col-sm-12 text-dark p-5'>";
                                    if ($ownerid == $_SESSION['id']){
                                        echo '<i class="fas fa-cog p-1" style="height: 20px; width: 20px; float: right;" onclick = "settings('.$sid.')"></i>';
                                    }
                                    echo "<h6 id='item'><b>Item:</b> $item</h6>";
                                    echo "<h6 id='price'><b>Price:</b> <font>₱$price</font></h6>";
                                    echo "<h6 id='quantity'><b>Quantity:</b> $quantity</h6>";
                                    echo "<h6 id='category'><b>Category:</b> $category</h6>";
                                    echo "<h6 id='description'><b>Description:</b> $description</h6>";
                                    echo "<h6 id='store'><b>Store:</b> <a href='shopfeed.php?id=$storeid' style='color: blue;'>$storename</a></h6>";
                                    echo "</div>";

                              ?>
                        
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
       <?php
            $options = array();
            $sql = "SELECT ID, CategoryName FROM category;";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                $options[$row["ID"]] = $row["CategoryName"];
            }
       ?>
          
    </body>
    
</html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="assets/js/jquery-1.10.2.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://kit.fontawesome.com/4f2d05d9c9.js" crossorigin="anonymous"></script>

<script>
    function editItem(sid) {

    Swal.fire({
        title: 'Edit Item Name',
        input: 'text',
        inputValue: '<?php echo $item; ?>',
        inputAttributes: {
            autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Save',
        showLoaderOnConfirm: true,
        preConfirm: (item) => {
            if (item) {
                // Send AJAX request to update contact number in database
                $.ajax({
                    url: 'updateItem.php',
                    type: 'POST',
                    data: { sid: sid, item: item },
                    success: function(response) 
                    {
                        // Update contact number on page
                        $('#item').eq(0).html('<b>Item:</b> ' + item);
                    }
                });
            }
        }
    });
}
    function editPrice(sid) {

    Swal.fire({
        title: 'Edit Price',
        input: 'number',
        inputValue: '<?php echo $price; ?>',
        inputAttributes: {
            autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Save',
        showLoaderOnConfirm: true,
        preConfirm: (price) => {
            if (price) {
                // Send AJAX request to update contact number in database
                $.ajax({
                    url: 'updatePrice.php',
                    type: 'POST',
                    data: { sid: sid, price: price },
                    success: function(response) 
                    {
                        // Update contact number on page
                        $('#price').eq(0).html('<b>Price:</b> <font>₱' + price + '</font>');
                    }
                });
            }
        }
    });
}
    function editQuantity(sid) {

    Swal.fire({
        title: 'Edit Quantity',
        input: 'number',
        inputValue: '<?php echo $quantity; ?>',
        inputAttributes: {
            autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Save',
        showLoaderOnConfirm: true,
        preConfirm: (quantity) => {
            if (quantity) {
                // Send AJAX request to update contact number in database
                $.ajax({
                    url: 'updateQuantity.php',
                    type: 'POST',
                    data: { sid: sid, quantity: quantity },
                    success: function(response) 
                    {
                        // Update contact number on page
                        $('#quantity').eq(0).html('<b>Quantity:</b> ' + quantity);
                    }
                });
            }
        }
    });
}
function editCategory(sid) {
  Swal.fire({
    title: 'Edit Category',
    html: '<select id="categ" class="form-control" style="width: 100%;margin-bottom:20px;">' +
          '<option value="0">Select Category</option><?php foreach($options as $key => $value){ echo "<option value=\"$key\">$value</option>"; } ?></select>' +
          '<input type="submit" id="submit" class="btn btn-primary" value="Submit" style="margin:5px;">' +
          '<input type="submit" id="cancel" class="btn btn-danger" value="Cancel" style="margin:5px;">',
    showCancelButton: false,
    showConfirmButton: false,
    didOpen: function() {
      var select = document.getElementById('categ').value;
      if(select == 0){
        $('#submit').prop('disabled', true);
      }
        $('#categ').change(function() {
            var select = document.getElementById('categ').value;
            if(select == 0){
            $('#submit').prop('disabled', true);
            }else{
            $('#submit').prop('disabled', false);
            }
        });
    },
    preConfirm: () => {
      let button = $(event.target);
      if(button.attr('id') == 'submit'){
          var categoryName = $('#categ option:selected').text();
          $.ajax({
            url: 'updateCategory.php',
            type: 'POST',
            data: { sid: sid, categoryName: categoryName },
            success: function(response) {
              $('#category').eq(0).html('<b>Category:</b> ' + categoryName);
            }
          });
      }
    }
  });

  $('#submit').click(function() {
    Swal.clickConfirm();
  });

  $('#cancel').click(function() {
    Swal.close();
  });
}


    function editDescription(sid) {

    Swal.fire({
        title: 'Edit Quantity',
        input: 'text',
        inputValue: '<?php echo $description; ?>',
        inputAttributes: {
            autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Save',
        showLoaderOnConfirm: true,
        preConfirm: (description) => {
            if (description) {
                // Send AJAX request to update contact number in database
                $.ajax({
                    url: 'updateDescription.php',
                    type: 'POST',
                    data: { sid: sid, description: description },
                    success: function(response) 
                    {
                        // Update contact number on page
                        $('#description').eq(0).html('<b>Description:</b> ' + description);
                    }
                });
            }
        }
    });
}
</script>



<script>
    function settings(sid) {
        // Create the modal using SweetAlert2
  Swal.fire({
    title: 'Settings',
    html: '<p>Choose an option:</p>',
    showConfirmButton: false,
    width: '80%',
    
    
    // Add two more buttons
    html:
        '<div class="d-flex justify-content-between">' +
        '<button class="btn btn-secondary mx-2" style="width:25%; font-size:12px;" id="Item"><i class="fas fa-shopping-cart"></i><br> Item</button>' +
        '<button class="btn btn-secondary mx-2" style="width:25%; font-size:12px;" id="Price"><i class="fas fa-tag"></i><br> Price</button>' +
        '<button class="btn btn-secondary mx-2" style="width:25%; font-size:12px;" id="Quantity"><i class="fas fa-hashtag"></i><br> Quantity</button>' +
        '<button class="btn btn-secondary mx-2" style="width:25%; font-size:12px;" id="Category"><i class="fas fa-filter"></i><br> Category</button>' +
        '<button class="btn btn-secondary mx-2" style="width:25%; font-size:12px;" id="Description"><i class="fas fa-book"></i><br> Description</button>' +
        '</div>',
    didOpen: function() {
      // Attach click event listeners to the buttons
      $('#Item').click(function() {
        editItem(sid);
      });
      $('#Price').click(function() {
        editPrice(sid);
      });
      // Attach click event listeners to the new buttons
      $('#Quantity').click(function() {
        editQuantity(sid);
      });
      $('#Category').click(function() {
        editCategory(sid);
      });
      $('#Description').click(function() {
        editDescription(sid);
      });
    }
  });
}
    
  </script>