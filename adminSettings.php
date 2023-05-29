<?php
session_start();
include 'connection.php';
$adminLogin = (isset($_SESSION['admin'])?$_SESSION['admin']:0);

    if(empty($adminLogin))
    {
        header("Location: login.php");
    }
    
    $id = $_SESSION['admin'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome!</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
   

  </style>
    <body style="background: #eeecee;">
        <?php include 'header.php'; ?>
        
        
        <div class="container"> 
        <div class = "row p-4">
                    <div class="o-hidden border-0 shadow-lg col-lg-12 text-dark" style="border-radius: 20px;">
                        <form>
                            <div class="row p-3">
                            
                                <div class="col">
                                    
                                    <div class="row">
                                        <div class="col">
                                            
                                            <div class="row">
                                                <div class="col-md-5 col-sm-12" style="border-right:1px solid grey">
                                                    <h3><b>Account Settings</b></h3>
                                                        <div style="width: 100%;background: lightgrey; border-radius: 10px;">
                                                        <h5 class="p-2">General</h5>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-7 col-sm-12">
                                                    <h3>General Account Settings</h3>
                                                        
                                                    <?php
                                                    
                                                    $sql = "SELECT Email, Password
                                                            FROM admin
                                                            WHERE ID = '".$_SESSION['admin']."'";
                                                    $result = mysqli_query($conn, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    
                                                    $email = $row['Email'];
                                                    $password = $row['Password'];
                                                
                                                ?>
                                                    
                                                    <div class="row" style="padding-top: 20px;">
                                                        <div class="col">
                                                            <p><b>Email</b><br><?php echo $email; ?></p>
                                                        </div>
                                                        <div class="col p-3">
                                                            <button class="btn"style="float:right; height:100%;background: lightgrey;" id="email">Edit</button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col" id="remail">

                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row" style="padding-top: 20px;">
                                                        <div class="col">
                                                            <p><b>Password</b></p>
                                                        </div>
                                                        <div class="col p-3">
                                                            <button class="btn"style="float:right; height:100%;background: lightgrey;" id="password">Edit</button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col" id="rpassword">

                                                        </div>
                                                    </div>
                                            </div>
                                            
                                            
                                         
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
    
   $(document).ready(function() {

    

    $('#email').click(function(event){
      
      $('#rpassword').html('');
      $('#remail').html(' <div class="row">' +
                              '<div class="col" style="padding-bottom: 10px;">' +
                                  '<input type="text" class="form-control" placeholder="Last Name" name="lname" value="<?php echo $email;?>" id="demail" required>' +
                              '</div>' +
                          '</div>' +
                          '<div class="row">' +
                              '<div class="col-auto">' +
                                   '<div class="form-check">' +
                                        '<p id = "memail"></p>' +
                                   '</div>' +
                              '</div>' +
                          '</div>' +
                          '<div class="row">' +
                              '<div class="col">' +
                                  '<button class="btn btn-primary" style="float:left; height:100%; width:40%;" id="save" disabled>Save</button>' +
                                  '<button class="btn btn-secondary" style="float:right; height:100%; width:40%;" id="cancel">Cancel</button>' +
                              '</div>' +
                          '</div>');
        
        
        
        $('#demail').on("input", function() {
            var email = $('#demail').val();
            if (email.includes('@') && email.includes('.')) {
                if(email == '<?php echo $email;?>'){
                    $('#memail').css('color', 'red');
                    $('#memail').html('Email already in use');
                    $('#save').prop('disabled', true);
                }else{
                    $('#memail').css('color', 'green');
                    $('#memail').html('Valid Email');
                    $('#save').prop('disabled', false);
                }
            } else {
                $('#memail').css('color', 'red');
                $('#memail').html('Invalid Email');
                $('#save').prop('disabled', true);
            }
        });

        event.preventDefault();
    });
    $('#remail').on('click', '#save', function() {
       
        var demail = $('#demail').val();
        $.ajax({
            url: 'updateEmail.php',
            type: 'POST',
            data: {
              demail: demail
            },
            success: function(data) {
                
            }
        });
    });



    $('#password').click(function(event){
      
      $('#remail').html('');
      $('#rpassword').html( '<div class="row">' +
                                '<div class="col" style="padding-bottom: 10px;">' +
                                    '<input type="password" class="form-control" placeholder="Password" name="lpassword"  value="<?php echo $password;?>" id="dpassword" required>' +
                                '</div>' +
                            '</div>' +
                            '<div class="row justify-content-end p-3">' +
                                '<div class="col-auto">' +
                                    '<div class="form-check">' +
                                        '<p id = "mpass"></p>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="col-auto">' +
                                    '<div class="form-check">' +
                                        '<input class="form-check-input" type="checkbox" id="showPassword">' +
                                        '<label class="form-check-label" for="showPassword">Show Password</label>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                            '<div class="row">' +
                                '<div class="col">' +
                                    '<button class="btn btn-primary" style="float:left; height:100%; width:40%;" id="save" disabled>Save</button>' +
                                    '<button class="btn btn-secondary" style="float:right; height:100%; width:40%;" id="cancel">Cancel</button>' +
                                '</div>' +
                            '</div>');

    var passwordInput = document.getElementById("dpassword");

    passwordInput.addEventListener("input", function() {
        var password = passwordInput.value;
        var uppercaseRegex = /[A-Z]/; // Regex for checking uppercase letter
        var specialCharRegex = /[!@#$%^&*(),.?":{}|<>]/; // Regex for checking special character

        var message = '';

        if (password.length < 8) {
            message = 'Password must be at least 8 characters long';
        } else if (!uppercaseRegex.test(password)) {
            message = 'Password must contain at least one uppercase letter';
        } else if (!specialCharRegex.test(password)) {
            message = 'Password must contain at least one special character';
        } else if(password == '<?php echo $password;?>'){
            message = 'Password is the same';
        } else {
            message = 'Password meets the requirements';
        }

        $('#mpass').text(message);

        if (message === 'Password meets the requirements') {
            $('#mpass').css('color', 'green');
            $('#save').prop('disabled', false);
        } else {
            $('#mpass').css('color', 'red');
            $('#save').prop('disabled', true);
        }
    });

    function togglePasswordVisibility() {
    var passwordInput = document.getElementById("dpassword");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
    }

// Event listener for the "Show Password" checkbox
document.getElementById("showPassword").addEventListener("change", togglePasswordVisibility);
        event.preventDefault();
    });
    $('#rpassword').on('click', '#save', function() {
     
        var dpassword = $('#dpassword').val();
        $.ajax({
            url: 'updatePassword.php',
            type: 'POST',
            data: {
                dpassword: dpassword
            },
            success: function(data) {
                console.log(data);
           
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Your password has been updated!',
                    showConfirmButton: false,
                    timer: 3500
                })
                setTimeout(function() {
                 
                }, 5500);
            }
        });
    });
});




</script>