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

    

<?= $this->partial('partials/header_below') ?>

<div id="primary" class="content-area">
        <main id="main" class="site-main">
                
                <div class="home-v3-ads-block animate-in-view fadeIn animated" data-animation=" animated fadeIn">
                    <div class="ads-block row">
                            <div class="ad col-xs-12 col-sm-12">
                                    <div class="media">
                                            <div class="media-left media-middle">
                                                    <img src="<?= $this->url->get('assets/images/small_banner.jpg') ?>" width="90%" alt="">
                                            </div>
                                            <div class="media-body media-middle">
                                                    <div class="ad-text">
                                                            Catch Hottest <strong>Deals</strong> in all Available <strong>Products</strong> On Our Platform
                                                    </div>
                                                    <div class="ad-action">
                                                            <a href="#">Shop now</a>
                                                    </div>
                                            </div>
			</div>
		</div><!-- /.col -->

		
	</div><!-- /.row -->
</div>
<?php $counter = 0; ?>
<?php foreach ($category as $key => $value) { ?>
<section class="section-product-cards-carousel" >
					<header>
						<h2 class="h1"><strong><?= ucwords($key) ?></strong></h2>
						<div class="owl-nav">
							<a href="#products-carousel-prev" data-target="#recommended-product" class="slider-prev"><i class="fa fa-angle-left"></i></a>
							<a href="#products-carousel-next" data-target="#recommended-product" class="slider-next"><i class="fa fa-angle-right"></i></a>
						</div>
					</header>

					<div id="recommended-product">
						<div class="woocommerce columns-4">
							<div class="products owl-carousel products-carousel columns-4 owl-loaded owl-drag">

                                                        <?php foreach($value as $keyIndex => $valueIndex){  ?>
                                                            <div class="product">
                                                                    <div class="product-outer">
                                                                        <div class="product-inner">
                                                                            <span class="loop-product-categories"><a href="product-category.html" rel="tag"><?= ucwords($key) ?></strong></a></span>
                                                                            <a href="#">
                                                                                <h3><?= ucwords($valueIndex['title']) ?></h3>
                                                                                <div class="product-thumbnail">
                                                                                    <img src="assets/images/blank.gif" style="width:95%" data-echo="<?= $this->url->get('assets/uploads/' . $valueIndex['front_image']) ?>" class="img-responsive" alt="">
                                                                                </div>
                                                                            </a>

                                                                            <div class="price-add-to-cart">
                                                                                <span class="price">
                                                                                    <span class="electro-price">
                                                                                        <ins><span class="amount"> </span></ins>
                                                                                                            <span class="amount"> &#8358;<?= $valueIndex['sale_price'] ?></span>
                                                                                    </span>
                                                                                </span>
                                                                                <a rel="nofollow" href="#" class="button add_to_cart_button" data-cart-id="<?= $valueIndex['product_id'] ?>">Add to cart</a>
                                                                            </div><!-- /.price-add-to-cart -->

                                                                            <div class="hover-area">
                                                                                <div class="action-buttons">

                                                                                    <a href="#" rel="nofollow" class="add_to_wishlist"> Wishlist</a>

                                                                                    <a href="#" class="add-to-compare-link"> Compare</a>
                                                                                </div>
                                                                            </div>
                                                                        </div><!-- /.product-inner -->
                                                                    </div><!-- /.product-outer -->
                                                                </div><!-- /.products -->

                                                        <?php } ?>


            </div>
        </div>
    </div>
</section>
<?php $counter++; ?>
<?php } ?>
<input value="<?php echo $counter; ?>" type="hidden" id="hidcounter" />
				
				

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .container -->
</div><!-- #content -->





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
