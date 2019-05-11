{% extends "templates/base.volt" %}

{% block head %}

{% endblock %}

{% block content %}

{{ partial("partials/header_below") }}

<div id="primary" class="content-area">
        <main id="main" class="site-main">
                
                <div class="home-v3-ads-block animate-in-view fadeIn animated" data-animation=" animated fadeIn">
                    <div class="ads-block row">
                            <div class="ad col-xs-12 col-sm-12">
                                    <div class="media">
                                            <div class="media-left media-middle">
                                                    <img src="{{ url('assets/images/small_banner.jpg')}}" width="90%" alt="">
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
{% for key,value in category %}
<section class="section-product-cards-carousel" >
					<header>
						<h2 class="h1"><strong>{{ key | capitalize}}</strong></h2>
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
                                                                            <span class="loop-product-categories"><a href="product-category.html" rel="tag">{{key | capitalize}}</strong></a></span>
                                                                            <a href="#">
                                                                                <h3>{{valueIndex['title'] | capitalize }}</h3>
                                                                                <div class="product-thumbnail">
                                                                                    <img src="assets/images/blank.gif" style="width:95%" data-echo="{{ url('assets/uploads/'~valueIndex['front_image']) }}" class="img-responsive" alt="">
                                                                                </div>
                                                                            </a>

                                                                            <div class="price-add-to-cart">
                                                                                <span class="price">
                                                                                    <span class="electro-price">
                                                                                        <ins><span class="amount"> </span></ins>
                                                                                                            <span class="amount"> &#8358;{{ valueIndex['sale_price'] }}</span>
                                                                                    </span>
                                                                                </span>
                                                                                <a rel="nofollow" href="#" class="button add_to_cart_button" data-cart-id="{{valueIndex['product_id']}}">Add to cart</a>
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
{% endfor %}
<input value="<?php echo $counter; ?>" type="hidden" id="hidcounter" />
				
				

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .container -->
</div><!-- #content -->


{% endblock %}