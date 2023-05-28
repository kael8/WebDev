<?php include 'connection.php'; 
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
        
    </head>
    <body style="background-image: url(https://wallpapercave.com/wp/wp8391649.jpg);background-size: cover; /* Scale the image to cover the entire body */
    background-position: center center; /* Center the image horizontally and vertically */
    background-repeat: no-repeat;">
        <div class="container-fluid  " style="display: flex; justify-content: center; align-items: center; height: 100vh;">
            <div class="card o-hidden border-0 shadow-lg my-5 col-lg-10 mx-auto " style="background-color: rgba(0, 0, 0, .5); color: white;">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <form action="registerpro.php" method="post" class="p-3">
                            <row>
                                <div class="col">
                                    <h1 class="text-center">Register</h1>
                                </div>
                            <div class="row">
                              <div class="col">
                                <label>First Name</label>
                                <input type="text" class="form-control" placeholder="First name" id="fname">
                                <p id="mfname" style="color: red;"></p>
                              </div>
                              <div class="col">
                                <label>Last Name</label>
                                <input type="text" class="form-control" placeholder="Last name" id="lname">
                                <p id="mlname" style="color: red;"></p>
                              </div>
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
                                    <input type="password" class="form-control" placeholder="password" id = "pass">
                                  </div>
                                  <div class="col">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" placeholder="confirm password" id = "cpass">
                                    <p id="mpass"></p>
                                  </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="submit" class="btn btn-primary" value="Register" id = "btnsubmit" style="width: 100%;" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="text-center">Already have an account? <a href="login.php">Login</a></p>
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
    var cpass = document.getElementById("cpass");
    var pass = document.getElementById("pass");
    
    cpass.addEventListener("input", function() {
        if (cpass.value != pass.value) {
            document.querySelector("#mpass").style.color = "red";
            $("#mpass").html("Password does not match");
            $("#btnsubmit").attr("disabled", true);
        } else {
            if(document.getElementById("fname") != "" || document.getElementById("lname") != "" || document.getElementById("email") != "" || document.getElementById("pass") != "" || document.getElementById("cpass") != ""){
                $("#btnsubmit").attr("disabled", true);
            }
            
                if(!(cpass.value.length > 0))
                {
                    
                    document.querySelector("#mpass").style.color = "red";
                    $("#mpass").html("Enter password");
                    $("#btnsubmit").attr("disabled", true);
                }
                else
                {
                    document.querySelector("#mpass").style.color = "green";
                    $("#mpass").html("Password match");
                    $("#btnsubmit").attr("disabled", false);
                }
            
            
        }
    });
    pass.addEventListener("input", function() {
        if (cpass.value != pass.value) {
            document.querySelector("#mpass").style.color = "red";
            $("#mpass").html("Password does not match");
            $("#btnsubmit").attr("disabled", true);
        } else {
            
            
            if(document.getElementById("fname") != "" || document.getElementById("lname") != "" || document.getElementById("email") != "" || document.getElementById("pass") != "" || document.getElementById("cpass") != ""){
                $("#btnsubmit").attr("disabled", true);
            }
            
                if(!(pass.value.length > 0))
                {
                    document.querySelector("#mpass").style.color = "red";
                    $("#mpass").html("Enter password");
                    $("#btnsubmit").attr("disabled", true);
                }
                else
                {
                    
                    document.querySelector("#mpass").style.color = "green";
                    $("#mpass").html("Password match");
                    $("#btnsubmit").attr("disabled", false);
                }
            
        }
    });
    
    $("#btnsubmit").click(function(e){
        e.preventDefault();
        var pass = $("#pass").val();
        var cpass = $("#cpass").val();
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
        $("#mfname").html("");
        $("#mlname").html("");
        $("#memail").html("");
        if(fname == "")
        {
            $("#mfname").html("Please enter your first name");
            return false;
        }
        if(lname == "")
        {
            $("#mlname").html("Please enter your last name");
            return false;
        }
        if(email == "")
        {
            $("#memail").html("Please enter your email");
            return false;
        }
        
        $.ajax({
            type: "POST",
            url: 'registerpro.php',
            data: {"fname":fname, "lname":lname, "email":email, "pass":pass},
            cache: false,
            success: function(response)
            {
                if (response == "1"){
                    window.location = "login.php";
                }
                else if(response == "4")
                {
                    Swal.fire(
                      'Error',
                      'Email already exist',
                      'error'
                    )
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
    })

</script>