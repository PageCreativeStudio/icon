<?php
/**
 * Checkout Form
 *
 * This template overrides the default WooCommerce checkout form to match the provided screenshot.
 *
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
    exit;
}

wc_print_notices();

do_action('woocommerce_before_checkout_form', $checkout);

// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
    echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
    return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

    <div class="checkout-container">
        <div class="checkout-left">
            <div class="checkout-header">
                <a href="#" class="back-link">←</a>
                <span>ICON Printing</span>
            </div>
            <div class="payment-summary">
                <h2>Payment of <span class="total-amount"><?php echo wc_price(WC()->cart->get_total('')); ?></span></h2>
                <?php
                foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                    $product = $cart_item['data'];
                    $product_name = $product->get_name();
                    $product_price = wc_price($cart_item['line_total']);
                    echo '<p>' . esc_html($product_name) . ' <span class="item-price">' . $product_price . '</span></p>';
                }
                ?>
                <hr>
                <p>Subtotal <span class="subtotal"><?php echo wc_price(WC()->cart->get_subtotal()); ?></span></p>
                <p>Tax <span class="tax"><?php echo wc_price(WC()->cart->get_taxes_total()); ?></span></p>
                <hr>
                <p>Total due today <span class="total-due"><?php echo wc_price(WC()->cart->get_total('')); ?></span></p>
            </div>
        </div>

        <div class="checkout-right">
            <h3>Contact Information</h3>
            <p>
                <label>Email</label>
                <input type="email" name="billing_email" value="<?php echo esc_attr($checkout->get_value('billing_email')); ?>" placeholder="john@gmail.com" required>
            </p>

            <h3>Payment method</h3>
            <div class="payment-method">
                <p>
                    <label>Card information</label>
                    <input type="text" name="card_number" placeholder="Enter text" required>
                </p>
                <div class="card-details">
                    <input type="text" name="card_expiry" placeholder="MM / YY" required>
                    <input type="text" name="card_cvc" placeholder="CVC" required>
                </div>
                <p class="card-logos">Accepted cards: <img src="https://via.placeholder.com/20x15?text=Visa" alt="Visa"> <img src="https://via.placeholder.com/20x15?text=MC" alt="Mastercard"> <img src="https://via.placeholder.com/20x15?text=Discover" alt="Discover"></p>
                <p>
                    <label>Cardholder name</label>
                    <input type="text" name="cardholder_name" placeholder="Full name on card" required>
                </p>
                <p>
                    <label>Country or region</label>
                    <select name="billing_country" required>
                        <option value="GB">United Kingdom</option>
                        <!-- Add more countries as needed -->
                    </select>
                </p>
                <p><label>Address line 1</label><input type="text" name="billing_address_1" required></p>
                <p><label>Address line 2</label><input type="text" name="billing_address_2"></p>
                <p><label>Suburb</label><input type="text" name="billing_city" required></p>
                <p><label>City</label><input type="text" name="billing_postcode" required></p>
                <p><label>State</label><select name="billing_state"><option value="">Select</option></select></p>
            </div>

            <?php do_action('woocommerce_checkout_before_order_review'); ?>

            <div class="payment-button">
                <button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Proceed to payment" data-value="Proceed to payment">Payment (£<?php echo WC()->cart->get_total(''); ?>)</button>
            </div>
        </div>
    </div>

    <?php do_action('woocommerce_checkout_after_order_review'); ?>

</form>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>

<style>

.checkout-container { display: flex; max-width: 1200px; margin: 0 auto; padding: 20px; font-family: Arial, sans-serif; }
.checkout-left { flex: 1; background: #333; color: white; padding: 20px; }
.checkout-header { display: flex; align-items: center; margin-bottom: 20px; }
.back-link { color: white; margin-right: 10px; text-decoration: none; }
.payment-summary h2 { font-size: 24px; margin-bottom: 20px; }
.payment-summary p { display: flex; justify-content: space-between; margin: 10px 0; }
.payment-summary .total-amount, .payment-summary .subtotal, .payment-summary .tax, .payment-summary .total-due { font-weight: bold; }
.payment-summary hr { border: 0; border-top: 1px solid #666; margin: 10px 0; }
.checkout-right { flex: 1; padding: 20px; background: #f9f9f9; }
.checkout-right h3 { margin-bottom: 10px; }
.checkout-right p { margin-bottom: 15px; }
.checkout-right label { display: block; margin-bottom: 5px; }
.checkout-right input, .checkout-right select { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
.card-details { display: flex; gap: 10px; }
.card-details input { flex: 1; }
.card-logos { margin-top: 5px; }
.card-logos img { margin-right: 5px; }
.payment-button { margin-top: 20px; }
.button.alt { display: block; width: 100%; padding: 10px; background: #333; color: white; border: none; border-radius: 5px; cursor: pointer; text-align: center; }
.button.alt:hover { background: #444; }
</style>
