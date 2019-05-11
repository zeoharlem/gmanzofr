<!DOCTYPE html>
<html lang="en">
  

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= $this->tag->gettitle() ?>
        
    <?= $this->assets->outputCss('headers') ?>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,700italic,800,800italic,600italic,400italic,300italic" rel="stylesheet" type="text/css">

    <link rel="shortcut icon" href="<?= $this->url->get('assets/images/fav-icon.png') ?>">
    


  </head>

<body class="page home page-template-default">
  <div class="boxed_wrapper">
  
    <?= $this->partial('partials/header') ?>
<div id="content" class="site-content" tabindex="-1">
	<div class="container" style="padding-top:30px">

    
<section>
<header>
    <h2 class="h1">Categories | <small><strong><?= $catTitle ?></strong></small></h2>
</header>
<div class="woocommerce">
    <ul class="products columns-4">
        <?php foreach ($pager->getPaginate()->items as $keys => $values) { ?>
        <li class="product">
            <div class="product-outer">
                <div class="product-inner">
                    <span class="loop-product-categories"><a href="#" rel="tag"><?= ucwords(Phalcon\Text::lower($catTitle)) ?></a></span>
                    <a href="#">
                        <h3><?= ucwords($values->title) ?></h3>
                        <div class="product-thumbnail">

                            <img data-echo="<?= $this->url->get('assets/uploads/' . $values->front_image) ?>" src="assets/images/blank.gif" alt="">

                        </div>
                    </a>

                    <div class="price-add-to-cart">
                        <span class="price">
                            <span class="electro-price">
                                <ins><span class="amount"><b>&#8358;<?= $values->sale_price ?></b></span></ins>

                            </span>
                        </span>
                        <a rel="nofollow" href="#"  class="button add_to_cart_button" data-cart-id="<?= $values->product_id ?>">Add to cart</a>
                    </div><!-- /.price-add-to-cart -->

                    <div class="hover-area">
                        <div class="action-buttons">

                            <a href="#" rel="nofollow" class="add_to_wishlist">
                                    Wishlist</a>

                            <a href="#" class="add-to-compare-link">Compare</a>
                        </div>
                    </div>
                </div><!-- /.product-inner -->
            </div><!-- /.product-outer -->
        </li>
        <?php } ?>
    </ul>
    <?= $this->partial('partials/pagination', ['page' => $pager->getPaginate(), 'limit' => $pager->getLimit()]) ?>

</div>
</section>
</div>
</div>



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
