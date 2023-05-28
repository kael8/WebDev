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
        <!--<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <script type="module" src="index.ts"></script>-->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    
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
    <style>
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
    /* CSS for the notification and its container */
    .floating-notification {
      background-color: rgba(255, 255, 255, 0.5);
      padding: 10px;
      border: 1px solid rgba(0, 0, 0, 0.3);
      color: black;
      font-size: 20px;
    }

    .floating-notification-box {
      position: absolute;
      top: 10px;
      right: 10px;
      z-index: 1000;
    }
    </style>
    <body  onload="initMap()"  style="background: #eeecee;">
        <?php include 'header.php'; ?>

        
            <div class="container">
            <div class="row" >
                <div class="container-fluid p-3" style="display: flex; justify-content: center; align-items: center;">
                    <div class="o-hidden border-0 shadow-lg col-lg-12 text-dark" style="color: black;border-radius: 20px;">
                        
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <form action="shopregpro.php" method="post" class="p-3">
                                <div class="row">
                                    <div class="col">
                                        <h1 class="text-center">Register Store</h1>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col">
                                    <label>Store Name</label>
                                    <input type="text" class="form-control" placeholder="Store Name" id="storeName">
                                    <p id="mfname" style="color: red;"></p>
                                  </div>
                                  
                                </div>
                                <div class="row">
                                <div class="col">
                                    <label>Address</label><br>
                                    <textarea id="place" style="width:100%;height:80px;border:1px solid #ccc;background-color:#f9f9f9;padding:5px;" readonly></textarea>

                                  </div>
                                </div>
                                <div class="row">
                                      <div class="col">
                                        <label>Facebook Page(Optional)</label>
                                        <input type="email" class="form-control" placeholder="Page" id="page">
                                        <p id="memail" style="color: red;"></p>
                                      </div>
                                      <div class="col">
                                      <label>Contact No.(Optional)</label>
                                        <input type="text" class="form-control" placeholder="Contact No." id = "no">
                                        <p id="mpass"></p>
                                      </div>
                                </div>
                                <div class="row">
                                      <div class="col"> 
                                        <label>Image</label>
                                            <input type="file" class="form-control" placeholder="Image" id="image" required>
                                      </div>
                                </div>
                                <div class="row">
                                    <div class="col p-3">
                                        <input type="submit" class="btn btn-primary" value="Register" id = "btnsubmit" style="width: 100%;" disabled>
                                    </div>
                                </div>
                                
                              </form>
                            </div>
                            <div class="col-md-6 col-sm-12 clearfix p-5">
                                <div id="mapid" style="height: 500px;"></div>
                            </div>   
                            
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

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://kit.fontawesome.com/4f2d05d9c9.js" crossorigin="anonymous"></script>

<!--<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly"
      defer
    ></script>-->

    <!-- Import Leaflet CSS -->

<script>
    var m = false;
var n = false;
var lat = 0;
var lng = 0;
var img = false;
var displayName = '';

