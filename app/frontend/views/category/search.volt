{% extends "templates/base.volt" %}

{% block head %}

{% endblock %}

{% block content %}
<section>
<header>
    <h2 class="h1">Seach | <small><strong>{{ searchTitle }}</strong> in {{catTitle}}</small></h2>
</header>
<div class="woocommerce">
    <ul class="products columns-4">
        {% for keys,values in pager.getPaginate().items %}
        <li class="product">
            <div class="product-outer">
                <div class="product-inner">
                    <span class="loop-product-categories"><a href="#" rel="tag">{{values.getCategory().category_name | lowercase | capitalize}}</a></span>
                    <a href="#">
                        <h3>{{values.title | capitalize}}</h3>
                        <div class="product-thumbnail">

                            <img data-echo="{{ url('assets/uploads/'~values.front_image) }}" src="assets/images/blank.gif" alt="">

                        </div>
                    </a>

                    <div class="price-add-to-cart">
                        <span class="price">
                            <span class="electro-price">
                                <ins><span class="amount"><b>&#8358;{{values.sale_price}}</b></span></ins>

                            </span>
                        </span>
                        <a rel="nofollow" href="#"  class="button add_to_cart_button" data-cart-id="{{values.product_id}}">Add to cart</a>
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
    {{ partial('partials/pagination', [
        'page': pager.getPaginate(),
        'limit': pager.getLimit()
      ])
    }}

</div>
</section>
</div>
</div>
{% endblock %}