<!DOCTYPE html>
<html>
    <head>
        <title>Welcome!</title>
        <!--<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <script type="module" src="index.ts"></script>-->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    </head>
    
    <body  onload="initMap()" style="background-image: url(https://wallpapercave.com/wp/wp8391649.jpg); background-repeat: no-repeat; background-size: 150%;">
        <?php include 'header.html'; ?>
        <div class="container">
        
            
            <div class="row">
                <div class="container-fluid p-3" style="display: flex; justify-content: center; align-items: center;">
                    <div class="o-hidden border-0 shadow-lg col-lg-12 text-light" style="background-color: rgba(0, 0, 0, 0.3); color: white;">
                        
                        <div class="row">
                            <div class="col">
                            <form action="registerpro.php" method="post" class="p-3">
                            <row>
                                <div class="col">
                                    <h1 class="text-center">Register Store</h1>
                                </div>
                            <div class="row">
                              <div class="col">
                                <label>Store Name</label>
                                <input type="text" class="form-control" placeholder="First name" id="fname">
                                <p id="mfname" style="color: red;"></p>
                              </div>
                              <div class="col">
                                <label>Zone</label><br>
                                <select class="form-control" onchange="initMap()">
                                  <option>Zone 1</option>
                                  <option value="New York City">New York City</option>
                                  <option>Zone 3</option>
                                  <option>Zone 4</option>
                                  <option>Zone 5</option>
                                  <option>Zone 6</option>
                                </select>
                                <p id="mlname" style="color: red;"></p>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Facebook Page(Optional)</label>
                                    <input type="email" class="form-control" placeholder="email" id="email">
                                    <p id="memail" style="color: red;"></p>
                                  </div>
                            </div>
                            <div class="row">
                                
                                  <div class="col">
                                    <label>Contact No.(Optional)</label>
                                    <input type="text" class="form-control" placeholder="confirm password" id = "cpass">
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
                                    <p class="text-center">Already have an account? <a href="login.html">Login</a></p>
                                </div>
                            </div>
                          </form>
                            </div>
                            <div class="col-2" id="mapid" style="height: 500px; width: 500px">
                                <!--<devsite-iframe style="height: 400px" class="">
        
                                    <iframe src="https://geo-devrel-javascript-samples.web.app/samples/event-click-latlng/app/dist/" allow="fullscreen; "></iframe>
        
                                </devsite-iframe>-->

                               


                                <!--<iframe src="https://www.google.com/maps?q=10.391622,124.979102&hl=es;z=14&output=embed" width="100%" height="450" frameborder="0" style="border:0"></iframe>-->
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
<script src="assets/js/custom.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://kit.fontawesome.com/4f2d05d9c9.js" crossorigin="anonymous"></script>

<!--<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly"
      defer
    ></script>-->

    <!-- Import Leaflet CSS -->

<script>
  function initMap(){
      // Create a new map object and set its center and zoom level
      var map = L.map('mapid').setView([10.391975987546365, 124.97977538359588], 18);

      // Add a tile layer to the map
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
              '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
              'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
          maxZoom: 18
      }).addTo(map);
      var marker = null;
      // Add a click event to the map

      // Initialize a variable to store the coordinates for each option
var optionCoordinates = {
    'New York City': [40.7128, -74.0060],
    'Los Angeles': [34.0522, -118.2437],
    'Chicago': [41.8781, -87.6298],
    'Houston': [29.7604, -95.3698]
};

// Create a select tag and add it to the DOM
var select = L.DomUtil.create('select', 'form-control');
for (var option in optionCoordinates) {
    var value = optionCoordinates[option].toString();
    var optionTag = L.DomUtil.create('option', '', select);
    optionTag.text = option;
    optionTag.value = value;
}
L.DomEvent.on(select, 'change', function() {
    // Get the selected value from the select tag
    var value = select.value;
    var coordinates = value.split(',').map(parseFloat);
    
    // Set the new center for the map
    map.setView(coordinates, 12);
});

      map.on('click', function(event) {
          var lat = event.latlng.lat;
          var lng = event.latlng.lng;

          if (marker !== null) {
              map.removeLayer(marker);
          }

          console.log("Clicked on (" + lat + ", " + lng + ")");

          // Create a marker and add it to the map
          marker = L.marker([lat, lng]).addTo(map);

      });

  }
</script>