(function($, window){
    "use strict"; 
    var arrowWidth = 16;

    $.fn.resizeselect = function(settings) {

        return this.each( function() {

            $(this).change( function(){

                var $this = $(this);

                // create test element
                var text = $this.find("option:selected").text();
                var $test = $("<span>").html(text);

                // add to body, get width, and get out
                $test.appendTo('body');
                var width = $test.width();
                $test.remove();

                // set select width
                $this.width(width + arrowWidth);

                // run on start
            }).change();

        });
    };

    $.fn.arrangeObjects = function(wrapWith, maxCols) {

        this.each(function() {
            if ($(this).parent(wrapWith).length) $(this).unwrap();
        });

        this.parent().each(function () {
            var $subnodes       = $(this).children();

            // true will cause counter increment
            // false will cause counter decrement
            var inc     = true;
            var cols    = [];

            for (var i = 0; i < maxCols; i++) {
                cols.push($('<ul></ul>'));
                cols[i].appendTo($(this));
            }

            function sortByHeight(a, b) {
                return $(a).height() > $(b).height() ? 0 : 1;
            }

            $subnodes = $subnodes.sort(sortByHeight);

            var i = 0;
            $subnodes.each(function () {
                // logic for left and right boundry
                if (i < 0 || i === maxCols) {
                    inc = !inc;
                    // this will cause node to be added once again to the same column
                    inc ? i++ : i--;
                }

                cols[i].append($(this));

                inc ? i++ : i--;
            });
        });
    };

    // run by default
    $( "select.resizeselect" ).resizeselect();

})(jQuery, window);

