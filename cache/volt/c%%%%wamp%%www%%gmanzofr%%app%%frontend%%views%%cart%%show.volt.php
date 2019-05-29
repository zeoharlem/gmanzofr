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

    

<div id="content" class="site-content" tabindex="-1">
	<div class="container">
		
<p>&nbsp;</p>
    <article class="page type-page status-publish hentry">
            <header class="entry-header"><h1 itemprop="name" class="entry-title">Cart</h1></header><!-- .entry-header -->
<?php if ($this->session->has('cart_item') && !empty($this->session->get('cart_item'))) { ?>
<form>

    <table class="shop_table shop_table_responsive cart">
        <thead>
            <tr>
                <th class="product-remove">&nbsp;</th>
                <th class="product-thumbnail">&nbsp;</th>
                <th class="product-name">Product</th>
                <th class="product-price">Price</th>
                <th class="product-quantity">Quantity</th>
                <th class="product-subtotal">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->session->get('cart_item') as $key => $values) { ?>
            <tr class="cart_item">

                <td class="product-remove">
                    <a class="remove removeBtn" href="#" id="<?= $values['id'] ?>">×</a>
                </td>

                <td class="product-thumbnail">
                    <a href="#"><img width="180" height="180" src="<?= $this->url->get('assets/uploads/' . $values['image']) ?>" alt=""></a>
                </td>

                <td data-title="Product" class="product-name">
                    <a href="#"><strong><?= ucwords($values['name']) ?></strong><br/><small><?= ucwords($values['category']) ?></small></a>
                </td>

                <td data-title="Price" class="product-price">
                    <span class="amount">&#8358;<?= $values['price'] ?></span>
                </td>

                <td data-title="Quantity" class="product-quantity">
                    <div class="quantity buttons_added">
                        <input type="button" class="minus" value="-">
                        <label>Quantity:</label>
                        <input type="number" size="4" class="input-text qty text" title="Qty" value="<?= $values['qty'] ?>" name="" max="29" min="0" step="1">
                        <input type="button" class="plus" value="+">
                    </div>
                </td>

                <td data-title="Total" class="product-subtotal">
                    <span class="amount">&#8358;<?= $values['qty'] * $values['price'] ?>.00</span>
                </td>
            </tr>
            <?php } ?>
            <tr>
                <td class="actions" colspan="6">

                    

                    <button type="button" class="button" id="updateBtn"><strong>Update Button</strong></button>

                    <div class="wc-proceed-to-checkout">

                        <a class="checkout-button button alt wc-forward" href="<?= $this->url->get('account/?target=checkout') ?>">Proceed to Checkout</a>
                    </div>

                </td>
            </tr>
        </tbody>
    </table>
</form>

<div class="cart-collaterals">

    <div class="cart_totals ">

        <h2>Cart Totals</h2>

        <table class="shop_table shop_table_responsive">

            <tbody>
                <tr class="cart-subtotal">
                    <th>Subtotal</th>
                    <td data-title="Subtotal"><span class="amount">&#8358;<?= $totalAmount ?></span></td>
                </tr>


                <tr class="shipping">
                    <th>Shipping</th>
                    <td data-title="Shipping">Flat Rate: <span class="amount">&#8358;300</span> <input type="hidden" class="shipping_method" value="international_delivery" id="shipping_method_0" data-index="0" name="shipping_method[0]">

                    </td>
                </tr>

                <tr class="order-total">
                    <th>Total</th>
                    <td data-title="Total"><strong><span class="amount">&#8358;<?= $totalAmount + 300 ?></span></strong> </td>
                </tr>
            </tbody>
        </table>

        <div class="wc-proceed-to-checkout">
            <a class="checkout-button button alt wc-forward" href="#">Proceed to Checkout</a>
        </div>
    </div>

<?php } else { ?>
    Empty Basket
<?php } ?>

</div>
</div>
</div>

</article>
		
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
