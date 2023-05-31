<?php
session_start();
$hasLogin = (isset($_SESSION['account'])?$_SESSION['account']:0);

    if(empty($hasLogin))
    {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome!</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/2.0.0-beta.2/cropper.min.js" integrity="sha512-fS4QJ9ehyszt8YAFRzFrIDf4WA+3C2Lg+wXGUIFnjGMdz9ACqbRkxIaUYf0BRKOTCfLY25SB4IuP3ed/+G0t1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
    color: #9bc1fa;
    font-size: 20px;
    font-weight: bold;
}
.image-upload-box {
      width: 200px;
      height: 200px;
      border: 2px dashed grey;
      position: relative;
      cursor: pointer;
      overflow: hidden;
    }

    /* Style for the logo inside the container box */
    .image-upload-box .logo {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    /* Style for the input file element */
    .image-upload-box input[type="file"] {
      opacity: 0;
      width: 100%;
      height: 100%;
      position: absolute;
      top: 0;
      left: 0;
      cursor: pointer;
    }

    /* Style for the text inside the container box */
    .image-upload-box .text {
      position: absolute;
      bottom: 10px;
      left: 0;
      right: 0;
      text-align: center;
    }
  </style>
    <body style="background: #eeecee;">
        <?php include 'header.php'; ?>
        <div class="container">
        
            
            <div class="row">
                <div class="container-fluid p-3" style="display: flex; justify-content: center; align-items: center;">
                    <div class="o-hidden border-0 shadow-lg col-lg-8 p-3" style="color: black;border-radius: 20px;">
                        <form>
                            <div class="row p-3" style="">
                            
                                <div class="col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col">
                                            <h1 class="text-center">Add Item</h1>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label>Product Name</label>
                                            <input type="text" class="form-control" placeholder="Product" id="product" required>
                                                
                                        </div>
                                        <div class="col">
                                            <label>Category</label>
                                            <select class="form-control" placeholder="Category" id="category" onchange="myFunction()" required>
                                                <option value="none" disabled>Select Category</option>
                                            <?php
                                            // Connect to your database and fetch category data
                                            $sql = "SELECT * FROM category";
                                            $results = mysqli_query($conn, $sql);
                                           
                                            
                                            // Loop through the categories and generate HTML options
                                            foreach ($results as $res) {
                                                echo '<option value="' . $res['CategoryName'] . '">' . $res['CategoryName'] . '</option>';
                                            }
                                            ?>
                                                <option>Add Category</option>
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label>Quantity</label>
                                            <input type="number" class="form-control" placeholder="Quantity" id="quantity" required>
                                        </div>
                                        <div class="col">
                                            <label>Price (₱)</label>
                                            <input type="number" class="form-control" placeholder="Price" id="price" required>
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                      <div class="col">
                                        <label>Description</label>
                                        <textarea class="form-control" placeholder="Description" id="description" style="height: 150px;" required></textarea>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col">
                                        <label>Image</label>
                                        <input type="file" class="form-control" placeholder="Image" id="image" required>

                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col">
                                          <input type="submit" class="btn btn-primary" value="Add Product" id = "btnsubmit" style="width: 100%; margin-top: 10px;">
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      
          
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
  



    function myFunction() {
  var x = document.getElementById("category").value;
  if (x == "Add Category") {
    add();
  }
 
}



function add() {
  Swal.fire({
    title: 'Add Category',
    input: 'text',
    inputAttributes: {
      autocapitalize: 'off'
    },
    showCancelButton: true,
    confirmButtonText: 'Add',
    showLoaderOnConfirm: true,
    preConfirm: (category) => {
      if (category) {
        var select = document.getElementById("category");
        var option = document.createElement("option");
        option.text = category;

        // Insert the new category as the second-to-last option
        var options = select.options;
        var indexToInsert = options.length - 1;
        var lastOption = options[options.length - 1];
        select.add(option, lastOption);
        select.value = category;
      }
    }
  })
}


    
    $("#btnsubmit").click(function(e){
    e.preventDefault();
    var itemName = $("#product").val();
    var category = $("#category").val();
    var quantity = $("#quantity").val();
    var price = $("#price").val();
    var description = $("#description").val();
    var image = document.getElementById('image');
    if(itemName == "" || category == "" || quantity == "" || price == "" || description == "" || image.files.length == 0)
    {
      alert("Please fill out all fields.");
      return false;
    }
    

    // Create a FormData object
    var formData = new FormData();
    formData.append('itemName', itemName); // Append the product name
    formData.append('category', category); // Append the category
    formData.append('quantity', quantity); // Append the quantity
    formData.append('price', price); // Append the price
    formData.append('description', description); // Append the description
    formData.append('image', image.files[0]); // Append the selected image file

    $.ajax({
        type: "POST",
        url: 'addProductpro.php',
        data: formData, // Use the FormData object as data
        processData: false,
        contentType: false,
        cache: false,
        success: function(response) {
            if (response == "1"){
                window.location = "index.php";
            } 
            else 
            {
                Swal.fire(
                    'Error',
                    response,
                    'error'
                )
            }
        }
    });
});

  </script>