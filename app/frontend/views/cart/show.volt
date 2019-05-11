
{% extends "templates/base.volt" %}

{% block head %}

{% endblock %}

{% block content %}

<div id="content" class="site-content" tabindex="-1">
	<div class="container">
		
<p>&nbsp;</p>
    <article class="page type-page status-publish hentry">
            <header class="entry-header"><h1 itemprop="name" class="entry-title">Cart</h1></header><!-- .entry-header -->
{% if session.has('cart_item') and session.get('cart_item') is not empty %}
<form>

    <table class="shop_table shop_table_responsive cart">
        <thead>
            <tr>
                <th class="product-remove">&nbsp;</th>
                <th class="product-thumbnail">&nbsp;</th>
                <th class="product-name">Product</th>
                <th class="product-price">Price</th>
                <th class="product-quantity">Quantity</th>
                <th class="product-subtotal">Total</th>
            </tr>
        </thead>
        <tbody>
            {% for key,values in session.get('cart_item') %}
            <tr class="cart_item">

                <td class="product-remove">
                    <a class="remove removeBtn" href="#" id="{{values['id']}}">×</a>
                </td>

                <td class="product-thumbnail">
                    <a href="#"><img width="180" height="180" src="{{ url('assets/uploads/'~values['image'] )}}" alt=""></a>
                </td>

                <td data-title="Product" class="product-name">
                    <a href="#"><strong>{{values['name']|capitalize}}</strong><br/><small>{{ values['category']|capitalize }}</small></a>
                </td>

                <td data-title="Price" class="product-price">
                    <span class="amount">&#8358;{{values['price']}}</span>
                </td>

                <td data-title="Quantity" class="product-quantity">
                    <div class="quantity buttons_added">
                        <input type="button" class="minus" value="-">
                        <label>Quantity:</label>
                        <input type="number" size="4" class="input-text qty text" title="Qty" value="{{values['qty']}}" name="" max="29" min="0" step="1">
                        <input type="button" class="plus" value="+">
                    </div>
                </td>

                <td data-title="Total" class="product-subtotal">
                    <span class="amount">&#8358;{{values['qty']*values['price']}}.00</span>
                </td>
            </tr>
            {% endfor %}
            <tr>
                <td class="actions" colspan="6">

                    

                    <button type="button" class="button" id="updateBtn"><strong>Update Button</strong></button>

                    <div class="wc-proceed-to-checkout">

                        <a class="checkout-button button alt wc-forward" href="{{url('account/?target=checkout')}}">Proceed to Checkout</a>
                    </div>

                </td>
            </tr>
        </tbody>
    </table>
</form>

<div class="cart-collaterals">

    <div class="cart_totals ">

        <h2>Cart Totals</h2>

        <table class="shop_table shop_table_responsive">

            <tbody>
                <tr class="cart-subtotal">
                    <th>Subtotal</th>
                    <td data-title="Subtotal"><span class="amount">&#8358;{{totalAmount}}</span></td>
                </tr>


                <tr class="shipping">
                    <th>Shipping</th>
                    <td data-title="Shipping">Flat Rate: <span class="amount">&#8358;300</span> <input type="hidden" class="shipping_method" value="international_delivery" id="shipping_method_0" data-index="0" name="shipping_method[0]">

                    </td>
                </tr>

                <tr class="order-total">
                    <th>Total</th>
                    <td data-title="Total"><strong><span class="amount">&#8358;{{totalAmount+300}}</span></strong> </td>
                </tr>
            </tbody>
        </table>

        <div class="wc-proceed-to-checkout">
            <a class="checkout-button button alt wc-forward" href="#">Proceed to Checkout</a>
        </div>
    </div>

{% else %}
    Empty Basket
{% endif %}

</div>
</div>
</div>

</article>
		
	</div><!-- .container -->
</div><!-- #content -->
{% endblock %}