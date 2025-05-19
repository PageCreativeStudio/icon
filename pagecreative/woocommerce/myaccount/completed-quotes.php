<?php
/**
 * Completed quote Cart Page
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
                <h2 class="text-black font-25 font-mb-20"> Your Completed Quotes <span class="font-13">
                        (<?php echo count(WC()->cart->get_cart()); ?> items) </span> </h2>
            </div>
            <div class="d-none d-lg-block">
                <p class="font-16 mb-0">Need Help? 0207 183 8431 </p>
                <a href="mailto:sales@iconprinting.com" class="font-15 mb-0">sales@iconprinting.com</a>
            </div>
        </div>
    </div>
</div>




<section class="pt-5 pt-lg-5 pb-0 pb-lg-0">
    <div class="container-fluid max-100 mx-auto px-2 px-lg-4 pb-5 text-left">
        <div class="font-15 singlecontent bordertop pt-4 mt-5">
            <p class="font-18 pt-3 max-25 pb-2"><strong class="font-18">Not finding what you're looking for? </strong>
            </p>
            <p class="max-25">Can't find what you're looking for or need some assistance? Call us on&nbsp;<strong>0207
                    183
                    8431</strong>&nbsp;or&nbsp;send us an email.</p>
        </div>
    </div>
</section>