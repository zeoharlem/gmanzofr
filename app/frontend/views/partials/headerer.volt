<div id="page" class="hfeed site">
            <a class="skip-link screen-reader-text" href="#site-navigation">Skip to navigation</a>
            <a class="skip-link screen-reader-text" href="#content">Skip to content</a>

            <style>
                #menu-top-bar-right a, #menu-top-bar-left a{
                    color: #fff !important;
                }
            </style>
            
            <div class="top-bar" style="background-color:#333e48;">
	<div class="container">
		<nav>
			<ul id="menu-top-bar-left" class="nav nav-inline pull-left animate-dropdown flip">
				<li class="menu-item animate-dropdown"><a title="Welcome " href="#">Welcome </a></li>
			</ul>
		</nav>

		<nav>
			<ul id="menu-top-bar-right" class="nav nav-inline pull-right animate-dropdown flip">
				<li class="menu-item animate-dropdown"><a title="Store Locator" href="#"><i class="ec ec-map-pointer"></i>Store Locator</a></li>
				<li class="menu-item animate-dropdown"><a title="Track Your Order" href="{{url('trackorder/')}}"><i class="ec ec-transport"></i>Track Your Order</a></li>
				<li class="menu-item animate-dropdown"><a title="Shop" href="#"><i class="ec ec-shopping-bag"></i>Shop</a></li>
				<li class="menu-item animate-dropdown"><a title="My Account" href="{{url('account/')}}"><i class="ec ec-user"></i>My Account</a></li>
			</ul>
		</nav>
	</div>
</div><!-- /.top-bar -->

            <header id="masthead" class="site-header header-v2" style="background-color:#ffed8b">
    <div class="container">
        <div class="row">

            <!-- ============================================================= Header Logo ============================================================= -->
<div class="header-logo">
	<a href="{{url('index')}}" class="header-logo-link">
		<img src="{{ url('assets/images/gmanzo.png') }}" />
	</a>
</div>
<!-- ============================================================= Header Logo : End============================================================= -->

            <div class="primary-nav animate-dropdown">
	<div class="clearfix">
		 <button class="navbar-toggler hidden-sm-up pull-right flip" type="button" data-toggle="collapse" data-target="#default-header">
		    	
		 </button>
	 </div>

    <div class="collapse navbar-toggleable-xs" id="default-header">
		<nav>
	        <ul id="menu-main-menu" class="nav nav-inline yamm">
	            <li class="menu-item"><a title="Home" href="{{ url('index?task=success&r=MUi_PAGE') }}">Home</a>
	            </li>
	            <li class="menu-item animate-dropdown"><a title="About Us" href="{{ url('shops/') }}">About Us</a></li>
	            <li class="menu-item animate-dropdown"><a title="About Us" href="{{ url('shops/') }}">Shops</a></li>
	            <li class="menu-item"><a title="Cart" href="{{url('cart/show')}}">Cart(s)</a></li>
	            <li class="menu-item"><a title="Contact Us" href="#">Contact Us</a></li>
	        </ul>
		</nav>
    </div>
</div>

            <div class="header-support-info">
	<div class="media">
		<span class="media-left support-icon media-middle"><i class="ec ec-support"></i></span>
		<div class="media-body">
			<span class="support-number"><strong>Support</strong> (+800) 856 800 604</span><br>
			<span class="support-email">Email: info@gmanzo.com</span>
		</div>
	</div>
</div>

        </div><!-- /.row -->
    </div>
</header><!-- #masthead -->
<nav class="navbar navbar-primary navbar-full">
    <div class="container">
            <ul class="nav navbar-nav departments-menu animate-dropdown">
    <li class="nav-item dropdown">

        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="departments-menu-toggle" aria-expanded="false">Shop by Department</a>
        <ul id="menu-vertical-menu" class="dropdown-menu yamm departments-menu-dropdown" style="">
            <li class="highlight menu-item animate-dropdown"><a title="Top 100 Offers" href="home-v3.html">Shops</a></li>
            <li class="highlight menu-item animate-dropdown"><a title="New Arrivals" href="home-v3-full-color.html">New Arrivals</a></li>
            {% for keyCat, keyVal in categories %}
            <li class="menu-item animate-dropdown"><a title="Accessories" href="product-category.html">{{keyVal.category_name | capitalize}}</a></li>
            {% endfor %}
        </ul>
    </li>