(function($) {
    'use strict';

    var stringVi    = '';
    var urlPath     = window.location;
    var fullpath    = urlPath.protocol+'//'+urlPath.hostname+urlPath.pathname;
    var frontend    = urlPath.pathname.substring(0, urlPath.pathname.indexOf(stringVi)+stringVi.length);
//    var frontend    = urlPath.pathname.substring(0, urlPath.pathname.indexOf('users')+5);
    var nBackend    = urlPath.protocol+'//'+urlPath.hostname+frontend;

    /*===================================================================================*/
    /*  WOW
    /*===================================================================================*/

    $.notifyDefaults({
        type: 'warning',
        allow_dismiss: false
    });

    $(document).ready(function () {
        new WOW().init();
    });

     /*===================================================================================*/
    /*  OWL CAROUSEL
    /*===================================================================================*/

    $(document).ready(function () {

        var dragging = true;
        var owlElementID = "#owl-main";

        function fadeInReset() {
            if (!dragging) {
                $(owlElementID + " .caption .fadeIn-1, " + owlElementID + " .caption .fadeIn-2, " + owlElementID + " .caption .fadeIn-3," + owlElementID + " .caption .fadeIn-4").stop().delay(800).animate({ opacity: 0 }, { duration: 400, easing: "easeInCubic" });
            }
            else {
                $(owlElementID + " .caption .fadeIn-1, " + owlElementID + " .caption .fadeIn-2, " + owlElementID + " .caption .fadeIn-3," + owlElementID + " .caption .fadeIn-4").css({ opacity: 0 });
            }
        }

        function fadeInDownReset() {
            if (!dragging) {
                $(owlElementID + " .caption .fadeInDown-1, " + owlElementID + " .caption .fadeInDown-2, " + owlElementID + " .caption .fadeInDown-3," + owlElementID + " .caption .fadeInDown-4").stop().delay(800).animate({ opacity: 0, top: "-15px" }, { duration: 400, easing: "easeInCubic" });
            }
            else {
                $(owlElementID + " .caption .fadeInDown-1, " + owlElementID + " .caption .fadeInDown-2, " + owlElementID + " .caption .fadeInDown-3," +  owlElementID + " .caption .fadeInDown-4").css({ opacity: 0, top: "-15px" });
            }
        }

        function fadeInUpReset() {
            if (!dragging) {
                $(owlElementID + " .caption .fadeInUp-1, " + owlElementID + " .caption .fadeInUp-2, " + owlElementID + " .caption .fadeInUp-3," + owlElementID + " .caption .fadeInUp-4").stop().delay(800).animate({ opacity: 0, top: "15px" }, { duration: 400, easing: "easeInCubic" });
            }
            else {
                $(owlElementID + " .caption .fadeInUp-1, " + owlElementID + " .caption .fadeInUp-2, " + owlElementID + " .caption .fadeInUp-3," + owlElementID + " .caption .fadeInUp-4").css({ opacity: 0, top: "15px" });
            }
        }

        function fadeInLeftReset() {
            if (!dragging) {
                $(owlElementID + " .caption .fadeInLeft-1, " + owlElementID + " .caption .fadeInLeft-2, " + owlElementID + " .caption .fadeInLeft-3, " + owlElementID + " .caption .fadeInLeft-4").stop().delay(800).animate({ opacity: 0, left: "15px" }, { duration: 400, easing: "easeInCubic" });
            }
            else {
                $(owlElementID + " .caption .fadeInLeft-1, " + owlElementID + " .caption .fadeInLeft-2, " + owlElementID + " .caption .fadeInLeft-3," + owlElementID + " .caption .fadeInLeft-4").css({ opacity: 0, left: "15px" });
            }
        }

        function fadeInRightReset() {
            if (!dragging) {
                $(owlElementID + " .caption .fadeInRight-1, " + owlElementID + " .caption .fadeInRight-2, " + owlElementID + " .caption .fadeInRight-3," + owlElementID + " .caption .fadeInRight-4").stop().delay(800).animate({ opacity: 0, left: "-15px" }, { duration: 400, easing: "easeInCubic" });
            }
            else {
                $(owlElementID + " .caption .fadeInRight-1, " + owlElementID + " .caption .fadeInRight-2, " + owlElementID + " .caption .fadeInRight-3," + owlElementID + " .caption .fadeInRight-4").css({ opacity: 0, left: "-15px" });
            }
        }

        function fadeIn() {
            $(owlElementID + " .active .caption .fadeIn-1").stop().delay(500).animate({ opacity: 1 }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeIn-2").stop().delay(700).animate({ opacity: 1 }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeIn-3").stop().delay(1000).animate({ opacity: 1 }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeIn-4").stop().delay(1000).animate({ opacity: 1 }, { duration: 800, easing: "easeOutCubic" });
        }

        function fadeInDown() {
            $(owlElementID + " .active .caption .fadeInDown-1").stop().delay(500).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInDown-2").stop().delay(700).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInDown-3").stop().delay(1000).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInDown-4").stop().delay(1000).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
        }

        function fadeInUp() {
            $(owlElementID + " .active .caption .fadeInUp-1").stop().delay(500).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInUp-2").stop().delay(700).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInUp-3").stop().delay(1000).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInUp-4").stop().delay(1000).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
        }

        function fadeInLeft() {
            $(owlElementID + " .active .caption .fadeInLeft-1").stop().delay(500).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInLeft-2").stop().delay(700).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInLeft-3").stop().delay(1000).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInLeft-4").stop().delay(1000).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
        }

        function fadeInRight() {
            $(owlElementID + " .active .caption .fadeInRight-1").stop().delay(500).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInRight-2").stop().delay(700).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInRight-3").stop().delay(1000).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInRight-4").stop().delay(1000).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
        }

        $(owlElementID).owlCarousel({

            animateOut: 'fadeOut',
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: false,
            stopOnHover: true,
            loop: true,
            navRewind: true,
            items: 1,
            dots: true,
            nav:false,
            //navText: ["<i class='icon fa fa-angle-left'></i>", "<i class='icon fa fa-angle-right'></i>"],
            lazyLoad: true,
            stagePadding: 0,
            responsive : {
                0 : {
                    items : 1,
                },
                480: {
                    items : 1,
                },
                768 : {
                    items : 1,
                },
                992 : {
                    items : 1,
                },
                1199 : {
                    items : 1,
                },
                onTranslate : function(){
                      echo.render();
                    }
            },


            onInitialize   : function() {
                fadeIn();
                fadeInDown();
                fadeInUp();
                fadeInLeft();
                fadeInRight();
            },

            onInitialized   : function() {
                fadeIn();
                fadeInDown();
                fadeInUp();
                fadeInLeft();
                fadeInRight();
            },

            onResize   : function() {
                fadeIn();
                fadeInDown();
                fadeInUp();
                fadeInLeft();
                fadeInRight();
            },

            onResized   : function() {
                fadeIn();
                fadeInDown();
                fadeInUp();
                fadeInLeft();
                fadeInRight();
            },

            onRefresh   : function() {
                fadeIn();
                fadeInDown();
                fadeInUp();
                fadeInLeft();
                fadeInRight();
            },

            onRefreshed   : function() {
                fadeIn();
                fadeInDown();
                fadeInUp();
                fadeInLeft();
                fadeInRight();
            },

            onUpdate   : function() {
                fadeIn();
                fadeInDown();
                fadeInUp();
                fadeInLeft();
                fadeInRight();
            },

            onUpdated   : function() {
                fadeIn();
                fadeInDown();
                fadeInUp();
                fadeInLeft();
                fadeInRight();
            },

            onDrag : function() {
                dragging = true;
            },

            onTranslate   : function() {
                fadeIn();
                fadeInDown();
                fadeInUp();
                fadeInLeft();
                fadeInRight();
            },
            onTranslated   : function() {
                fadeIn();
                fadeInDown();
                fadeInUp();
                fadeInLeft();
                fadeInRight();
            },

            onTo   : function() {
                fadeIn();
                fadeInDown();
                fadeInUp();
                fadeInLeft();
                fadeInRight();
            },

            onChanged  : function() {
                fadeInReset();
                fadeInDownReset();
                fadeInUpReset();
                fadeInLeftReset();
                fadeInRightReset();
                dragging = false;
            }
        });

        var $owl_recently_added_products_carousel = $( '#recently-added-products-carousel .owl-carousel');
        $owl_recently_added_products_carousel.on( 'initialized.owl.carousel translated.owl.carousel', function() {
            var $this = $(this);
            $this.find( '.owl-item.last-active' ).each( function() {
                $(this).removeClass( 'last-active' );
            });
            $(this).find( '.owl-item.active' ).last().addClass( 'last-active' );
        });
        $owl_recently_added_products_carousel.owlCarousel({
            "items":"6",
            "nav":true,
            "slideSpeed":300,
            "dots":true,
            "rtl":false,
            "paginationSpeed":400,
            "navText":["",""],
            "margin":0,
            "touchDrag":true,
            responsive : {
                0 : {
                    items : 1,
                },
                480: {
                    items : 2,
                },
                768 : {
                    items : 2,
                },
                992 : {
                    items : 3,
                },
                1200 : {
                    items : 6,
                },
                onTranslate : function(){
                  echo.render();
                }
            },

        });

        var $owl_recommended_product = $( '#recommended-product .owl-carousel');
        $owl_recommended_product.on( 'initialized.owl.carousel translated.owl.carousel', function() {
            var $this = $(this);
            $this.find( '.owl-item.last-active' ).each( function() {
                $(this).removeClass( 'last-active' );
            });
            $(this).find( '.owl-item.active' ).last().addClass( 'last-active' );
        });
        $owl_recommended_product.owlCarousel({
            "items":5,
            "nav":false,
            "slideSpeed":300,
            "dots":true,
            "rtl":false,
            "paginationSpeed":400,
            "navText":["",""],
            "margin":0,
            "touchDrag":false,
            "responsive":{
                "0":{
                    "items":1
                },
                "480":{
                    "items":3
                },
                "768":{
                    "items":2
                },
                "992":{
                    "items":3
                },
                "1200":{
                    "items":5
                }
            },

        });

        var $owl_home_v3_carousel_tabs = $( '.home-v3-owl-carousel-tabs .owl-carousel')
        $owl_home_v3_carousel_tabs.on( 'initialized.owl.carousel translated.owl.carousel', function() {
            var $this = $(this);
            $this.find( '.owl-item.last-active' ).each( function() {
                $(this).removeClass( 'last-active' );
            });
            $(this).find( '.owl-item.active' ).last().addClass( 'last-active' );
        });
        $owl_home_v3_carousel_tabs.owlCarousel({
            "items":4,
            "nav":false,
            "slideSpeed":300,
            "dots":true,
            "rtl":false,
            "paginationSpeed":400,
            "navText":["",""],
            "margin":0,
            "touchDrag":true,
            "responsive":{
                "0":{
                    "items":1
                },
                "480":{
                    "items":1
                },
                "768":{
                    "items":2
                },
                "992":{
                    "items":3
                },
                "1200":{
                    "items":4
                }
            },
        });

        var $owl_home_v2_carousel_tabs = $( '.home-v2-owl-carousel-tabs .owl-carousel')
        $owl_home_v2_carousel_tabs.on( 'initialized.owl.carousel translated.owl.carousel', function() {
            var $this = $(this);
            $this.find( '.owl-item.last-active' ).each( function() {
                $(this).removeClass( 'last-active' );
            });
            $(this).find( '.owl-item.active' ).last().addClass( 'last-active' );
        });
        $owl_home_v2_carousel_tabs.owlCarousel({
            "items":3,
            "nav":false,
            "slideSpeed":300,
            "dots":true,
            "rtl":false,
            "paginationSpeed":400,
            "navText":["",""],
            "margin":0,
            "touchDrag":true,
            "responsive":{
                "0":{
                    "items":1
                },
                "480":{
                    "items":1
                },
                "768":{
                    "items":2
                },
                "992":{
                    "items":3
                },
                "1200":{
                    "items":3
                }
            },
        });

        var $owl_product_carousel_with_image = $( '#products-carousel-with-umage .owl-carousel')
        $owl_product_carousel_with_image.on( 'initialized.owl.carousel translated.owl.carousel', function() {
            var $this = $(this);
            $this.find( '.owl-item.last-active' ).each( function() {
                $(this).removeClass( 'last-active' );
            });
            $(this).find( '.owl-item.active' ).last().addClass( 'last-active' );
        });
        $owl_product_carousel_with_image.owlCarousel({
            "items":2,
            "nav":false,
            "slideSpeed":300,
            "dots":true,
            "rtl":false,
            "paginationSpeed":400,
            "navText":["",""],
            "margin":30,
            "touchDrag":true,
            "responsive":{
                "0":{
                    "items":1
                },
                "480":{
                    "items":1
                },
                "768":{
                    "items":1
                },
                "992":{
                    "items":2
                },
                "1200":{
                    "items":2
                }
            },
        });

        var $owl_homev3_products_cards_carousel = $( '#homev3-products-cards-carousel .owl-carousel')
        $owl_homev3_products_cards_carousel.on( 'initialized.owl.carousel translated.owl.carousel', function() {
            var $this = $(this);
            $this.find( '.owl-item.last-active' ).each( function() {
                $(this).removeClass( 'last-active' );
            });
            $(this).find( '.owl-item.active' ).last().addClass( 'last-active' );
        });
        $owl_homev3_products_cards_carousel.owlCarousel({
            "items":1,
            "nav":false,
            "slideSpeed":300,
            "dots":true,
            "rtl":false,
            "paginationSpeed":400,
            "navText":["",""],
            "margin":0,
            "touchDrag":true
        });

        var $owl_product_category_carousel = $( '#product-category-carousel .owl-carousel');
        $owl_product_category_carousel.on( 'initialized.owl.carousel translated.owl.carousel', function() {
            var $this = $(this);
            $this.find( '.owl-item.last-active' ).each( function() {
                $(this).removeClass( 'last-active' );
            });
            $(this).find( '.owl-item.active' ).last().addClass( 'last-active' );
        });
        $owl_product_category_carousel.owlCarousel({
            "items":6,
            "nav":false,
            "slideSpeed":300,
            "dots":true,
            "rtl":false,
            "paginationSpeed":400,
            "navText":["",""],
            "margin":0,
            "touchDrag":true,
            "responsive":{
                "0":{
                    "items":1
                },
                "480":{
                    "items":1
                },
                "768":{
                    "items":2
                },
                "992":{
                    "items":3
                },
                "1200":{
                    "items":6
                }
            },

        });

        $('.home-carousel-tabs').owlCarousel({
            "items":4,
            "nav":false,
            "slideSpeed":300,
            "dots":true,
            "rtl":false,
            "paginationSpeed":400,
            "navText":["",""],
            "margin":0,
            "touchDrag":true

        });


        $('#owl-brands').owlCarousel({
            "items":5,
            "navRewind":true,
            "autoplayHoverPause":true,
            "nav":true,"stagePadding":1,
            "dots":false,
            "rtl":false,
            "navText":["<i class=\"fa fa-chevron-left\"><\/i>",
            "<i class=\"fa fa-chevron-right\"><\/i>"],
            "touchDrag":false,
            "responsive":{
                "0":{
                    "items":1
                },
                "480":{
                    "items":1
                },
                "768":{
                    "items":2
                },
                "992":{
                    "items":3
                },
                "1200":{
                    "items":5
                }
            },
         });

        $('.home-v2-categories-products').owlCarousel({
            "items":4,
            "nav":false,
            "slideSpeed":300,
            "dots":true,
            "rtl":false,
            "paginationSpeed":400,
            "navText":["",""],
            "margin":0,
            "touchDrag":true,
            "responsive":{
                "0":{
                    "items":1
                },
                "480":{
                    "items":1
                },
                "768":{
                    "items":2
                },
                "992":{
                    "items":3
                },
                "1200":{
                    "items":4
                }
            },
        });

        $('.recently-added-products').owlCarousel({
            "items":1,
            "nav":false,
            "slideSpeed":300,
            "dots":true,
            "rtl":false,
            "paginationSpeed":400,
            "navText":["",""],
            "margin":0,
            "touchDrag":true,
            "responsive":{
                "0":{
                    "items":1
                },
                "480":{
                    "items":1
                },
                "768":{
                    "items":2
                },
                "992":{
                    "items":3
                },
                "1200":{
                    "items":1
                }
            },
        });

        $('#owl-carousel-media').owlCarousel({
            items : 1,
            nav : false,
            slideSpeed : 300,
            dots: true,
            paginationSpeed : 400,
            navText: ["", ""],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });


        $('.products-carousel-widget').owlCarousel({
            items : 1,
            nav : true,
            slideSpeed : 300,
            dots: false,
            paginationSpeed : 400,
            navText: ["", ""],
            autoHeight: false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });

        $('.blog-carousel-widget').owlCarousel({
            items : 1,
            nav : true,
            slideSpeed : 300,
            dots: false,
            paginationSpeed : 400,
            navText: ["", ""],
            autoHeight: false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });


        $('.home-v1-product-cards-carousel').owlCarousel({
            "items":1,
            "nav":false,
            "slideSpeed":300,
            "dots":true,
            "rtl":false,
            "paginationSpeed":400,
            "navText":["",""],
            "margin":0,
            "touchDrag":true
        });

        $('.onsale-product-carousel').owlCarousel({
            "items":1,
            "nav":false,
            "slideSpeed":300,
            "dots":true,
            "rtl":false,
            "paginationSpeed":400,
            "navText":["",""],
            "margin":0,
            "touchDrag":true
        });
    });

    /*===================================================================================*/
    /*  Accessories Product Check
    /*===================================================================================*/

    jQuery(document).ready(function($) {

        function accessory_checked_count(){
            var product_count = 0;
            $('.accessory-checkbox .product-check').each(function() {
                if( $(this).is(':checked') ) {
                    product_count++;
                }
            });
            return product_count;
        }

        function accessory_checked_total_price(){
            var total_price = 0;
            $('.accessory-checkbox .product-check').each(function() {
                if( $(this).is(':checked') ) {
                    total_price += parseFloat( $(this).data( 'price' ) );
                }
            });
            return total_price;
        }

        function accessory_checked_product_ids(){
            var product_ids = [];
            $('.accessory-checkbox .product-check').each(function() {
                if( $(this).is(':checked') ) {
                    product_ids.push( $(this).data( 'product-id' ) );
                }
            });
            return product_ids;
        }

        function accessory_unchecked_product_ids(){
            var product_ids = [];
            $('.accessory-checkbox .product-check').each(function() {
                if( ! $(this).is(':checked') ) {
                    product_ids.push( $(this).data( 'product-id' ) );
                }
            });
            return product_ids;
        }

        function accessory_checked_variable_product_ids(){
            var variable_product_ids = [];
            $('.accessory-checkbox .product-check').each(function() {
                if( $(this).is(':checked') && $(this).data( 'product-type' ) == 'variable' ) {
                    variable_product_ids.push( $(this).data( 'product-id' ) );
                }
            });
            return variable_product_ids;
        }

        function accessory_is_variation_selected(){
            if( $(".single_add_to_cart_button").is(":disabled") ) {
                return false;
            }
            return true;
        }

        function accessory_refresh_fragments( response ){
            var this_page = window.location.toString();
            var fragments = response.fragments;
            var cart_hash = response.cart_hash;

            // Block fragments class
            if ( fragments ) {
                $.each( fragments, function( key ) {
                    $( key ).addClass( 'updating' );
                });
            }

            // Replace fragments
            if ( fragments ) {
                $.each( fragments, function( key, value ) {
                    $( key ).replaceWith( value );
                });
            }

            // Cart page elements
            $( '.shop_table.cart' ).load( this_page + ' .shop_table.cart:eq(0) > *', function() {

                $( '.shop_table.cart' ).stop( true ).css( 'opacity', '1' ).unblock();

                $( document.body ).trigger( 'cart_page_refreshed' );
            });

            $( '.cart_totals' ).load( this_page + ' .cart_totals:eq(0) > *', function() {
                $( '.cart_totals' ).stop( true ).css( 'opacity', '1' ).unblock();
            });
        }

        $( '.accessory-checkbox .product-check' ).on( "click", function() {
            $.ajax({
                cache:false,
                url: "http://demo2.transvelo.in/electro/wp-admin/admin-ajax.php",
                success:function(result){
                    var previous_price = $( 'span.total-price-html .amount' ).text().replace( /\.|\,/g, '' );
                    var current_price = accessory_checked_total_price().toFixed(2).replace(/./g, function(c, i, a) {
                        return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
                    });
                    total_price = previous_price.replace( /\d+/g, current_price );
                    $( 'span.total-price-html .amount' ).html( total_price );
                    $( 'span.total-products' ).html( accessory_checked_count() );

                    var unchecked_product_ids = accessory_unchecked_product_ids();
                    $( '.accessories ul.products > li' ).each(function() {
                        $(this).show();
                        for (var i = 0; i < unchecked_product_ids.length; i++ ) {
                            if( $(this).hasClass( 'post-'+unchecked_product_ids[i] ) ) {
                                $(this).hide();
                            }
                        }
                    });
                }
            })
        });

        $('.accessories-add-all-to-cart .add-all-to-cart').on( "click", function() {
            var accerories_all_product_ids = accessory_checked_product_ids();
            var accerories_variable_product_ids = accessory_checked_variable_product_ids();
            if( accerories_all_product_ids.length === 0 ) {
                var accerories_alert_msg = '<div class="woocommerce-error">No Products selected.</div>';
            } else if( accerories_variable_product_ids.length > 0 && accessory_is_variation_selected() === false ) {
                var accerories_alert_msg = '<div class="woocommerce-error">Product Variation does not selected.</div>';
            } else {
                for (var i = 0; i < accerories_all_product_ids.length; i++ ) {
                    if( ! $.inArray( accerories_all_product_ids[i], accerories_variable_product_ids ) ) {
                        var variation_id  = $('.variations_form .variations_button').find('input[name^=variation_id]').val();
                        var variation = {};
                        if( $( '.variations_form' ).find('select[name^=attribute]').length ) {
                            $( '.variations_form' ).find('select[name^=attribute]').each(function() {
                                var attribute = $(this).attr("name");
                                var attributevalue = $(this).val();
                                variation[attribute] = attributevalue;
                            });

                        } else {

                            $( '.variations_form' ).find('.select').each(function() {
                                var attribute = $(this).attr("data-attribute-name");
                                var attributevalue = $(this).find('.selected').attr('data-name');
                                variation[attribute] = attributevalue;
                            });

                        }
                        $.ajax({
                            type: "POST",
                            async: false,
                            url: "http://demo2.transvelo.in/electro/wp-admin/admin-ajax.php",
                            data: { 'action': "electro_variable_add_to_cart", 'product_id': accerories_all_product_ids[i], 'variation_id': variation_id, 'variation': variation  },
                            success : function( response ) {
                                accessory_refresh_fragments( response );
                            }
                        })
                    } else {
                        $.ajax({
                            type: "POST",
                            async: false,
                            url: "http://demo2.transvelo.in/electro/wp-admin/admin-ajax.php",
                            data: { 'action': "woocommerce_add_to_cart", 'product_id': accerories_all_product_ids[i]  },
                            success : function( response ) {
                                accessory_refresh_fragments( response );
                            }
                        })
                    }
                }
                var accerories_alert_msg = '<div class="woocommerce-message">Products was successfully added to your cart. <a class="button wc-forward" href="http://demo2.transvelo.in/electro/cart/">View Cart</a></div>';
            }
            $( '.electro-wc-message' ).html(accerories_alert_msg);
        });

    });


    /*===================================================================================*/
    /*  Set Height of Products li
    /*===================================================================================*/

    // these are (ruh-roh) globals. You could wrap in an
    // immediately-Invoked Function Expression (IIFE) if you wanted to...
    var currentTallest = 0,
        currentRowStart = 0,
        rowDivs = new Array();

    function setConformingHeight(el, newHeight) {
        // set the height to something new, but remember the original height in case things change
        el.data("originalHeight", (el.data("originalHeight") == undefined) ? (el.height()) : (el.data("originalHeight")));
        el.height(newHeight);
    }

    function getOriginalHeight(el) {
        // if the height has changed, send the originalHeight
        return (el.data("originalHeight") == undefined) ? (el.height()) : (el.data("originalHeight"));
    }

    function columnConform() {

        $( '.product-outer' ).each( function() {
            var $this = $(this);
            if ( 0 != $this.height() ){
                $this.height( $this.height() );
            }
        });

    }

    $( window ).on( 'resize', function() {
        columnConform();
    });

    $( '.ec-tabs > li > a' ).on( 'click', function() {
        if ( location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname ) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');

            if ( target.length ) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                //return false;
            }
        }
    });

    $('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {

        if ( e.target == '#grid' || e.target == '#grid-extended' ) {
            columnConform();
        }
    });

    /*===================================================================================*/
    /*  YITH Wishlist
    /*===================================================================================*/

    $(document).ready( function() {

        $( '.add_to_wishlist' ).on( 'click', function() {
            $( this ).closest( '.images-and-summary' ).block();
            $( this ).closest( '.product-inner' ).block();
            $( this ).closest( '.product-list-view-inner' ).block();
            $( this ).closest( '.product-item-inner' ).block();
        });

        $( '.yith-wcwl-wishlistaddedbrowse > .feedback' ).on( 'click', function() {
            var browseWishlistURL = $( this ).next().attr( 'href' );
            window.location.href = browseWishlistURL;
        });


    });

    $( document ).on( 'added_to_wishlist', function() {
        $( '.images-and-summary' ).unblock();
        $( '.product-inner' ).unblock();
        $( '.product-list-view-inner' ).unblock();
        $( '.product-item-inner' ).unblock();
    });

     /*===================================================================================*/
     /*  LAZY LOAD IMAGES USING ECHO
     /*===================================================================================*/

    echo.init({
        offset: 100,
        throttle: 250,
        unload: false
    });

    /*===================================================================================*/
    /*  WooCompare
    /*===================================================================================*/


    $( document ).on( 'click', '.add-to-compare-link:not(.added)', function(e) {

        e.preventDefault();

        var button = $(this),
            data = {
                _yitnonce_ajax: yith_woocompare.nonceadd,
                action: yith_woocompare.actionadd,
                id: button.data('product_id'),
                context: 'frontend'
            },
            widget_list = $('.yith-woocompare-widget ul.products-list');

        // add ajax loader
        if( typeof woocommerce_params != 'undefined' ) {
            button.closest( '.images-and-summary' ).block();
            button.closest( '.product-inner' ).block();
            button.closest( '.product-list-view-inner' ).block();
            button.closest( '.product-item-inner' ).block();
            widget_list.block();
        }

       $.ajax({
            type: 'post',
            url: yith_woocompare.ajaxurl.toString().replace( '%%endpoint%%', yith_woocompare.actionadd ),
            data: data,
            dataType: 'json',
            success: function(response){

                if( typeof woocommerce_params != 'undefined' ) {
                    $( '.images-and-summary' ).unblock();
                    $( '.product-inner' ).unblock();
                    $( '.product-list-view-inner' ).unblock();
                    $( '.product-item-inner' ).unblock();
                    widget_list.unblock()
                }

                button.addClass('added')
                        .attr( 'href', mc_options.compare_page_url )
                        .text( yith_woocompare.added_label );

                // add the product in the widget
                widget_list.html( response.widget_table );
            }
        });
    });

    /*===================================================================================*/
    /*  Add to Cart animation
    /*===================================================================================*/


    $( 'body' ).on( 'adding_to_cart', function( e, $btn, data){
        $btn.closest( 'li.product' ).block();
    });

    $( 'body' ).on( 'added_to_cart', function(){
        $( 'li.product' ).unblock();
        return false;
    });


    $( document ).ready( function() {

        var is_rtl = false;

        var hash_value = window.location.hash;

        switch( hash_value ) {
            case '#grid-extended':
            case '#list-view':
            case '#list-view-small':
            case '#grid':
                $( '.shop-view-switcher a[href="' + hash_value +'"]' ).tab( 'show' );
            break;
            case '#tab-accessories':
            case '#tab-description':
            case '#tab-specification':
            case '#tab-reviews':
                $( '.wc-tabs a[href="' + hash_value + '"]' ).trigger( 'click' );
            break;
        }

        // Adjust Product Item heights
        columnConform();

        // Set Home Page Sidebar margin-top
        var departments_menu_height = $( '.page-template-template-homepage-v2 .departments-menu > li > ul.dropdown-menu' ).height(),
            home_fullwidth_slider_height = $( '.page-template-template-homepage-v2 .home-v2-slider' ).height(),
            sidebar_margin_top = 0;

        if ( departments_menu_height > home_fullwidth_slider_height ) {
            sidebar_margin_top = departments_menu_height + 24;
        } else {
            sidebar_margin_top = home_fullwidth_slider_height;
        }

        sidebar_margin_top = sidebar_margin_top + 35;
        $( '.page-template-template-homepage-v2 #sidebar').css( 'margin-top', sidebar_margin_top );

        // Detect wrapping of price
        $( '.price-add-to-cart > .price' ).each( function() {
            var $this = $( this );
            if ( $this[0].scrollWidth >  $this.innerWidth() ) {
                //Text has over-flowed
                $this.find( '.electro-price' ).css( 'position', 'relative' );
                if( is_rtl ){
                    $this.find( 'del' ).attr( 'style', 'position:absolute;right:0;top:-14px;');
                }else {
                    $this.find( 'del' ).attr( 'style', 'position:absolute;left:0;top:-14px;');
                }
            }
        });

        // Vertical Menu dropdown min-height
        var $vertical_menu = $( '.vertical-menu' ),
            vertical_menu_height = $vertical_menu.height(),
            vm_header_height = 52.25,
            dd_menu_min_height = vertical_menu_height - vm_header_height;

        $vertical_menu.find( '.dropdown > .dropdown-menu' ).each( function() {
            $(this).css( 'min-height', dd_menu_min_height );
            $(this).find( '.menu-item-object-static_block' ).css( 'min-height', dd_menu_min_height );
        });

        var $list_group_dd = $( '.vertical-menu > .list-group-item > .dropdown-menu' ),
            list_group_dd_style = $list_group_dd.attr( 'style' ),
            list_group_dd_height = 0;

        $list_group_dd.css({
            visibility: 'hidden',
            display:    'none'
        });

        list_group_dd_height = $list_group_dd.height() + 15;

        $list_group_dd.attr( 'style', list_group_dd_style ? list_group_dd_style : '' );

        $list_group_dd.find( '.dropdown-menu' ).each( function() {
            $(this).css( 'min-height', list_group_dd_height );
            $(this).find( '.menu-item-object-static_block' ).css( 'min-height', list_group_dd_height );
        });

        // Departments menu Height
        var $departments_menu_dropdown = $( '.departments-menu-dropdown' ),
            departments_menu_dropdown_height = $departments_menu_dropdown.height();

        $departments_menu_dropdown.find( '.dropdown > .dropdown-menu' ).each( function() {
            $(this).find( '.menu-item-object-static_block' ).css( 'min-height', departments_menu_dropdown_height + 24 );
            $(this).css( 'min-height', departments_menu_dropdown_height + 28 );
        });

        $( '.vertical-menu, .departments-menu-dropdown' ).on( 'mouseleave', function() {
            var $this = $(this);
            $this.removeClass( 'animated-dropdown' );
        });

        $( '.vertical-menu .menu-item-has-children, .departments-menu-dropdown .menu-item-has-children' ).on({
            mouseenter: function() {
                var $this = $(this),
                    $dropdown_menu = $this.find( '.dropdown-menu' ),
                    $vertical_menu = $this.parents( '.vertical-menu' ),
                    $departments_menu = $this.parents( '.departments-menu-dropdown' ),
                    css_properties = {
                        width:      540,
                        opacity:    1
                    },
                    animation_duration = 300,
                    has_changed_width = true,
                    animated_class = '',
                    $container = '';

                if ( $vertical_menu.length > 0 ) {
                    $container = $vertical_menu;
                } else if ( $departments_menu.length > 0 ) {
                    $container = $departments_menu;
                }

                if ( $this.hasClass( 'yamm-tfw' ) ) {
                    css_properties.width = 540;

                    if ( $departments_menu.length > 0 ) {
                        css_properties.width = 600;
                    }
                } else if ( $this.hasClass( 'yamm-fw' ) ) {
                    css_properties.width = 900;
                } else if ( $this.hasClass( 'yamm-hw' ) ) {
                    css_properties.width = 450;
                } else {
                    css_properties.width = 277;
                }

                $dropdown_menu.css( {
                    visibility: 'visible',
                    display:    'block'
                } );

                if ( ! $container.hasClass( 'animated-dropdown' ) ) {
                    $dropdown_menu.animate( css_properties, animation_duration, function() {
                        $container.addClass( 'animated-dropdown' );
                    });
                } else {
                    $dropdown_menu.css( css_properties );
                }
            }, mouseleave: function() {
                $(this).find( '.dropdown-menu' ).css({
                    visibility: 'hidden',
                    opacity:    0,
                    width:      0,
                    display:    'none'
                });
            }
        });

        // Owl Carousel
        $( '.slider-next' ).on( "click", function() {
            var owl = $( $( this ).data( 'target' ) + ' .owl-carousel' );
            owl.trigger( 'next.owl.carousel' );
            return false;
        });

        $( '.slider-prev' ).on( "click", function() {
            var owl = $( $( this ).data( 'target' ) + ' .owl-carousel' );
            owl.trigger( 'prev.owl.carousel' );
            return false;
        });

        // Animate on scroll into view
        $( '.animate-in-view' ).each( function() {
            var $this = $(this), animation = $this.data( 'animation' );
            if( typeof $this !== 'undefined' ) {
                $this.waypoint( function(e) {
                    $(this).addClass( animation + ' animated' );
                }, {
                    triggerOnce: true,
                    offset: '90%'
                });
            }
        });



        /*===================================================================================*/
        /*  Electro Product Gallery Carousel
        /*===================================================================================*/

        $( '.single-product .electro-gallery' ).each( function() {
            var $sync1 = $(this).children('.thumbnails-single');
            var $sync2 = $(this).children('.thumbnails-all');
            var flag = false;
            var duration = 300;

            $sync1.owlCarousel( {
                items: 1,
                margin: 0,
                dots: false,
                nav: false,
                rtl: is_rtl,
                responsive:{
                    0:{
                        items:1
                    },
                    480:{
                        items:1
                    },
                    768:{
                        items:1
                    },
                }
            });

            $sync1.on('changed.owl.carousel', function (e) {
                if (!flag) {
                    flag = true;
                    $sync2.trigger('to.owl.carousel', [e.item.index, duration, true]);
                    flag = false;
                }
                $sync2.find(".owl-item").removeClass("synced").eq(e.item.index).addClass("synced");
            });

            $sync2.on('initialized.owl.carousel',function (e) {
                $sync2.find(".owl-item").eq(0).addClass("synced");
            });

            var thumbnail_column_class = $sync2.attr( 'class' );
            var cols = parseInt( thumbnail_column_class.replace( 'thumbnails-all columns-', '' ) );

            $sync2.owlCarousel( {
                items: cols,
                margin: 8,
                dots: true,
                nav: false,
                rtl: is_rtl,
                responsive:{
                    0:{
                        items:1
                    },
                    480:{
                        items:3
                    },
                    768:{
                        items:cols
                    },
                }
            });

            $sync2.on('click', 'a', function (e) {
                e.preventDefault();
            });

            $sync2.on('click', '.owl-item', function () {
                $sync1.trigger('to.owl.carousel', [$(this).index(), duration, true]);
            });

            $sync2.on('changed.owl.carousel', function (e) {
                if (!flag) {
                    flag = true;
                    $sync1.trigger('to.owl.carousel', [e.item.index, duration, true]);
                    flag = false;
                }
            });
        });


        $(".electro-store-directory .product-categories > li").arrangeObjects('ul', 4);


        /*===================================================================================*/
        /*  PRODUCT CATEGORIES TOGGLE
        /*===================================================================================*/

        $('.product-categories .show-all-cat-dropdown').each(function(){
            if( $(this).siblings('ul').length > 0 ) {
                var $childIndicator = $('<span class="child-indicator"><i class="fa fa-angle-right"></i></span>');

                $(this).siblings('ul').hide();
                if($(this).siblings('ul').is(':visible')){
                    $childIndicator.addClass( 'open' );
                    $childIndicator.html('<i class="fa fa-angle-up"></i>');
                }

                $(this).on( 'click', function(){
                    $(this).siblings('ul').toggle( 'fast', function(){
                        if($(this).is(':visible')){
                            $childIndicator.addClass( 'open' );
                            $childIndicator.html('<i class="fa fa-angle-up"></i>');
                        }else{
                            $childIndicator.removeClass( 'open' );
                            $childIndicator.html('<i class="fa fa-angle-right"></i>');
                        }
                    });
                    return false;
                });
                $(this).append($childIndicator);
            }
        });

        $('.cat-item > a').each(function(){
            if( $(this).siblings('ul.children').length > 0 ) {
                var $childIndicator = $('<span class="child-indicator"><i class="fa fa-angle-right"></i></span>');

                $(this).siblings('.children').hide();
                $('.current-cat > .children').show();
                $('.current-cat-parent > .children').show();
                if($(this).siblings('.children').is(':visible')){
                    $childIndicator.addClass( 'open' );
                    $childIndicator.html('<i class="fa fa-angle-up"></i>');
                }

                $childIndicator.on( 'click', function(){
                    $(this).parent().siblings('.children').toggle( 'fast', function(){
                        if($(this).is(':visible')){
                            $childIndicator.addClass( 'open' );
                            $childIndicator.html('<i class="fa fa-angle-up"></i>');
                        }else{
                            $childIndicator.removeClass( 'open' );
                            $childIndicator.html('<i class="fa fa-angle-right"></i>');
                        }
                    });
                    return false;
                });
                $(this).prepend($childIndicator);
            } else {
                $(this).prepend('<span class="no-child"></span>');
            }
        });
    });

    $('#product_cat').click(function(event){
        var __stateRangeAv  = $(this).find('option:selected').text();
        if(__stateRangeAv.length && __stateRangeAv != ""){
            //$('#search').val(__stateRangeAv);
        }
        else{
            window.alert("Make sure the search field is not empty");
        }
    });
    
    $('#stateSearchBtn').click(function(e){
        e.preventDefault();
        //var searchInput = $.trim($('#search').val());
        var productCat  = $("#product_cat option:selected");
        var searchInput = productCat.val();
        var searchBarIn = $("#search").val();

        var textString  = productCat.text();

        if(searchBarIn.length && searchBarIn !== ""){
            if(textString === "All"){
                window.location.href = nBackend+'/category/search?query='+$.trim(searchBarIn);
            }
            else{
                window.location.href = nBackend+'/category/search?query='+$.trim(searchBarIn)+'&c='+searchInput+'&category='+textString;
            }
        }
        else if(!searchBarIn.length && searchInput.length){
            window.location.href = nBackend+'/category/browse?c='+searchInput+'&category='+textString;
        }
        else{
            window.location.href = nBackend+'/category/browse';
        }
    })
    
    //Create the addToCart Button
    $('.add_to_cart_button').click(function(event){
        event.preventDefault();
        var __id  = $(this).attr('data-cart-id');
        $.ajax({
            type:   'POST',
            url:    nBackend+'/cart',
            data:   {"item_product" : __id},
            success: function(response){
                $('#counter').html(response.cart_item);                        
                $('#totalAmount').html("&#8358;"+response.total_amt);  
                $('#mycart').html(response.taskQuery);
                $.notify({
                    title: '<strong>Cart Added!</strong>',
                    message: 'Total Item(s): <strong>'+response.cart_item+'</strong> | &#8358;'+response.total_amt
                });
            },
        })
    });
    
    //Load on Load
    $.ajax({
        type:   'POST',
        url:    nBackend+'/cart/showcart',
        data:   {
            showcart: true
        },
        success:function(response){
            $('#mycart').html(response);
        }
    });
    
    /**
     * INcrease the quantity of product
     */
    $('.plus').on('click', function(e){
        e.preventDefault();
        var nextInput   = $(this).siblings('.qty');
        var inputParse  = parseInt(nextInput.prop('value'));
        if(inputParse >= 0){
            inputParse++;
            nextInput.prop("value", inputParse);
        }
    });
    
    /**
     * Reduce the quantity of products
     */
    $('.minus').on('click', function(e){
        e.preventDefault();
        var nextInput   = $(this).siblings('.qty');
        var inputParse  = parseInt(nextInput.prop('value'));
        if(!inputParse <= 0){
            inputParse--;
            nextInput.prop("value", inputParse);
        }
    });
    
    $('#updateBtn').click(function(e){
        e.preventDefault();
        var removeBtnRow    = [];
        var qtyRowTask      = [];
        var rowQtyView      = $('.qty');
        $('.removeBtn').each(function(key, value){
            removeBtnRow.push($(value).attr("id"));
            qtyRowTask.push($(rowQtyView[key]).val());
        });
        //Create an ajax flow stack
        var taskRequest = $.ajax({
            type:   'POST',
            url:    nBackend+'/cart/update',
            data:   {
                qtyRow: qtyRowTask,
                update: removeBtnRow
            },
            beforeSend: function(){
                $.notify({
                    title: '<strong>Updating </strong>',
                    message: 'Cart Item(s)!'
                },{
                    placement: {
                        from: "bottom",
                        align: "right"
                    },
                });
            }
        });
        //Callback for success
        taskRequest.done(function(response, textStatus, jqXhr){
            if(response.response == "OK"){
                $.notify({
                    //Options
                    title: '<strong>Carts Updated </strong>',
                    message: 'Cart Item(s) Quantity Updated!'
                },{
                    // Settings
                    type: 'success',
                    placement: {
                        from: "bottom",
                        align: "right"
                    },
                });
                window.location.reload();
            }
        });
        
        //Callback for failure
        taskRequest.fail(function(jqXhr, textStatus, error){
            $.notify({
                title: '<strong>Update failed</strong>',
                message: 'Unable to update Cart.' + error
            },{
                type: 'danger',
                placement: {
                    from: "bottom",
                    align: "right"
                }
            });
            window.location.reload();
        });
    });
    
    $(".removeBtn").click(function(e){
        e.preventDefault();
        var thisRow = $(this);
        var parentRow   = thisRow.parent("td").parent();
        $.post(nBackend+'/cart/remove',{id: thisRow.prop("id")}, function(data){
            var dataflow    = $.parseJSON(JSON.stringify(data));
            if(dataflow.response == "OK"){
                parentRow.fadeOut(400, function(){
                    parentRow.remove();
                });
            }
        });
    });
    
    $("#placeOrderBtn").click(function(e){
        e.preventDefault();

        var isFormValid = true;
        $('form#checkout_form input').each(function(){
            if ($.trim($(this).val()).length == 0){
                alert("Empty Field Found("+$(this).attr("name")+")");
                isFormValid = false;
                return false;
            }
        });

        if(isFormValid) {

            var submitRow = {
                firstname: $("#billing_first_name").val(),
                lastname: $("#billing_last_name").val(),
                email: $("#billing_email").val(),
                phonenumber: $("#billing_phone").val(),
                country: $("#billing_country").val(),
                address: $("#billing_address_1").val(),
                amount: $("#amountToPay").val(),
                //city:       $("#billing_city").val(),
                delivery_time: $("#billing_datetime_delivery").val(),
                paymentMethod: $("input[name='payment_method']:checked").val(),
                totalPayment: $("#totalToPay").val()
            };
            $('#overlayDiv').fadeIn(300);
            $.post(nBackend + '/order', submitRow, function (data) {
                var dataflow = $.parseJSON(JSON.stringify(data));
                $('#overlayDiv').fadeOut(300);
                if (dataflow.reference.length) {
                    window.location.href = dataflow.authorization_url;
                }
            });
        }
    });
    
    //Date Time Piacker
    $('.datetimepicker1').datetimepicker({
        icons: {
            time: 'fa fa-clock-o',
            date: 'fa fa-calendar',
            up: 'fa fa-chevron-up',
            down: 'fa fa-chevron-down',
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-screenshot',
            clear: 'fa fa-trash',
            close: 'fa fa-remove'
        },
    });
    
    //Customer Controller System
    var getCustomer    = $('#getCustomers').DataTable({
        responsive: true,
        "processing": true,
        "serverSide": true,
        "ajax": nBackend + "/dashboard/order",
        "columnDefs": [{
              "targets": -1,
              "data": null,
              "defaultContent": "<a href='#' class='getPack'><i class='ec ec-shopping-bag'></i> View</a> | <a href='#' class='ordernow'><i class='ec ec-map-pointer'></i> Track</a>"
          }],
      "columns": [
            { "data": "sales_id" },
            { "data": "trans_id" },
            { "data": "dateorder" },
            { "data": "delivery" },
            { "data": "status" },
            { "data": "amount" },
            { "data": "" },
        ],
        //"sDom": "t" // just show table, no other controls
        //"sDom": "t" // just show table, no other controls
        "footerCallback": function(row, data, start, end, display){
            var api = this.api(), data, total, pageTotal;
            // Remove the formatting to get integer data for summation
            var intVal  = function(i){
                return typeof i == 'string' ? i.replace(/[\$,]/g, '')*1 : typeof i === 'number' ? i : 0;
            };

            //Total Pages over all
            total   = api.column(5).data().reduce(function(a,b){
                return intVal(a) + intVal(b);
            }, 0);

            //Total over this page
            pageTotal   = api.column(5, {page:'current'}).data().reduce(function(a,b){
                return intVal(a) + intVal(b);
            }, 0);

            //update footer
            $(api.column(5).footer()).html(pageTotal+' $('+total+' Total)');
        }
    });
    //Click to set customer for order
    $('#getCustomers tbody').on('click', '.ordernow', function(e){
        e.preventDefault();
        var dataRow = getCustomer.row($(this).parents('tr')).data();
        var stringRowData   = {action : 'remove', register_id: dataRow['tracking']};
        if(dataRow['tracking'].length == 0 || dataRow['tracking'] == ''){
            window.alert("Seems tracking link is not available");
        }
        else{
            var windowL = window.open(dataRow['tracking'], '_blank');
            windowL.focus();
        }
    });
    
    //Click to set customer for order
    $('#getCustomers tbody').on('click', '.getPack', function(e){
        e.preventDefault();
        var dataRow = getCustomer.row($(this).parents('tr')).data();
        var tr = $(this).closest('tr');
        var row = getCustomer.row( tr );

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row

            //row.child(formatJsonString(row.data())).show();
            row.child(formatJsonString(dataRow['item_sold'])).show();
            tr.addClass('shown');
        }
    });

    //Show Password/Hide Password
    $('#checkBoxRow').change(function(){
        if($('#user-password').prop('type')=='password'){
            $('#user-password').prop('type','text');
            $('strong#showHide').text('Hide');
        }
        else{
            $("#user-password").prop('type','password');
            $('strong#showHide').text('Show');
        }
    })
    
    /* Formatting function for row details - modify as you need */
    function formatJsonString(d){
        var tableFlow       = '';
        var taskStringFlow  = [];
        //var JsonStringFlow  = $.parseJSON(d);
        for(var n in d){
            taskStringFlow.push(d[n]);
        }

        tableFlow = '<table cellpadding="5" cellspacing="0" border="0" class="table table-condensed" style="padding-left:50px; font-size:13px;">';

        for(var i in taskStringFlow){
            tableFlow += '<tr style="border:none !important;">'+
                '<td style="border:none !important;">'+taskStringFlow[i].name+'</td>'+
                '<td style="border:none !important;"><img src="'+nBackend+'/assets/uploads/'+taskStringFlow[i].image
                +'" class="img img-responsive" style="width:10%;" /></td>'+
                '<td style="border:none !important;">'+taskStringFlow[i].qty+'</td>'+
                '<td style="border:none !important;">'+taskStringFlow[i].price+'</td>'+
                '<td style="border:none !important;">'+parseInt(taskStringFlow[i].qty) * parseInt(taskStringFlow[i].price)+'</td>'+
            '</tr>'
        }
        tableFlow += '</table>';
        return tableFlow;
    }

    function format ( d ) {
        // `d` is the original data object for the row
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
            '<tr>'+
                '<td>Full name:</td>'+
                '<td>'+d.name+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Extension number:</td>'+
                '<td>'+d.extn+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Extra info:</td>'+
                '<td>And any further details here (images etc)...</td>'+
            '</tr>'+
        '</table>';
    }
})(jQuery);

//Functions
/**
 * @param {type} str
 * @returns {String}
 */
function ucwords(str) {
 return (str + '')
    .replace(/^([a-z\u00E0-\u00FC])|\s+([a-z\u00E0-\u00FC])/g, function($1) {
      return $1.toUpperCase();
    });
}
