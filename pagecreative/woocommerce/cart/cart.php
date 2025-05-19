<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.9.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_cart'); ?>

<div class="container-fluid mx-auto max-100 px-3 px-lg-4 mx-auto text-left pt-3 pt-lg-4"
  aria-label="<?php esc_html_e('Account pages', 'woocommerce'); ?>">
  <div class="bordertop borderbottom font-18 font-mb-16 mb-lg-3 py-2">
    <ul class="d-flex flex-wrap">
      <?php foreach (wc_get_account_menu_items() as $endpoint => $label): ?>
        <li class="<?php echo wc_get_account_menu_item_classes($endpoint); ?> pl-2 pr-2 py-2">
          <a class="pr-2" href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>" <?php echo wc_is_current_account_menu_item($endpoint) ? 'aria-current="page"' : ''; ?>>
            <?php echo esc_html($label); ?>
          </a> |
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>


<div class="container-fluid mx-auto max-100 px-3 px-lg-4 mx-auto text-left pt-3 pt-lg-5">
  <div class="borderbottom font-18 font-mb-16 mb-lg-3 py-3">
    <div class="d-flex flex-wrap justify-content-between">
      <div>
        <h2 class="text-black font-25 font-mb-20"> Your Custom Quotes <span class="font-13">
            (<?php echo count(WC()->cart->get_cart()); ?> items) </span> </h2>
      </div>
      <div class="d-none d-lg-block">
        <p class="font-16 mb-0">Need Help? 0207 183 8431 </p>
        <a href="mailto:sales@iconprinting.com" class="font-15 mb-0">sales@iconprinting.com</a>
      </div>
    </div>
  </div>
</div>

<section>
  <div class="container-fluid mx-auto max-100 px-3 px-lg-4 mx-auto text-left pt-5">
    <div class="row justify-content-between">
      <div class="col-12 col-lg-7 order-2 order-lg-1">
        <form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
          <?php do_action('woocommerce_before_cart_table'); ?>

          <div class="woocommerce-cart-form__contents">
            <?php do_action('woocommerce_before_cart_contents'); ?>

            <?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item):
              $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
              $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
              $product_name = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);
              if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)):
                $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                ?>

                <div
                  class="cart-item card br-10 mb-4 mb-lg-5 px-0 py-0 px-lg-5 py-lg-4 border woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">
                  <div class="row align-items-center py-3 px-3">

                    <div class="col-12 col-lg-2 product-thumbnail pl-lg-0 pr-lg-4 align-self-start">
                      <?php
                      $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
                      echo $product_permalink ? '<a href="' . esc_url($product_permalink) . '">' . $thumbnail . '</a>' : $thumbnail;
                      ?>
                    </div>

                    <div class="col-12 col-lg-10 product-name px-3 pb-4 pb-lg-0">
                      <div class="d-grid d-md-flex justify-content-between align-items-center">
                        <div>
                          <?php
                          echo $product_permalink
                            ? sprintf('<a class="font-22 font-mb-20 text-black pb-2 pt-2 pt-lg-0 pb-lg-0 d-inline-block" href="%s">%s</a>', esc_url($product_permalink), $_product->get_name())
                            : $product_name;
                          ?>
                        </div>
                        <div class="font-18 font-mb-16 text-black">
                          From <?php echo WC()->cart->get_product_price($_product); ?>/unit
                        </div>
                      </div>

                      <h6 class="font-15 pt-3 text-black borderbottom pb-2 mb-0">Product Details:</h6>
                      <?php
                      if (!$product_permalink) {
                        echo wp_kses_post($product_name . '&nbsp;');
                      } else {
                        /**
                         * This filter is documented above.
                         *
                         * @since 2.1.0
                         */
                        echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a class="d-none" href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
                      }

                      do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

                      // Meta data.
                      echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.
                  
                      // Backorder notification.
                      if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
                        echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>', $product_id));
                      }
                      ?>

                    </div>

                    <!-- Optional: Quantity, Price, Remove (as buttons/fields in next column) -->
                  </div>
                </div>

              <?php endif; endforeach; ?>

            <?php do_action('woocommerce_cart_contents'); ?>

            <!-- Coupon + Update cart actions -->
            <!--<div class="cart-actions mt-4">
                        <div class="row">
                          <div class="col-lg-6">
                            <?php if (wc_coupons_enabled()): ?>
                              <div class="form-inline">
                                <label for="coupon_code" class="sr-only"><?php esc_html_e('Coupon:', 'woocommerce'); ?></label>
                                <input type="text" name="coupon_code" class="form-control mr-2" id="coupon_code" placeholder="<?php esc_attr_e('Coupon code', 'woocommerce'); ?>">
                                <button type="submit" class="btn btn-primary" name="apply_coupon"><?php esc_html_e('Apply coupon', 'woocommerce'); ?></button>
                              </div>
                              <?php do_action('woocommerce_cart_coupon'); ?>
                            <?php endif; ?>
                          </div>
                          <div class="col-lg-6 text-right">
                            <button type="submit" class="btn btn-secondary" name="update_cart"><?php esc_html_e('Update cart', 'woocommerce'); ?></button>
                            <?php do_action('woocommerce_cart_actions'); ?>
                            <?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
                          </div>
                        </div>
                      </div>-->

            <?php do_action('woocommerce_after_cart_contents'); ?>
          </div>

          <?php do_action('woocommerce_after_cart_table'); ?>
        </form>
      </div>
      <div class="col-12 col-lg-4 order-1 order-lg-2 pb-4">
        <div class="stickytop pt-2">
          <?php
          /**
           * Cart collaterals hook.
           *
           * @hooked woocommerce_cross_sell_display
           * @hooked woocommerce_cart_totals - 10
           */
          do_action('woocommerce_cart_collaterals');
          ?>
        </div>
      </div>
    </div>
    <?php do_action('woocommerce_before_cart_collaterals'); ?>
    <?php do_action('woocommerce_after_cart'); ?>
  </div>
</section>


<section class="pt-5 pt-lg-5 pb-0 pb-lg-0">
  <div class="container-fluid max-100 mx-auto px-2 px-lg-4 pb-5 text-left">
    <div class="font-15 singlecontent bordertop pt-4 mt-5">
      <p class="font-16 pt-3 max-25 "><strong>Not finding what you’re looking for? </strong></p>
      <p class="max-25">Can’t find what you’re looking for or need some assistance? Call us on&nbsp;<strong>0207 183
          8431</strong>&nbsp;or&nbsp;send us an email.</p>
    </div>
  </div>
</section>