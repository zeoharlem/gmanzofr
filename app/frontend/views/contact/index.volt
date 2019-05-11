{% extends "templates/base.volt" %}

{% block head %}
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
{% endblock %}

{% block content %}

<article class="hentry">

					<header class="entry-header">
						<h1 class="entry-title">Contact Us</h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<div class="row">
							<div class="col-sm-6">
								<div class="wpb_wrapper outer-bottom-xs">
									<h2 class="contact-page-title">Leave us a Message</h2>
									
								</div>

								<div role="form" class="wpcf7">
									{{ flash.output() }}
									<form action="#" method="post" class="wpcf7-form">

										<div class="form-group row">
											<div class="col-xs-12 col-md-6">
												<label>Full Name*</label><br>
												<span class="wpcf7-form-control-wrap first-name">
													<input name="fullname" required value="" size="40" class="wpcf7-form-control input-text" aria-required="true" aria-invalid="false" type="text">
												</span>
											</div>

											<div class="col-xs-12 col-md-6">
												<label>Email*</label><br>
												<span class="wpcf7-form-control-wrap last-name">
													<input name="email"  required value="" size="40" class="wpcf7-form-control input-text" aria-required="true" aria-invalid="false" type="text">
												</span>
											</div>
										</div>

										<div class="form-group">
											<label>Subject</label><br>
											<span class="wpcf7-form-control-wrap subject"><input name="subject" value="" size="40" class="wpcf7-form-control input-text" aria-invalid="false" type="text"></span>
										</div>

										<div class="form-group">
											<label>Your Message</label><br>
											<span class="wpcf7-form-control-wrap your-message"><textarea name="message" cols="40" rows="10" class="wpcf7-form-control input-text wpcf7-textarea" aria-invalid="false"></textarea></span>
										</div>
                                                                                <div class="g-recaptcha form-row form-row-wide" data-sitekey="6Lev2EEUAAAAAPYTKnvBZXHVglceGx-IPHpyDRQT"></div>

										<div class="form-group clearfix">
											<p><input value="Send Message" required id="sendMsg" class="wpcf7-form-control wpcf7-submit" type="submit"></p>
										</div>
									</form>
								</div>
							</div><!-- .col -->

							<div class="store-info store-info-v2 col-sm-6">
								<div class="vc_column-inner ">
									<div class="wpb_wrapper">

										<div class="inner-left-xs">
											<div class="wpb_wrapper">
												<h2 class="contact-page-title">Our Address</h2>
												<p>Lagos, Nigeria, Africa<br>
													Support (070)-8756-3756<br>
												Email: <a href="mailto:info@netmartng.com">info@netmartng.com</a></p>
												<h3>Opening Hours</h3>
												<p>Monday to Friday: 9am-9pm<br>
													Saturday to Sunday: 9am-11pm</p>
												
											</div>
										</div>
									</div>
								</div>
							</div><!-- .col -->
						</div><!-- .row -->
					</div><!-- .entry-content -->

				</article>
</div>
</div>
{% endblock %}