<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>

<div class="container-fluid mx-auto max-100 px-2 px-md-4 mx-auto text-left pb-5 pt-3 pt-lg-4" aria-label="<?php esc_html_e( 'Account pages', 'woocommerce' ); ?>">
    <div class="bordertop borderbottom font-18 font-mb-16 mb-lg-3 py-3">
        <ul class="accountnavigation d-grid d-md-flex flex-wrap">
    		<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
    			<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?> pl-2 pr-2">
    				<a class="pr-2" href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>" <?php echo wc_is_current_account_menu_item( $endpoint ) ? 'aria-current="page"' : ''; ?>>
    					<?php echo esc_html( $label ); ?>
    				</a> |
    			</li>
    		<?php endforeach; ?>
    	</ul>
    </div>
</div>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
