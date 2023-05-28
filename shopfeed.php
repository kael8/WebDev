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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

<link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

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
    <body onload = "initMap()" style="background: #eeecee;">
        <?php include 'header.php'; ?>
        
        
        <div class="container">
        <div class="row p-3">
                
                    <div class="">
                        <div class="row o-hidden border-0 shadow-lg col-lg-12 text-dark p-4" style = "border-radius: 20px;">
                            
                            <div class = "col-md-6 col-sm-12" id="mapid" style="height: 400px; border: 1px solid black;"></div>
                                  
                            <div class="col-md-6 col-sm-12 text-dark">
                              <?php
                              $sid = $_GET['id'];
                              $sql = "SELECT StoreName, StoreLocation, Facebook, ContactNo, OwnerID
                                FROM store
                                WHERE ID = '$sid'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                $storeName = $row['StoreName'];
                                $storeLocation = $row['StoreLocation'];
                                $ownerID = $row['OwnerID'];
                                $fb= $row['Facebook'];
                                $contact = $row['ContactNo'];
                                if($_SESSION['id'] == $ownerID)
                                {
                                  echo '<i class="fas fa-cog p-1" style="height: 20px; width: 20px; float: right;" onclick = "settings('.$sid.')"></i>';
                                }
                              ?>

                            <div>
                              <?php
                              
                              
                              echo "<h5 id ='store'><b>Store:</b> ".$storeName."</h1>";     
                              echo "<h5 id ='addr'><b>Address:</b> ".$storeLocation."</h3>";
                              if($row['Facebook'])
                              {
                                echo "<h5 id ='fb'><b>Facebook:</b> ".$row['Facebook']."</h5>";
                              }
                              if($row['ContactNo'])
                              {
                                echo "<h5 id ='contact'><b>Contact No:</b> ".$row['ContactNo']."</h5>";
                              }

                              
                              ?>
                              
                            </div>
                          </div>
                        </div>
                        
                        
                        

                        <div class="row" style="padding-top: 40px;">
                          <div class="col">
                            <div class="row o-hidden border-0 shadow-lg col-lg-12 text-dark p-4" style = "border-radius: 20px;">
                            <div class="col">
                            <?php
                        if($_SESSION['id'] == $ownerID)
                        {
                            echo 
                            '<div class="row">
                                <div class="col">
                                    <div class="d-flex justify-content-end"> <!-- Use "d-flex" and "justify-content-end" classes to create a flex container and align content to the end (right) -->
                                      
                                        <p class="btn btn-primary"  onclick="window.location.href=\'addProduct.php\'">Add Item <i class="fa fa-plus"></i></p>
                                      
                                    </div>
                                </div>
                            </div>';
                        }
                        ?>
                            <div class="container">
                              <div class="row">
                                    
                            <?php
  // Assuming $results is an array of data to be displayed in the table
  // Fetch data from the database
  if(isset($_GET['id']))
  {
    $sql = "SELECT Item, Category, Price, ImageLocation, ID
          FROM product
          WHERE storeID = '$sid'";

    $results = mysqli_query($conn, $sql);
    
    foreach($results as $rows) {
     
      echo '<div class="col-md-3 col-sm-6 td">
      <div class="thumbnail">
      <center>';
            // Check if there is a result for the current column
            $item = $rows['Item'];
            $category = $rows['Category'];
            $price = $rows['Price'];
            $imgSrc = $rows['ImageLocation']; // Assuming the image source is stored in 'Latitude' column
            $id = $rows['ID'];
            echo '<a href="productview.php?id=' . $id . '" style="text-decoration:none; color: black;">';
            echo '<img src="' . $imgSrc . '" alt="' . $item . '" style="width: 100%; height: 200px;">';
            echo '<p>' . $item . '<br><font>₱' . $price . '</font></p>';
            echo '</a>';
            echo '</center>';
            echo '</div>';
            echo '</div>';
          }
         
     

  } else {
    // Display an empty table if id is not set
    echo '<table class="table table-light table-striped" style="text-align: center; color: black;">';
    echo '<tr style="height: 200px;">';
    for ($col = 0; $col < 4; $col++) {
      echo '<td style="border-right: 10px solid #eeecee;width: 25%; box-sizing: border-box;"></td>';
    }
    echo '</tr>';
    echo '</table>';
  }
  $sql = "SELECT Latitude, Longitude, ID
          FROM store
          ";
  $result = mysqli_query($conn, $sql);
  $coordinates = array();

