<?php
session_start();
include 'connection.php';
$hasLogin = (isset($_SESSION['account'])?$_SESSION['account']:0);

    if(empty($hasLogin))
    {
        header("Location: login.php");
    }
    
    $_SESSION['id'] = $_SESSION['account'];
    $id = $_SESSION['id'];
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
    color: #9bc1fa;
    font-size: 20px;
    font-weight: bold;
}

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
                                            <?php
                                            $sql = "SELECT accounts.ID
                                            FROM accounts
                                            INNER JOIN store
                                            ON accounts.ID = store.OwnerID
                                            WHERE accounts.ID = '$id'";
                                            $result = mysqli_query($conn, $sql);
                                            $row = mysqli_fetch_assoc($result);
                                            ?>
                                            <div class="row">
                                                <div class="col-md-5 col-sm-12" style="border-right:1px solid grey">
                                                    <h3><b>Account Settings</b></h3>
                                                        <div style="width: 100%;background: lightgrey; border-radius: 10px;">
                                                        <h5 class="p-2">General</h5>
                                                    </div>
                                                    <?php
                                            
                                                    if($row)
                                                    {
                                                        
                                                        echo '<div style="width: 100%;background: lightgrey; border-radius: 10px;">
                                                        <h5 class="p-2">Store</h5>
                                                    </div>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="col-md-7 col-sm-12">
                                                    <h3>General Account Settings</h3>
                                                        
                                                    <?php
                                                    $sql = "SELECT FirstName, LastName, Email
                                                            FROM accounts
                                                            WHERE ID = '$id'";
                                                    $result = mysqli_query($conn, $sql);
                                                    $row = mysqli_fetch_assoc($result);
                                                    $fname = $row['FirstName'];
                                                    $lname = $row['LastName'];
                                                    $email = $row['Email'];
                                                echo '<div class="row">';
                                                echo    '<div class="col">';
                                                echo        '<p><b>Name</b><br>'.$fname.' '.$lname.'</p>';
                                                echo    '</div>';
                                                echo    '<div class="col p-3">';
                                                echo        '<button class="btn"style="float:right; height:100%;background: lightgrey;" id="name">Edit</button>';
                                                echo    '</div>';
                                                echo '</div>';
                                                ?>
                                                    <div class="row">
                                                        <div class="col" id="rname">

                                                        </div>
                                                    </div>
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

    $('#name').click(function(event) {
        $('#remail').html('');
        $('#rname').html( '<div class="row">' +
                              '<div class="col" style="padding-bottom: 10px;">' +
                                  '<input type="text" class="form-control" placeholder="First Name" name="fname" value="<?php echo $fname;?>" id="fname" required>' +
                              '</div>' +
                          '</div>' +
                          '<div class="row">' +
                              '<div class="col" style="padding-bottom: 10px;">' +
                                  '<input type="text" class="form-control" placeholder="Last Name" name="lname" value="<?php echo $lname;?>" id="lname" required>' +
                              '</div>' +
                          '</div>' +
                          '<div class="row">' +
                              '<div class="col">' +
                                  '<button class="btn btn-primary" style="float:left; height:100%; width:40%;" id="save">Save</button>' +
                                  '<button class="btn btn-secondary" style="float:right; height:100%; width:40%;" id="cancel">Cancel</button>' +
                              '</div>' +
                          '</div>');
        event.preventDefault();
    });

    // Use event delegation to attach the click listener to the parent element
    $('#rname').on('click', '#save', function() {
      
        var fname = $('#fname').val();
        var lname = $('#lname').val();
        $.ajax({
            url: 'updateName.php',
            type: 'POST',
            data: {
                fname: fname,
                lname: lname
            },
            success: function(data) {
                console.log(data);
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Your name has been updated!',
                    showConfirmButton: false,
                    timer: 1500
                })
                setTimeout(function() {
                    location.reload();
                }, 5500);
            }
        });
    });

    $('#email').click(function(event){
      $('#rname').html('');
      $('#remail').html(' <div class="row">' +
                              '<div class="col" style="padding-bottom: 10px;">' +
                                  '<input type="text" class="form-control" placeholder="Last Name" name="lname" value="<?php echo $email;?>" id="demail" required>' +
                              '</div>' +
                          '</div>' +
                          '<div class="row">' +
                              '<div class="col">' +
                                  '<button class="btn btn-primary" style="float:left; height:100%; width:40%;" id="save">Save</button>' +
                                  '<button class="btn btn-secondary" style="float:right; height:100%; width:40%;" id="cancel">Cancel</button>' +
                              '</div>' +
                          '</div>');
        event.preventDefault();
    });
    $('#remail').on('click', '#save', function() {
        alert('test');
        var demail = $('#demail').val();
        $.ajax({
            url: 'updateEmail.php',
            type: 'POST',
            data: {
              demail: demail
            },
            success: function(data) {
                console.log(data);
                location.reload();
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Your email has been updated!',
                    showConfirmButton: false,
                    timer: 1500
                })
                setTimeout(function() {
                    location.reload();
                }, 5500);
            }
        });
    });
});




</script>