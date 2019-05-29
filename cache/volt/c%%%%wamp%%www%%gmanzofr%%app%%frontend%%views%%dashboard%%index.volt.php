<article class="page type-page status-publish hentry">
					<header class="entry-header"><h1 itemprop="name" class="entry-title">Checkout</h1></header><!-- .entry-header -->

					<form enctype="multipart/form-data" action="#" class="checkout woocommerce-checkout" method="post" name="checkout">
	<div id="customer_details" class="col2-set">
		<div class="col-1">
			<div class="woocommerce-billing-fields">

				<h3>Billing Details</h3>

				<p id="billing_first_name_field" class="form-row form-row form-row-first validate-required"><label class="" for="billing_first_name">First Name <abbr title="required" class="required">*</abbr></label><input value="<?= $firstname ?>" placeholder="" id="billing_first_name" name="billing_first_name" class="input-text " type="text"></p>

				<p id="billing_last_name_field" class="form-row form-row form-row-last validate-required"><label class="" for="billing_last_name">Last Name <abbr title="required" class="required">*</abbr></label><input value="<?= $lastname ?>" placeholder="" id="billing_last_name" name="billing_last_name" class="input-text " type="text"></p><div class="clear"></div>

				<p id="billing_email_field" class="form-row form-row form-row-first validate-required validate-email"><label class="" for="billing_email">Email Address <abbr title="required" class="required">*</abbr></label><input value="<?= $email ?>" placeholder="" id="billing_email" name="billing_email" class="input-text " type="email"></p>

				<p id="billing_phone_field" class="form-row form-row form-row-last validate-required validate-phone"><label class="" for="billing_phone">Phone <abbr title="required" class="required">*</abbr></label><input value="<?= $phone ?>" placeholder="" id="billing_phone" name="billing_phone" class="input-text " type="text"></p><div class="clear"></div>

				<p id="billing_country_field" class="form-row form-row form-row-wide validate-required"><label class="" for="billing_date_time">Delivery Time <abbr title="required" class="required">*</abbr></label><input placeholder="DateTime Delivery" id="billing_datetime_delivery" name="billing_datetime_delivery" class="input-text datetimepicker1" type="text"></p><div class="clear"></div>

				<p id="billing_address_1_field" class="form-row form-row form-row-wide address-field validate-required"><label class="" for="billing_address_1">Address <abbr title="required" class="required">*</abbr></label><input placeholder="Street address" id="billing_address_1" name="billing_address_1" class="input-text " type="text"></p>

				<p id="billing_city_field" class="form-row form-row form-row-wide address-field validate-required" data-o_class="form-row form-row form-row-wide address-field validate-required"><label class="" for="billing_city">Town / City <abbr title="required" class="required">*</abbr></label><input placeholder="Town / City" id="billing_city" name="billing_city" class="input-text " type="text"></p>


				

			</div>
		</div>

		<div class="col-2">
			<h3>Your Order(s)</h3>
			<div class="woocommerce-shipping-fields">
				<table class="shop_table woocommerce-checkout-review-order-table">
			<thead>
				<tr>
					<th class="product-name">Product</th>
					<th class="product-total">Total</th>
				</tr>
			</thead>
			<tbody>
                            <?php if ($this->session->has('cart_item')) { ?>
                            <?php foreach ($this->session->get('cart_item') as $keys => $values) { ?>
				<tr class="cart_item">
					<td class="product-name">
						<?= ucwords($values['name']) ?>&nbsp;
						<strong class="product-quantity">× <?= $values['qty'] ?></strong>													</td>
					<td class="product-total">
						<span class="amount">&#8358;<?= $values['price'] ?></span>
					</td>
				</tr>
                            <?php } ?>
                            <?php } ?>
			</tbody>
			<tfoot>

				<tr class="cart-subtotal">
					<th>Subtotal</th>
					<td><span class="amount">&#8358;<?= $subtotal ?></span></td>
				</tr>

				<tr class="shipping">
					<th>Delivery</th>
					<td data-title="Delivery">Flat Rate: <span class="amount">&#8358;300.00</span> <input class="shipping_method" value="international_delivery" id="shipping_method_0" data-index="0" name="shipping_method[0]" type="hidden"></td>
				</tr>

				<tr class="order-total">
					<th>Total</th>
					<td><strong><span class="amount">&#8358;<?= $totalWithD ?></span></strong> </td>
				</tr>
			</tfoot>
		</table>

			</div>
		</div>
	</div>

	<div class="woocommerce-checkout-review-order" id="order_review">
		<input type="hidden" id="totalToPay" value="<?= $totalWithD ?>" />
		<div class="woocommerce-checkout-payment" id="payment">
			<ul class="wc_payment_methods payment_methods methods">
				<li class="wc_payment_method payment_method_bacs">
					<input data-order_button_text="" checked="checked" value="dbt" name="payment_method" class="input-radio" id="payment_method_bacs" type="radio">
					<label for="payment_method_bacs">Pay with Paystack</label>
				</li>

				<li class="wc_payment_method payment_method_cod">
					<input data-order_button_text="" value="cod" name="payment_method" class="input-radio" id="payment_method_cod" type="radio">

					<label for="payment_method_cod">Cash on Delivery</label>
					<div style="display:none;" class="payment_box payment_method_cod">
						<p>Pay with cash upon delivery.</p>
					</div>
				</li>
			</ul>
			<div class="form-row place-order">

			    <p class="form-row terms wc-terms-and-conditions">
					<input id="terms" name="terms" class="input-checkbox" type="checkbox">
					<input type="hidden" id="amountToPay" name="amount" value="<?= $intTotalWith ?>" />
			        <label class="checkbox" for="terms">I’ve read and accept the <a target="_blank" href="terms-and-conditions.html">terms &amp; conditions</a> <span class="required">*</span></label>
			        <input value="1" name="terms-field" type="hidden">
			    </p>

				<!--<input value="Pay" class="button alt" onclick="payWithPaystack()" id="placeOrderBtnR" type="button">-->
				<button class="button alt" type="button" id="placeOrderBtn"> Pay </button>
			</div>
		</div>
	</div>
</form>
				</article>