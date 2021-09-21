<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js" integrity="sha512-dQIiHSl2hr3NWKKLycPndtpbh5iaHLo6MwrXm7F0FM5e+kL2U16oE9uIwPHUl6fQBeCthiEuV/rzP3MiAB8Vfw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
<script src="webcam.js"></script>
<div id="camera"></div>
<div id="snapShot"></div>
<script>
      Webcam.set({
        width:650,
        height:310,
        image_format: 'jpeg',
        jpeg_quality:  100 ,
        force_flash: true 
      });
      Webcam.attach('#camera');
      takeSnapShot = function() {
        Webcam.snap(function(data_uri) {
          document.getElementById('snapShot').innerHTML = 
          '<img src=" ' +data_uri+' " width="400" height="400">';
        })
      }
    </script>
<input type="button" value="" id="cameraBtn" onclick="takeSnapShot()">
</body>
</html>