</ul>
        <form class="navbar-search" method="get" action="http://transvelo.github.io/">
	<label class="sr-only screen-reader-text" for="search">Search for:</label>
	<div class="input-group">
		<input id="search" class="form-control search-field" dir="ltr" value="" name="s" placeholder="States We Are Found For Now" type="text">
		<div class="input-group-addon search-categories">
			<select name="product_cat" id="product_cat" class="postform resizeselect" style="width: 443px;">
				<option value="0" selected="selected">States / Origin</option>
                                {% for keyCat, keyVal in statesAvr %}
                                    <option class="level-0" value="laptops-laptops-computers">{{keyVal | capitalize}}</option>
                                {% endfor %}
			</select>
		</div>
		<div class="input-group-btn">
			<input id="search-param" name="post_type" value="product" type="hidden">
			<button type="submit" class="btn btn-secondary"><i class="ec ec-search"></i></button>
		</div>
	</div>
</form>        <ul class="navbar-mini-cart navbar-nav animate-dropdown nav pull-right flip">
	<li class="nav-item dropdown">
		<a href="cart.html" class="nav-link" data-toggle="dropdown">
			<i class="ec ec-shopping-bag"></i>
			<span class="cart-items-count count" id="counter"><?php echo count($this->session->get('cart_item')) ? count($this->session->get('cart_item')) : 0; ?></span>
			<span class="cart-items-total-price total-price"><span class="amount" id="totalAmount">&#8358;<?php echo $this->session->get('total_cart') ? $this->session->get('total_cart') : 0; ?></span></span>
		</a>
		<ul class="dropdown-menu dropdown-menu-mini-cart" id="mycart">
			<li>
				<div class="widget_shopping_cart_content">

					<ul class="cart_list product_list_widget ">


						<li class="mini_cart_item">
							<a title="Remove this item" class="remove" href="#">×</a>
							<a href="single-product.html">
								<img class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" src="assets/images/products/mini-cart1.jpg" alt="">White lumia 9001&nbsp;
							</a>

							<span class="quantity">2 × <span class="amount">£150.00</span></span>
						</li>


						<li class="mini_cart_item">
							<a title="Remove this item" class="remove" href="#">×</a>
							<a href="single-product.html">
								<img class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" src="assets/images/products/mini-cart2.jpg" alt="">PlayStation 4&nbsp;
							</a>

							<span class="quantity">1 × <span class="amount">£399.99</span></span>
						</li>

						<li class="mini_cart_item">
							<a data-product_sku="" data-product_id="34" title="Remove this item" class="remove" href="#">×</a>
							<a href="single-product.html">
							<img class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" src="assets/images/products/mini-cart3.jpg" alt="">POV Action Cam HDR-AS100V&nbsp;

							</a>

							<span class="quantity">1 × <span class="amount">£269.99</span></span>
						</li>


					</ul><!-- end product list -->


					<p class="total"><strong>Subtotal:</strong> <span class="amount">£969.98</span></p>


					<p class="buttons">
						<a class="button wc-forward" href="cart.html">View Cart</a>
						<a class="button checkout wc-forward" href="checkout.html">Checkout</a>
					</p>


				</div>
			</li>
		</ul>
	</li>
</ul>

<ul class="navbar-wishlist nav navbar-nav pull-right flip">
	<li class="nav-item">
		<a href="wishlist.html" class="nav-link"><i class="ec ec-favorites"></i></a>
	</li>
</ul>
<ul class="navbar-compare nav navbar-nav pull-right flip">
	<li class="nav-item">
		<a href="compare.html" class="nav-link"><i class="ec ec-compare"></i></a>
	</li>
</ul>    </div>
</nav>