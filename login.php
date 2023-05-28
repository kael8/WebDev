<?php
session_start();

$hasLogin = (isset($_SESSION['email'])?$_SESSION['email']:0);

    if (!empty($hasLogin)){
        header("location: index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome!</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body style="background-image: url(https://wallpapercave.com/wp/wp8391649.jpg);background-size: cover; /* Scale the image to cover the entire body */
    background-position: center center; /* Center the image horizontally and vertically */
    background-repeat: no-repeat;">
        <div class="container-fluid  "  style="display: flex; justify-content: center; align-items: center; height: 100vh;">
            <div class="card o-hidden border-0 shadow-lg my-5 col-lg-10 mx-auto"  style="background-color: rgba(0, 0, 0, .5); color: white;">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <form action="loginpro.php" method="post"class="p-3">
                            <row>
                                <div class="col">
                                    <h1 class="text-center">Login</h1>
                                </div>
                            <div class="row">
                                <div class="col">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="email" id="email">
                                    <p id="memail" style="color: red;"></p>
                                  </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="password" id="pass">
                                    <p id="pass"></p>
                                  </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="submit" class="btn btn-primary" value="Login" id="btnSubmit" style="width: 100%;" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="text-center">Don't have an account? <a href="register.php">Register</a></p>
                                </div>
                            </div>
                          </form>
                    </div>
                    <div class="col-md-6 col-sm-12 ">
                        <div class="p-3" style="height:100%; border-top-right-radius: 5px; border-bottom-right-radius: 5px;background-color: #101723; background-color: rgba(0, 0, 0, .9);">
                            <br>
                            <img src="img/intro.png" class="card-img-top">
                            <br><br>
                            <p class=" text-center " style="background: linear-gradient(to right, #FF9800, #fef49d, #FF9800); -webkit-background-clip: text;-webkit-text-fill-color: transparent;">Find the right store for car parts on our website. Search by make/model or part number and choose the best option with pricing, availability, and ratings/reviews. Enjoy hassle-free order tracking, delivery options, and customer support.</p>
                        
                        </div>
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
<script src="assets/js/custom.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var email = document.getElementById("email");
    var pass = document.getElementById("pass");

    email.addEventListener("keyup", function(){
        if(email.value.length > 0){
            pass.addEventListener("keyup", function(){
                if(pass.value.length > 0){
                    document.querySelector("input[type='submit']").disabled = false;
                }else{
                    document.querySelector("input[type='submit']").disabled = true;
                }
            });
        }else{
            document.querySelector("input[type='submit']").disabled = true;
        }
    });
    function submit(){
        
        
    }


    $("#btnSubmit").click(function(e){
        e.preventDefault();
        var pass = $("#pass").val();
        var email = $("#email").val();
        
        
        $.ajax({
            type: "POST",
            url: 'loginpro.php',
            data: {"email":email, "pass":pass},
            cache: false,
            success: function(response)
            {
                if (response == "1"){
                    window.location = "index.php";
                }
                else
                {
                    Swal.fire(
                      'Error',
                      "Invalid email or password",
                      'error'
                    )
                }
            }
       });
    })
    
</script>