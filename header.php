<?php

include 'connection.php';
$hasLogin = (isset($_SESSION['account'])?$_SESSION['account']:0);
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
<div style="width: 100%;background-color: #eeecee;" class="border-bottom border-primary-subtle border-4">
    <div>
        <div class="container-fluid" style="display: flex; justify-content: center; align-items: center;">
            <div class="o-hidden border-0 p-4" style=" color: white;  width: 100%;">
                <div class="row justify-content-end" id = "pc" style="display: none;text-align: right;">
                    
                    <div class="col-md-2 col-sm-6">
                        <a href="index.php"><h6 class="btn p-0" style="color: black;">Home</h6></a>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <a href="products.php"><h6 class="btn p-0" style="color: black;">Products</h6></a>
                    </div>
                    <?php
                        if($hasLogin)
                        {
                          echo '<div class="col-md-2 col-sm-6">
                                <a href="settings.php"><h6 class="btn p-0" style="color: black;">Settings</h6></a>
                                </div>';
                        }
                    ?>
                    <div class="col-md-2 col-sm-6">
                        <a href="shoplist.php"><h6 class="btn p-0" style="color: black;">Store</h6></a>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <a href="about.php"><h6 class="btn p-0" style="color: black;">About Us</h6></a>
                    </div>
                    
                    <div class="col-md-2 col-sm-6" style="text-align: left;">
                        <div class="dropdown text-end">
                            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                              <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle light">
                            </a>
                            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                              <?php
                                
                                if($hasLogin)
                                {
                                    $id = $_SESSION['id'];
                                }
                                else
                                {
                                    $id = 0;
                                }
                                $sql = "SELECT store.ID as sid
                                FROM store
                                INNER JOIN accounts
                                ON OwnerID = accounts.ID
                                WHERE accounts.ID = '$id'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                if($row)
                                {
                                    $sid = $row['sid'];
                                }
                                else
                                {
                                    $sid = 0;
                                }
                                if($id && $sid)
                                {
                                    echo '<li><a class="dropdown-item" href="logoutpro.php">Sign out</a></li>';
                                }
                                else if($id)
                                {
                                    echo '<li><a class="dropdown-item" href="logoutpro.php">Sign out</a></li>';
                                }
                                else
                                {
                                    echo '<li><a class="dropdown-item" href="login.php">Sign in</a></li>';
                                }
                              ?>
                              <li><hr class="dropdown-divider"></li>
                              <?php
                              
                              $sql = "SELECT store.ID as sid
                              FROM store
                              INNER JOIN accounts
                              ON OwnerID = accounts.ID
                              WHERE accounts.ID = '$id'";
                              $result = mysqli_query($conn, $sql);
                                if(mysqli_num_rows($result) > 0)
                                {
                                    foreach($result as $row)
                                    {
                                        $storeid = $row['sid'];
                                        echo "<li><a class='dropdown-item' href='shopfeed.php?id=$storeid'>My Store</a></li>";
                                    }
                                }
                                else if($id)
                                {
                                    echo "<li><a class='dropdown-item' href='shopreg.php'>Add Store</a></li>";
                                }
                                else
                                {
                                    echo "<li><a class='dropdown-item' href='login.php'>Add Store</a></li>";
                                }
                              ?>
                              
                            </ul>
                          </div>
                          
                          
                        
                          
                          
                          
                            
                        
                        
                        
                    </div>
                    
                </div>
                <div id="mobile" style="text-align:right; display: none;">
                    <div class="dropdown">
                        <button id="dropdown-button" class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bars"></i>
                        </button>
                        <div id="dropdown-list" class="dropdown-menu" aria-labelledby="dropdown-button" style = "text-align: center;">
                            <a href="index.php"><h6 class="btn p-0" style="color: black;">Home</h6></a><br>
                            <a href="products.php"><h6 class="btn p-0" style="color: black;">Products</h6></a><br>
                            <?php
                                if($hasLogin)
                                {
                                echo '<a href="settings.php"><h6 class="btn p-0" style="color: black;">Settings</h6></a><br>';
                                }
                            ?>
                            
                            <a href="shoplist.php"><h6 class="btn p-0" style="color: black;">Store</h6></a><br>
                            <a href="about.php"><h6 class="btn p-0" style="color: black;">About Us</h6></a><br>
                            
                                <?php
                                
                                if($hasLogin)
                                {
                                    $id = $_SESSION['id'];
                                }
                                else
                                {
                                    $id = 0;
                                }
                                $sql = "SELECT store.ID as sid
                                FROM store
                                INNER JOIN accounts
                                ON OwnerID = accounts.ID
                                WHERE accounts.ID = '$id'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                if($row)
                                {
                                    $sid = $row['sid'];
                                }
                                else
                                {
                                    $sid = 0;
                                }
                                if($id && $sid)
                                {
                                    echo '<a href="logoutpro.php"><h6 class="btn p-0" style="color: black;">Sign out</h6></a>';
                                }
                                else if($id)
                                {
                                    echo '<a href="logoutpro.php"><h6 class="btn p-0" style="color: black;">Sign out</h6></a>';
                                }
                                else
                                {
                                    echo '<a href="login.php"><h6 class="btn p-0" style="color: black;">Sign in</h6></a>';
                                }
                                echo "<br>";
                                $sql = "SELECT store.ID as sid
                              FROM store
                              INNER JOIN accounts
                              ON OwnerID = accounts.ID
                              WHERE accounts.ID = '$id'";
                              $result = mysqli_query($conn, $sql);
                                if(mysqli_num_rows($result) > 0)
                                {
                                    foreach($result as $row)
                                    {
                                        $storeid = $row['sid'];
                                        echo "<a href='shopfeed.php?id=$storeid'><h6 class='btn p-0' style='color: black;'>My Store</h6></a>";
                                    }
                                }
                                else if($id)
                                {
                                    echo "<a href='shopreg.php'><h6 class='btn p-0' style='color: black;'>Add Store</h6></a>";
                                }
                                else
                                {
                                    echo "<a href='login.php'><h6 class='btn p-0' style='color: black;'>Add Store</h6></a>";
                                }
                              ?>
                                
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .dropdown-toggle::after {
  display: none !important;
}
    .dropdown:hover .dropdown-menu {
    display: block;
    animation-name: slide;
    animation-duration: 0.5s;
  }

  @keyframes slide {
    from {opacity: 0; transform: translateY(-10px);}
    to {opacity: 1; transform: translateY(0);}
  }
</style>
<script>
    // Check if the device is a mobile or a desktop PC based on screen width
function isMobileDevice() {
    return (window.innerWidth < 768);
};

// Show the button only on mobile devices
if (isMobileDevice()) {
    var div = document.getElementById("mobile");
    div.style.display = "block";
    button.style.right = "0px";
} else {
    var div = document.getElementById("pc");
    div.style.display = "flex";
}
window.addEventListener('resize', function(event) {
  if (isMobileDevice()) {
    var divMobile = document.getElementById("mobile");
    var divPc = document.getElementById("pc");

    // Show the mobile div and hide the pc div
    divMobile.style.display = "block";
    divPc.style.display = "none";
  } else {
    var divMobile = document.getElementById("mobile");
    var divPc = document.getElementById("pc");

    // Hide the mobile div and show the pc div
    divMobile.style.display = "none";
    divPc.style.display = "flex";
  }
});
const dropdownButton = document.getElementById('dropdown-button');
const dropdownList = document.getElementById('dropdown-list');

dropdownButton.addEventListener('click', function() {
  dropdownList.classList.toggle('show');
});

window.addEventListener('click', function(event) {
  if (!event.target.matches('#dropdown-button')) {
    dropdownList.classList.remove('show');
  }
});

</script>