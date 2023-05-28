<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.js"></script>
</head>
<body>
  <input type="file" class="form-control" placeholder="Image" id="image" required>
  <div>
    <img id="preview">
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/2.0.0-beta.2/cropper.min.js"></script>
  <script>
    var image = document.getElementById('image');
    var preview = document.getElementById('preview');
    var cropper;

    // Listen for changes in the file input
    image.addEventListener('change', function(e) {
      var file = e.target.files[0];
      var reader = new FileReader();

      reader.onload = function(event) {
        var imgDataUrl = event.target.result;
        preview.src = imgDataUrl;

        // Initialize Cropper.js
        cropper = new Cropper(preview, {
          aspectRatio: 1,
          viewMode: 1,
          resizable: true,
          // Other configuration options...
        });
      };

      reader.readAsDataURL(file);
    });
  </script>
</body>
</html>