function initMap() {
  var openStreetMapLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
      '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
      'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18
    });

    var googleMapLayer = L.tileLayer('https://{s}.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
    subdomains:['mt0','mt1','mt2','mt3'],
    attribution: 'Map data © Google',
    maxZoom: 18
    });
    
    var map = L.map('mapid', {
    layers: [openStreetMapLayer]
    }).setView([10.391975987546365, 124.97977538359588], 18);

    var overlayMaps = {
    
    "Switch Map": googleMapLayer
    };

    L.control.layers(null, overlayMaps).addTo(map);

    var selectedLayer = openStreetMapLayer;

  var marker = null;
  var btnsubmit = document.getElementById('btnsubmit');

  var notification = L.DomUtil.create('div', 'floating-notification');
  notification.innerHTML = '<span id="notif"></span>';

  // Create a box for the notification
  var notificationBox = L.DomUtil.create('div', 'floating-notification-box');
  notificationBox.appendChild(notification);
  document.getElementById('mapid').appendChild(notificationBox);

  // Add a click event to the map
  map.on('click', function (event) {
     lat = event.latlng.lat;
     lng = event.latlng.lng;

    if (marker !== null) {
      map.removeLayer(marker);
    }

    console.log("Clicked on (" + lat + ", " + lng + ")");


    marker = L.marker([lat, lng]).addTo(map);

    fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=jsonv2`)
      .then(response => response.json())
      .then(data => {
        
        const placeId = data.place_id;
        const license = data.licence;
        const osmType = data.osm_type;
        const osmId = data.osm_id;
        displayName = data.display_name;
        const address = data.address;

        
        const info = {
          place_id: placeId,
          licence: license,
          osm_type: osmType,
          osm_id: osmId,
          lat: lat,
          lng: lng,
          display_name: displayName,
          address: address
        };

        console.log(displayName); 

        
        if (displayName.toLowerCase().includes("sogod")) {
          
          document.getElementById('notif').textContent = displayName;
          document.getElementById('place').textContent = displayName;
          // Show the floating notification
          notification.style.display = 'block';

          // Hide the floating notification after 3 seconds
          setTimeout(function () {
            notification.style.display = 'none';
          }, 3000);
          m = true;
          if(n == false || img == false)
          {
            btnsubmit.disabled = true;
          }
          else
          {
            btnsubmit.disabled = false;
          }
          
        } else {
          m = false;
          btnsubmit.disabled = true;
          // Update the floating notification with an error message
          document.getElementById('place').textContent = "Error: Not Area of Sogod";
          document.getElementById('notif').textContent = "Error: Not Area of Sogod";

          // Show the floating notification
          notification.style.display = 'block';

          // Hide the floating notification after 3 seconds
          setTimeout(function () {
            notification.style.display = 'none';
          }, 3000);
          
          return false;
        }
        
      })
      .catch(error => {
        console.error("Failed to retrieve geocoding data", error);
      });

    // Enable the submit button
    
    if (n == false) 
    {
      btnsubmit.disabled = true;
    } 
    else 
    {
      if (m == false) 
      {
        btnsubmit.disabled = true;
      } 
      else 
      {
        if(!(sname.value.length > 0))
        {
          btnsubmit.disabled = true;
        }
        else
        {
          if(img == false)
          {
            btnsubmit.disabled = true;
          }
          else
          {
            btnsubmit.disabled = false;
          }
          
        }
      }
    }
    
  });
}
$("#image").on("change", function () {
  img = true;
    if(!(sname.value.length > 0))
    {
      $("#btnsubmit").attr("disabled", true);
    }
    else
    {
      if(img == false)
      {
        $("#btnsubmit").attr("disabled", true);
      }
      else
      {
        if(m == false)
        {
          $("#btnsubmit").attr("disabled", true);
        }
        else
        {
          $("#btnsubmit").attr("disabled", false);
        }
        
      }
      
    }
    
});

var sname = document.getElementById('storeName');
var page = document.getElementById('page');
var con = document.getElementById('no.');

sname.addEventListener("input", function () {
    n = true;
  if (sname.value.length > 0) 
  {
    if (m == false) 
    {
      $("#btnsubmit").attr("disabled", true);
    } 
    else 
    {
      if (n == false) 
      {
        $("#btnsubmit").attr("disabled", true);
      } 
      else 
      {
        if(!(sname.value.length > 0))
        {
          $("#btnsubmit").attr("disabled", true);
        }
        else
        {
          if(img == false)
          {
            $("#btnsubmit").attr("disabled", true);
          }
          else
          {
            $("#btnsubmit").attr("disabled", false);
          }
          
        }
        
      }
    }
  } 
  else 
  {
    $("#btnsubmit").attr("disabled", true);
  }
  
});
$("#btnsubmit").click(function(e){
    e.preventDefault();
    var storeName = $("#storeName").val();
    var fpage = $("#page").val();
    var contact = $("#no").val();
    var image = document.getElementById('image');

    if (image.files.length === 0) {
        event.preventDefault(); // Prevent form submission
        alert("Please select a file.");
        return false;
    }

    // Create a FormData object
    var formData = new FormData();
    formData.append('storeName', storeName);
    formData.append('fpage', fpage);
    formData.append('contact', contact);
    formData.append('lat', lat);
    formData.append('lng', lng);
    formData.append('image', image.files[0]); // Append the selected image file
    formData.append('displayName', displayName);
    $.ajax({
        type: "POST",
        url: 'shopregpro.php',
        data: formData, // Use the FormData object as data
        processData: false,
        contentType: false,
        cache: false,
        success: function(response) {
            if (response == "1"){
                window.location = "index.php";
            } else {
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