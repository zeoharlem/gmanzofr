<div id="page" class="hfeed site">
            <a class="skip-link screen-reader-text" href="#site-navigation">Skip to navigation</a>
            <a class="skip-link screen-reader-text" href="#content">Skip to content</a>

            <style>
                #menu-top-bar-right a, #menu-top-bar-left a{
                    /**color: #fff !important;**/
                }
            </style>
            
            <!--<div class="top-bar" style="background-color:#333e48;">-->
            <div class="top-bar">
	<div class="container">
		<nav>
			<ul id="menu-top-bar-left" class="nav nav-inline pull-left animate-dropdown flip">
				<li class="menu-item animate-dropdown"><a title="Welcome " href="#">Welcome </a></li>
			</ul>
		</nav>

		<nav>
			<ul id="menu-top-bar-right" class="nav nav-inline pull-right animate-dropdown flip">
				<!--<li class="menu-item animate-dropdown"><a title="Store Locator" href="#"><i class="ec ec-map-pointer"></i>Store Locator</a></li>-->
				<li class="menu-item animate-dropdown"><a title="Track Your Order" href="<?= $this->url->get('trackorder/') ?>"><i class="ec ec-transport"></i>Track Your Order</a></li>
				<li class="menu-item animate-dropdown"><a title="Shop" href="<?= $this->url->get('category/') ?>"><i class="ec ec-shopping-bag"></i>Categories</a></li>
				<li class="menu-item animate-dropdown"><a title="My Account" href="<?= $this->url->get('account/') ?>"><i class="ec ec-user"></i>My Account</a></li>
			</ul>
		</nav>
	</div>
</div><!-- /.top-bar -->

            <!--<header id="masthead" class="site-header header-v2" style="background-color:#ffed8b">
            <header id="masthead" class="site-header header-v2" style="background-color:#8cc53b">-->
            <header id="masthead" class="site-header header-v2">
    <div class="container">
        <div class="row">

            <!-- ============================================================= Header Logo ============================================================= -->
<div class="header-logo">
	<a href="<?= $this->url->get('index') ?>" class="header-logo-link">
		<img src="<?= $this->url->get('assets/images/gmanzo.png') ?>" width="70%" />
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
	            <li class="menu-item"><a title="Home" href="<?= $this->url->get('index?task=success&r=MUi_PAGE') ?>">Home</a>
	            </li>
	            <li class="menu-item animate-dropdown"><a title="About Us" href="<?= $this->url->get('about/') ?>">About Us</a></li>
	            <li class="menu-item animate-dropdown"><a title="Check Categories" href="<?= $this->url->get('category/') ?>">Categories</a></li>
	            <li class="menu-item"><a title="Cart" href="<?= $this->url->get('cart/show') ?>">Cart(s)</a></li>
	            <li class="menu-item"><a title="Contact Us" href="<?= $this->url->get('contact') ?>">Contact Us</a></li>
	        </ul>
		</nav>
    </div>
</div>

            <div class="header-support-info">
	<div class="media">
		<span class="media-left support-icon media-middle"><i class="ec ec-support"></i></span>
		<div class="media-body">
			<span class="support-number"><strong>Support</strong> 070 8756 3756</span><br>
			<span class="support-email">Email: info@netmartng.com</span>
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
            <li class="highlight menu-item animate-dropdown"><a title="Top 100 Offers" href="<?= $this->url->get('category/') ?>">Categories</a></li>
            <li class="highlight menu-item animate-dropdown"><a title="New Arrivals" href="javascript:void(0)">New Arrivals</a></li>
            <?php foreach ($categories as $keyCat => $keyVal) { ?>
            <li class="menu-item animate-dropdown"><a title="<?= ucwords($keyVal->category_name) ?>" href="<?= $this->url->get('category/browse?c=' . $keyVal->category_id . '&category=' . $keyVal->category_name . '' . $activeShop) ?>"><?= ucwords($keyVal->category_name) ?></a></li>
            <?php } ?>
        </ul>
    </li>
</ul>
        <form class="navbar-search" method="post">
	<label class="sr-only screen-reader-text" for="search">Search for:</label>
	<div class="input-group">
		<input id="search" class="form-control search-field" dir="ltr" value="" name="s" placeholder="Search Store Now" type="text">
		<div class="input-group-addon search-categories">
			<select name="product_cat" id="product_cat" class="postform resizeselect" style="width: 443px;">

                    <option class="level-0" value="">All</option>
                <?php foreach ($categories as $keyCat => $keyVal) { ?>
                    <option class="level-0" value="<?= $keyVal->category_id ?>"><?= ucwords($keyVal->category_name) ?></option>
                <?php } ?>
			</select>
		</div>
		<div class="input-group-btn">
			<input id="search-param" name="post_type" value="product" type="hidden">
			<button type="button" id="stateSearchBtn" class="btn btn-secondary"><i class="ec ec-search"></i></button>
		</div>
	</div>
</form>        <ul class="navbar-mini-cart navbar-nav animate-dropdown nav pull-right flip">
	<li class="nav-item dropdown">
		<a href="javascript:void(0)" class="nav-link" data-toggle="dropdown">
			<i class="ec ec-shopping-bag"></i>
			<span class="cart-items-count count" id="counter"><?php echo count($this->session->get('cart_item')) ? count($this->session->get('cart_item')) : 0; ?></span>
			<span class="cart-items-total-price total-price"><span class="amount" id="totalAmount">&#8358;<?php echo $this->session->get('total_cart') ? $this->session->get('total_cart') : 0; ?></span></span>
		</a>
		<ul class="dropdown-menu dropdown-menu-mini-cart" id="mycart">
			<li>
				<div class="widget_shopping_cart_content">

					<ul class="cart_list product_list_widget ">


						


					</ul><!-- end product list -->



				</div>
			</li>
		</ul>
	</li>
</ul>

<ul class="navbar-wishlist nav navbar-nav pull-right flip">
	<li class="nav-item">
		<a href="javascript:void(0)" class="nav-link"><i class="ec ec-favorites"></i></a>
	</li>
</ul>
<ul class="navbar-compare nav navbar-nav pull-right flip">
	<li class="nav-item">
		<a href="javascript:void(0)" class="nav-link"><i class="ec ec-compare"></i></a>
	</li>
</ul>    </div>
</nav>