<footer id="colophon" class="site-footer">
	

	<div class="footer-newsletter">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-7">
					<h5 class="newsletter-title">Sign up to Newsletter</h5>
					
				</div>
				<div class="col-xs-12 col-sm-5">
					<form>
						<div class="input-group">
							<input class="form-control" placeholder="Enter your email address" type="text">
							<span class="input-group-btn">
								<button class="btn btn-secondary" type="button">Sign Up</button>
							</span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="footer-bottom-widgets" style="background-color:#ffed8b">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-7 col-md-push-5">
					<div class="columns">
						<aside id="nav_menu-2" class="widget clearfix widget_nav_menu">
							<div class="body">
								<h4 class="widget-title">Find It Fast</h4>
								<div class="menu-footer-menu-1-container">
									<ul id="menu-footer-menu-1" class="menu">
                                                                            <?php foreach ($categories as $keyCat => $valCat) { ?>
										<li class="menu-item"><a href="<?= $this->url->get('shops/browse?c=' . $valCat->category_id . '&category=' . $valCat->category_name . '' . $activeShop) ?>"><?= ucwords($valCat->category_name) ?></a></li>
                                                                            <?php } ?>
									</ul>
								</div>
							</div>
						</aside>
					</div><!-- /.columns -->

					<div class="columns">
						<aside id="nav_menu-3" class="widget clearfix widget_nav_menu">
							
						</aside>
					</div><!-- /.columns -->

					<div class="columns">
						<aside id="nav_menu-4" class="widget clearfix widget_nav_menu">
							<div class="body">
								<h4 class="widget-title">Customer Care</h4>
								<div class="menu-footer-menu-3-container">
									<ul id="menu-footer-menu-3" class="menu">
										<li class="menu-item"><a href="<?= $this->url->get('account') ?>">My Account</a></li>
										<li class="menu-item"><a href="<?= $this->url->get('trackorder') ?>">Track your Order</a></li>
										<!--<li class="menu-item"><a href="single-product.html">Wishlist</a></li>
										<li class="menu-item"><a href="single-product.html">Customer Service</a></li>
										<li class="menu-item"><a href="single-product.html">Returns/Exchange</a></li>
										<li class="menu-item"><a href="single-product.html">FAQs</a></li>-->
										<li class="menu-item"><a href="<?= $this->url->get('contact') ?>">Contact Us</a></li>
									</ul>
								</div>
							</div>
						</aside>
					</div><!-- /.columns -->

				</div><!-- /.col -->

				<div class="footer-contact col-xs-12 col-sm-12 col-md-5 col-md-pull-7">
					<div class="footer-logo">
						<img src="<?= $this->url->get('assets/images/gmanzo.png') ?>" />
					</div><!-- /.footer-contact -->

					<div class="footer-call-us">
						<div class="media">
							<span class="media-left call-us-icon media-middle"><i class="ec ec-support"></i></span>
							<div class="media-body">
								<span class="call-us-text">Got Questions ? Call us 24/7!</span>
								<span class="call-us-number">(070)8756-3756</span>
							</div>
						</div>
					</div><!-- /.footer-call-us -->


					<div class="footer-address">
						<strong class="footer-address-title">Contact Info</strong>
						<address>Lagos State, Nigeria. Africa</address>
					</div><!-- /.footer-address -->

					<div class="footer-social-icons">
						<ul class="social-icons list-unstyled">
							<li><a class="fa fa-facebook" href="#"></a></li>
							<li><a class="fa fa-twitter" href="#"></a></li>
							<li><a class="fa fa-pinterest" href="#"></a></li>
							<li><a class="fa fa-linkedin" href="#"></a></li>
							<li><a class="fa fa-google-plus" href="#"></a></li>
							<li><a class="fa fa-tumblr" href="#"></a></li>
							<li><a class="fa fa-instagram" href="#"></a></li>
							<li><a class="fa fa-youtube" href="#"></a></li>
							<li><a class="fa fa-rss" href="#"></a></li>
							</ul>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="copyright-bar" style="background-color:#ffed8b">
		<div class="container">
			<div class="pull-left flip copyright">© <a href="#">Gmanzo</a> - 2018 powered by <strong>CMK</strong></div>
			<div class="pull-right flip payment">
				<div class="footer-payment-logo">
					<ul class="cash-card card-inline">
						<li class="card-item"><img src="<?= $this->url->get('assets/images/footer/payment-icon/1.png') ?>" alt="" width="52"></li>
						<li class="card-item"><img src="<?= $this->url->get('assets/images/footer/payment-icon/2.png') ?>" alt="" width="52"></li>
						<li class="card-item"><img src="<?= $this->url->get('assets/images/footer/payment-icon/3.png') ?>" alt="" width="52"></li>
						<li class="card-item"><img src="<?= $this->url->get('assets/images/footer/payment-icon/4.png') ?>" alt="" width="52"></li>
						<li class="card-item"><img src="<?= $this->url->get('assets/images/footer/payment-icon/5.png') ?>" alt="" width="52"></li>
					</ul>
				</div><!-- /.payment-methods -->
			</div>
		</div><!-- /.container -->
	</div><!-- /.copyright-bar -->
</footer><!-- #colophon -->
