{% extends "templates/base.volt" %}

{% block head %}

{% endblock %}

{% block content %}

{{ partial("partials/header_below") }}

<div id="primary" class="content-area">
        <main id="main" class="site-main">
            
            <section>
                <header>
                        <h2 class="h1"><b>Our Trusted Partners</b></h2>
                        <a href="{{ url('shops/reset') }}" class="btn" style="float:right; padding-bottom:10px;"> Show All </a>
                </header>

                <div class="woocommerce columns-6">
                        <!--<ul class="product-loop-categories">-->
                            {% for keyStack, valStack in vendorList %}
                                
                                <div class="ad col-xs-12 col-sm-6" style="margin-bottom:20px;">
                                    <div class="media">
                                            <div class="media-left media-middle">
                                                    <img src="{{ url('assets/images/vendor/'~valStack['vendor_logo']) }}" alt="" style="margin-left:20px;">
                                            </div>
                                            <div class="media-body media-middle">
                                                    <div class="ad-text pull">
                                                            <strong>{{ valStack['display_name'] | capitalize }} </strong><br/>
                                                            <small>{{valStack['address2']}}</small><br/>
                                                            <small><strong>{{valStack['address1']}}</strong></small>
                                                    </div>
                                                    <div class="ad-action">
                                                            <!--<a href="{{ url('shops/view?s='~valStack['address1']~'&d='~valStack['vendor_id']~'&name='~valStack['display_name']) }}">Shop now</a>-->
                                                            Shop now
                                                    </div>
                                            </div>
                                        </div>
                                </div><!-- /.col -->
                                
                                <!--<li class="product-category product">
                                    <a href="{{ url('shops/view?s='~valStack['address1']~'&d='~valStack['vendor_id']~'&name='~valStack['display_name']) }}">
                                        <img src="{{ url('assets/images/vendor/'~valStack['vendor_logo']) }}" class="img-responsive" alt="">
                                        <h3>
                                            <strong>{{ valStack['display_name'] | capitalize }}</strong>
                                            <mark class="count">(2)</mark>
                                        </h3>
                                    </a>
                                </li>--><!-- /.item -->
                            {% endfor %}

			<!--</ul>-->
                    </div>
            </section>
            
        </main>
</div>
</div>
</div>
{% endblock %}