// Fetch the result and store coordinates in the array
while ($row = $result->fetch_assoc()) {
  $coordinates[] = array($row['Latitude'], $row['Longitude'], $row['ID']);
}

// Convert the PHP array to a JSON string
$coordinates_json = json_encode($coordinates);
$sql = "SELECT Latitude, Longitude
          FROM store
          WHERE ID = '$sid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$lati = $row['Latitude'];
$long = $row['Longitude'];
?>

                                    
                                
                            </div>
                        </div>
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


<script>
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
    }).setView([<?php echo $lati.', '.$long?>], 18);

    var overlayMaps = {
    
    "Switch Map": googleMapLayer
    };

    L.control.layers(null, overlayMaps).addTo(map);

    var selectedLayer = openStreetMapLayer;




  var coordinates = <?php echo $coordinates_json; ?>;

 
  for (var i = 0; i < coordinates.length; i++) {
    var lat = coordinates[i][0];
    var lng = coordinates[i][1];
    var id = coordinates[i][2];


    var storeIcon = L.icon({
  iconUrl: 'img/shop-1.1s-200px.svg', 
  iconSize: [64, 64], 
  iconAnchor: [32, 64],
  popupAnchor: [0, -64],
  shadowUrl: '', 
  shadowSize: [0, 0], 
  shadowAnchor: [0, 0], 
});


var css = '.leaflet-marker-icon { filter: drop-shadow(0 10px 10px rgba(0, 0, 255, 0.3)); }' +
  '.leaflet-marker-shadow { border-radius: 50%; background: radial-gradient(ellipse at center, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0) 100%); }';


var style = document.createElement('style');
style.innerHTML = css;
document.head.appendChild(style);


var marker = L.marker([lat, lng], { icon: storeIcon }).addTo(map);



    // Add a popup to the marker
    marker.bindPopup('<a href = "shopfeed.php?id=' + id + '">Visit Store</a>');
  }
}

// Call the initMap function when the page loads
window.onload = initMap;

</script>
<script>
  function editStore(sid) {
  Swal.fire({
    title: 'Edit Store Name',
    input: 'text',
    inputValue: "<?php echo $storeName; ?>",
    inputAttributes: {
      autocapitalize: 'off'
    },
    showCancelButton: true,
    confirmButtonText: 'Save',
    showLoaderOnConfirm: true,
    preConfirm: (storeName) => {
      if (storeName) {
        // Send AJAX request to update store name in database
        $.ajax({
          url: 'updateStoreName.php',
          type: 'POST',
          data: { sid: sid, storeName: storeName },
          success: function(response) {
            // Update store name on page
            $('#store').eq(0).html('<b>Store:</b> ' + storeName);
          }
        });
      }
    }
  });
}
var but = false;
var lat;
var lng;
var displayName;
function initializePopupMap() {
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
    
    var pmap = L.map('popup-map', {
    layers: [openStreetMapLayer]
    }).setView([<?php echo $lati.', '.$long?>], 18);

    var overlayMaps = {
    
    "Switch Map": googleMapLayer
    };

    L.control.layers(null, overlayMaps).addTo(pmap);

    var selectedLayer = openStreetMapLayer;
  var marker = null;
  var notification = L.DomUtil.create('div', 'floating-notification');
  notification.innerHTML = '<span id="notif"></span>';

  var notificationBox = L.DomUtil.create('div', 'floating-notification-box');
  notificationBox.appendChild(notification);
  document.getElementById('popup-map').appendChild(notificationBox);

  pmap.on('click', function (event) {
    lat = event.latlng.lat;
    lng = event.latlng.lng;
but = false;
          updateSaveButtonDisplay()
    if (marker !== null) {
      pmap.removeLayer(marker);
    }

    console.log("Clicked on (" + lat + ", " + lng + ")");

    marker = L.marker([lat, lng]).addTo(pmap);
  
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
          
          notification.style.display = 'block';

          setTimeout(function () {
            notification.style.display = 'none';
          }, 3000);
          but = true;
          updateSaveButtonDisplay()
          
        } else {
          
          document.getElementById('notif').textContent = "Error: Not Area of Sogod";
          
          notification.style.display = 'block';

          setTimeout(function () {
            notification.style.display = 'none';
          }, 3000);
          but = false;
          updateSaveButtonDisplay()
          return false;
        }
        
      })
      .catch(error => {
        console.error("Failed to retrieve geocoding data", error);
      });
  });
}
function updateSaveButtonDisplay() {
  var saveButton = document.getElementById('save');
  if (but) {
    saveButton.style.display = 'block';
  } else {
    saveButton.style.display = 'none';
  }
}
function editAddress(sid) {
  Swal.fire({
    title: 'Edit Store Address',
    html: '<div id="popup-map" style="height: 400px; width:100%; border:1px solid black; margin-bottom: 20px;"></div>' +
          '<div style="display:flex; justify-content: center;">' +
          '<button class="btn btn-primary mx-2" style="width:25%; font-size:13px; display: none;" id="save"><i class="fa-solid fa-location-dot fa-fade"></i><br>Save</button>' +
          '<button class="btn btn-secondary mx-2" style="width:25%; font-size:13px;" id="cancel"><i class="fa-solid fa-xmark fa-fade"></i><br>Cancel</button>' +
          '</div>',
    showCancelButton: false,
    showConfirmButton: false,

    didOpen: function() {
      initializePopupMap();
    },
    preConfirm: function() {
      var button = $(event.target);
      if (button.attr('id') == 'save') {
        $.ajax({
          url: 'updateStoreLocation.php',
          type: 'POST',
          data: { sid: sid, displayName: displayName, lat: lat, lng: lng},
          success: function(response) {
            if(response == "1")
            {
              location.reload();
            }
          }
        });
      }
    }
  });

  // Add click event listeners to the Save and Cancel buttons
  $('#save').click(function() {
    Swal.clickConfirm();
  });
  $('#cancel').click(function() {
    Swal.close();
  });
}



