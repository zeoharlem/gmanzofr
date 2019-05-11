a:5:{i:0;s:554:"<!DOCTYPE html>
<html lang="en">
  

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= $this->tag->gettitle() ?>
        
    <?= $this->assets->outputCss('headers') ?>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,700italic,800,800italic,600italic,400italic,300italic" rel="stylesheet" type="text/css">

    <link rel="shortcut icon" href="<?= $this->url->get('assets/images/fav-icon.png') ?>">
    ";s:4:"head";N;i:1;s:246:"
  </head>

<body class="page home page-template-default">
  <div class="boxed_wrapper">
  
    <?= $this->partial('partials/header') ?>
<div id="content" class="site-content" tabindex="-1">
	<div class="container" style="padding-top:30px">

    ";s:7:"content";N;i:2;s:1979:"


    <?= $this->partial('partials/footer') ?>

    <!--End footer bottom area-->

</div><!-- #page -->
</div><!-- #page -->
<div id="overlayDiv"></div>
<?= $this->assets->outputJs('footers') ?>

<script>

$(document).ready(function(){
    var infoWindow;
    function initMap(){
        //alert('sdfsdf');
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                infoWindow.setPosition(pos);
                codeLatLongTask(pos.lat, pos.lng);

                //infoWindow.setContent('Location found.');
                //infoWindow.open(map);
                //map.setCenter(pos);
          }, function() {
                //handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
                // Browser doesn't support Geolocation
                //handleLocationError(false, infoWindow, map.getCenter());
        }
    }
});
    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        //infoWindow.open(map);
    }

    function codeLatLongTask(lat, lng){
        var geocoder    = new google.maps.Geocoder();
        var latlng      = new google.maps.LatLng(lat, lng);
        geocoder.geocode({'latLng': latlng}), function(results, status){
            console.log(results);
        });
    }

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4p1ODprRK9SaQdgY5QS3wEdNF4FxVc_g&callback=initMap"></script>
</body>

</html>
";}