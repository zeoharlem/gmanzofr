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
    
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

  </head>

<body class="page home page-template-default">
  <div class="boxed_wrapper">
  
    <?= $this->partial('partials/header') ?>
<div id="content" class="site-content" tabindex="-1">
	<div class="container" style="padding-top:30px">

    

<article id="post-8" class="hentry">

    <div class="entry-content">
            <div class="woocommerce">
                    <div class="customer-login-form">
                            <span class="or-text">or</span>

                            <div class="col2-set" id="customer_login">

                                    <div class="col-1">


                                            <h2>Login</h2>

                                            <form method="post" class="login" action="<?= $this->url->get('login') ?>">

                                                    <p class="before-login-text">
                                                            Welcome back! Sign in to your account
                                                    </p>

                                                    <p class="form-row form-row-wide">
                                                            <label for="username">Username or email address
                                                            <span class="required">*</span></label>
                                                            <input type="text" class="input-text" name="username" id="username" />
                                                    </p>

                                                    <p class="form-row form-row-wide">
                                                            <label for="password">Password
                                                            <span class="required">*</span></label>
                                                            <input class="input-text" type="password" name="password" id="password" />
                                                    </p>


                                                    <p class="form-row">
                                                            <input class="button" type="submit" value="Login" name="login">
                                                            <!--<label for="rememberme" class="inline">
                                                                    <input name="rememberme" type="checkbox" id="rememberme" value="forever" /> Remember me
                                                            </label>-->
                                                    </p>

                                                    <!--<p class="lost_password">
                                                            <a href="login-and-register.html">Lost your password?</a>
                                                    </p>-->

                                            </form>


                                    </div><!-- .col-1 -->

                                    <div class="col-2">

                                            <h2>Register</h2>
                                            <?= $this->flash->output() ?>
                                            <form method="post" class="register" action="<?= $this->url->get('register') ?>">

                                                    <p class="before-register-text">
                                                            Create your very own account
                                                    </p>

                                                    <p class="form-row form-row-wide">
                                                            <label for="firstname">First Name
                                                            <span class="required">*</span></label>
                                                            <input type="text" class="input-text" name="firstname" id="firstname" />
                                                    </p>

                                                    <p class="form-row form-row-wide">
                                                            <label for="lastname">Last Name
                                                            <span class="required">*</span></label>
                                                            <input type="text" class="input-text" name="lastname" id="lastname" />
                                                    </p>

                                                    <p class="form-row form-row-wide">
                                                            <label for="phonenumber">Phone Number
                                                            <span class="required">*</span></label>
                                                            <input type="text" class="input-text" name="phonenumber" id="phonenumber" />
                                                    </p>

                                                    <p class="form-row form-row-wide">
                                                            <label for="address">Address
                                                            <span class="required">*</span></label>
                                                            <textarea class="input-text" name="address"></textarea>
                                                    </p>

                                                    <p class="form-row form-row-wide">
                                                            <label for="reg_email">Email address
                                                            <span class="required">*</span></label>
                                                            <input type="email" class="input-text" name="email" id="reg_email" value="" />
                                                    </p>


                                                    <p class="form-row form-row-wide">
                                                            <label for="user-password">Password
                                                            <span class="required">*</span></label>
                                                            <input type="password" autocomplete="off" class="input-text" name="password" id="user-password" />
                                                            <label for="checkBoxRow"><strong id="showHide">Show</strong></label>
                                                            <input type="checkbox" class="pull-right" style="margin-top:-30px; margin-right:-20px;" name="checkBoxRow" id="checkBoxRow" />
                                                    </p>
                                                    
                                                            <input type="hidden" name="<?= $this->security->getTokenKey() ?>" value="<?= $this->security->getToken() ?>">
                                                            <?php //echo \Multiple\Frontend\Recaptcha\Recaptcha::get('6LccIiQUAAAAAFsuiqaxMjzknreJ1ZScMI1tmUy3','',true); ?>
                                                            <div class="g-recaptcha form-row form-row-wide" data-sitekey="6Le910EUAAAAAIDw7edxMggQtjhdjdaGTSCbWVe6"></div>
                                                            <!--<div class="g-recaptcha form-row form-row-wide" data-sitekey="6Lev2EEUAAAAAPYTKnvBZXHVglceGx-IPHpyDRQT"></div>-->

                                                    
                                                    
                                                    <p class="form-row">
                                                            <input type="submit" class="button" name="register" value="Register" />
                                                    </p>

                                                    <div class="register-benefits">
                                                            <h3>Sign up today and you will be able to :</h3>
                                                            <ul>
                                                                    <li>Speed your way through checkout</li>
                                                                    <li>Track your orders easily</li>
                                                                    <li>Keep a record of all your purchases</li>
                                                            </ul>
                                                    </div>

                                            </form>

                                    </div><!-- .col-2 -->

                            </div><!-- .col2-set -->

                    </div><!-- /.customer-login-form -->
            </div><!-- .woocommerce -->
    </div><!-- .entry-content -->

</article><!-- #post-## -->
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
