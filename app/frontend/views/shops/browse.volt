{% extends "templates/base.volt" %}

{% block head %}

{% endblock %}

{% block content %}

{{ partial("partials/header_below") }}
    
    <header>
            <h2 class="h1"><strong>{{ category }}</strong></h2>
    </header>


{% if productList is defined %}
<ul class="products columns-5">
            {% for keyPro, varPro in productList %}
                            <li class="product">
                <div class="product-outer">
                    <div class="product-inner">
                        <span class="loop-product-categories"><a href="javascript:void(0)" rel="tag">{{varPro['shop'] | capitalize}} | {{varPro['location'] | capitalize}}</a></span>
                        <a href="javascript:void(0)">
                            <h3>{{ varPro['title'] | capitalize}}</h3>
                            <div class="product-thumbnail">

                                <img data-echo="{{ url('assets/uploads/'~varPro['front_image']) }}" style="width:90% !important;" src="assets/images/blank.gif" alt="">

                            </div>
                        </a>

                        <div class="price-add-to-cart">
                            <span class="price">
                                <span class="electro-price">
                                    <ins><span class="amount" style="color:#333;">&#8358;{{varPro['sale_price']}}</span></ins>
                                </span>
                            </span>
                            <a rel="nofollow" href="javascript:void(0)" class="button add_to_cart_button" data-cart-id="{{varPro['product_id']}}">Add to cart</a>
                        </div><!-- /.price-add-to-cart -->

                        <div class="hover-area">
                            <div class="action-buttons">

                                <a href="#" rel="nofollow" class="add_to_wishlist">
                                        Wishlist</a>

                                <a href="#" class="add-to-compare-link">Compare</a>
                            </div>
                        </div>
                    </div><!-- /.product-inner -->
                </div><!-- /.product-outer -->
            </li>
            {% endfor %}
            
    </ul>

    
        <div class="shop-control-bar-bottom" style="margin-top:50px;">
            <form class="form-electro-wc-ppp">
                <select class="electro-wc-wppp-select c-select" onchange="this.form.submit()" name="ppp"><option selected="selected" value="15">Show 15</option><option value="-1">Show All</option></select>
            </form>
            <p class="woocommerce-result-count">Showing 1&ndash;15 of 20 results</p>
            <nav class="woocommerce-pagination">
                <ul class="page-numbers">
                    <li><span class="page-numbers current">1</span></li>
                    <li><a href="#" class="page-numbers">2</a></li>
                    <li><a href="#" class="next page-numbers">→</a></li>
                </ul>
            </nav>
        </div>
    {% else %}
    No Result was found....
    {% endif %}
    </div>
</div>
{% endblock %}
