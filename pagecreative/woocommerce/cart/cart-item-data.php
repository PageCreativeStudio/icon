<?php
/**
 * Cart item data (when outputting non-flat)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-item-data.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     2.4.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="variations pb-3 pb-lg-0">
    <?php foreach ( $item_data as $data ) : ?>
        <div class="variation-item mb-0 d-grid d-md-flex position-relative justify-content-between borderbottom">
            <p class="font-200 clicktoshow font-15 text-black mb-0 py-2">
                <?php echo wp_kses_post( $data['key'] ); ?>
            </p>
            <div class="contentshow">
                <?php echo wp_kses_post( wpautop( $data['display'] ) ); ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