function editFacebook() {
  console.log("Hey");
  Swal.fire({
    title: 'Edit Facebook Page',
    input: 'text',
    inputValue: "<?php echo $fb; ?>",
    inputAttributes: {
      autocapitalize: 'off'
    },
    showCancelButton: true,
    confirmButtonText: 'Save',
    showLoaderOnConfirm: true,
    preConfirm: (facebook) => {
      if (facebook) {
        // Send AJAX request to update Facebook page in database
        $.ajax({
          url: 'updateFacebook.php',
          type: 'POST',
          data: { sid: sid, facebook: facebook },
          success: function(response) {
            // Update Facebook page on page
            $('#fb').eq(0).html('<b>Facebook:</b> ' + facebook);
          }
        });
      }
    }
  });
}

function editContact(sid) {

  Swal.fire({
    title: 'Edit Contact No',
    input: 'text',
    inputValue: "<?php echo $contact; ?>",
    inputAttributes: {
      autocapitalize: 'off'
    },
    showCancelButton: true,
    confirmButtonText: 'Save',
    showLoaderOnConfirm: true,
    preConfirm: (contactNo) => {
      if (contactNo) {
        // Send AJAX request to update contact number in database
        $.ajax({
          url: 'updateContact.php',
          type: 'POST',
          data: { sid: sid, contactNo: contactNo },
          success: function(response) {
            // Update contact number on page
            $('#contact').eq(0).html('<b>Contact No:</b> ' + contactNo);
          }
        });
      }
    }
  });
}
  </script>
  <script>
    function settings(sid) {
  Swal.fire({
    title: 'Settings',
    html: '<p>Choose an option:</p>',
    showConfirmButton: false,
    html:
      '<div class="d-flex justify-content-between">' +
      '<button class="btn btn-secondary mx-2" style="width:25%; font-size:13px;" id="name"><i class="fas fa-store"></i><br> Store Name</button>' +
      '<button class="btn btn-secondary mx-2" style="width:25%; font-size:13px;" id="add"><i class="fas fa-map-marker-alt"></i><br> Address</button>' +
      '<button class="btn btn-secondary mx-2" style="width:25%; font-size:13px;" id="fbook"><i class="fa-brands fa-facebook"></i><br> Facebook</button>' +
      '<button class="btn btn-secondary mx-2" style="width:25%; font-size:13px;" id="cn"><i class="fas fa-phone-square"></i><br> Contact No.</button>' +
      '</div>',
    didOpen: function() {
      $('#name').click(function() {
        editStore(sid);
      });
      $('#add').click(function() {
        editAddress(sid);
      });
      $('#fbook').click(function() {
        editFacebook(sid);
      });
      $('#cn').click(function() {
        editContact(sid);
      });
    }
  });
}
  </script>