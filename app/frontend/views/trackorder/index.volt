
{% extends "templates/base.volt" %}

{% block head %}

{% endblock %}

{% block content %}

<article id="post-2181" class="post-2181 page type-page status-publish hentry">
        <p>&nbsp;</p>
        <header class="entry-header">
                <h1 class="entry-title" itemprop="name">Track your Order</h1>
        </header><!-- .entry-header -->

        <div class="entry-content" itemprop="mainContentOfPage">
                <div class="woocommerce">
                        <form action="#" method="post" class="track_order">

                                <p>To track your order please enter your Order ID in the box below and press the "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>

                                <p class="form-row form-row-first">
                                        <label for="orderid">Tracking ID</label>
                                        <input class="input-text" type="text" name="id" id="orderid" placeholder="Found in your order confirmation email." />
                                </p>

                                <p class="form-row form-row-last">
                                        <label for="order_email">Billing Email</label>
                                        <input class="input-text" type="text" name="email" id="order_email" placeholder="Email you used during checkout." />
                                </p>

                                <div class="clear"></div>

                                <p class="form-row">
                                        <input type="submit" class="button" name="track" value="Track" />
                                </p>
                        </form>
                </div>
        </div><!-- .entry-content -->

<div role="tabpanel" class="tab-pane" id="list-view-small" aria-expanded="true">
{% if jobs is defined %}
        <h4>Order Details</h4>
	<ul class="products columns-3">
                            {% for keys,values in jobs %}
                                {% for index,element in values['content'] %}
				<li class="product list-view list-view-small">
                                    <div class="media">
                                            <div class="media-left">
                                                    <a href="#">
                                                            <img class="wp-post-image" data-echo="{{ url('assets/uploads/'~element.image) }}" src="assets/images/blank.gif" alt="">
                                                    </a>
                                            </div>
                                            <div class="media-body media-middle">
                                                    <div class="row">
                                                            <div class="col-xs-12">
                                                                    <span class="loop-product-categories"><a rel="tag" href="#">{{ element.addedby }}</a></span><a href="#"><h3>{{ element.name }}</h3>
                                                                            <div class="product-short-description">
                                                                                    <ul style="padding-left: 18px;">
                                                                                            <li>{{ element.address }}</li>
                                                                                    </ul>
                                                                            </div>
                                                                    <a href="#" rel="nofollow" class="add_to_wishlist" style="color:#333 !important;"> {{values['dateOrder']}}</a>
                                                            </div>
                                                            <div class="col-xs-12">
                                                                    <div class="price-add-to-cart">
                                                                            <span class="price"><span class="electro-price"><span class="amount">&#8358;<?php echo number_format($element->price * $element->qty, 2); ?></span></span></span>
                                                                    </div><!-- /.price-add-to-cart -->
                                                                    <div class="hover-area">
                                                                        <div class="action-buttons">
                                                                            <a href="{{ values['trackLink'] }}" target="_blank" class="add-to-compare-link">Tracking Link</a>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                    </div>
                                            </div>
                                    </div>
                            </li>
                            {% endfor %}
                            {% endfor %}
			</ul>

{% else %}

{% endif %}
</div>

</article><!-- #post-## -->
    </div>
</div>
{% endblock %}