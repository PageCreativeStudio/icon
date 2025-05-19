<?php
/**
 * Shipping Methods Display
 *
 * In 2.1 we show methods per package. This allows for multiple methods per order if so desired.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-shipping.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.8.0
 */

defined( 'ABSPATH' ) || exit;

$formatted_destination    = isset( $formatted_destination ) ? $formatted_destination : WC()->countries->get_formatted_address( $package['destination'], ', ' );
$has_calculated_shipping  = ! empty( $has_calculated_shipping );
$show_shipping_calculator = ! empty( $show_shipping_calculator );
$calculator_text          = '';
?>
<div class="woocommerce-shipping-totals shipping mb-0">
	<div class="row">
		<div class="col-12 mb-2 text-black font-16 pt-2">
			Choose a delivery option:
		</div>
		<div class="col-12">
			<?php if ( ! empty( $available_methods ) && is_array( $available_methods ) ) : ?>
				<div class="form-group">
					<select name="shipping_method[<?php echo esc_attr( $index ); ?>]" class="form-control shipping_method" data-index="<?php echo esc_attr( $index ); ?>" id="shipping_method_select_<?php echo esc_attr( $index ); ?>">
						<?php foreach ( $available_methods as $method ) : ?>
							<option value="<?php echo esc_attr( $method->id ); ?>" <?php selected( $method->id, $chosen_method ); ?>>
								<?php echo wc_cart_totals_shipping_method_label( $method ); ?>
							</option>
						<?php endforeach; ?>
					</select>
				</div>

				<?php foreach ( $available_methods as $method ) : ?>
					<?php do_action( 'woocommerce_after_shipping_rate', $method, $index ); ?>
				<?php endforeach; ?>

				<?php if ( is_cart() ) : ?>
					<!--<p class="woocommerce-shipping-destination">
						<?php
						if ( $formatted_destination ) {
							printf( esc_html__( 'Shipping to %s.', 'woocommerce' ) . ' ', '<strong>' . esc_html( $formatted_destination ) . '</strong>' );
							$calculator_text = esc_html__( 'Change address', 'woocommerce' );
						} else {
							echo wp_kses_post( apply_filters( 'woocommerce_shipping_estimate_html', __( 'Shipping options will be updated during checkout.', 'woocommerce' ) ) );
						}
						?>
					</p>-->
				<?php endif; ?>

			<?php elseif ( ! $has_calculated_shipping || ! $formatted_destination ) : ?>
				<?php
				if ( is_cart() && 'no' === get_option( 'woocommerce_enable_shipping_calc' ) ) {
					echo wp_kses_post( apply_filters( 'woocommerce_shipping_not_enabled_on_cart_html', __( 'Shipping costs are calculated during checkout.', 'woocommerce' ) ) );
				} else {
					echo wp_kses_post( apply_filters( 'woocommerce_shipping_may_be_available_html', __( 'Enter your address to view shipping options.', 'woocommerce' ) ) );
				}
				?>
			<?php elseif ( ! is_cart() ) : ?>
				<?php echo wp_kses_post( apply_filters( 'woocommerce_no_shipping_available_html', __( 'There are no shipping options available. Please ensure that your address has been entered correctly, or contact us if you need any help.', 'woocommerce' ) ) ); ?>
			<?php else : ?>
				<?php
				echo wp_kses_post(
					apply_filters(
						'woocommerce_cart_no_shipping_available_html',
						sprintf( esc_html__( 'No shipping options were found for %s.', 'woocommerce' ) . ' ', '<strong>' . esc_html( $formatted_destination ) . '</strong>' ),
						$formatted_destination
					)
				);
				$calculator_text = esc_html__( 'Enter a different address', 'woocommerce' );
				?>
			<?php endif; ?>

			<?php if ( $show_package_details ) : ?>
				<p class="woocommerce-shipping-contents"><small><?php echo esc_html( $package_details ); ?></small></p>
			<?php endif; ?>

			<?php if ( $show_shipping_calculator ) : ?>
				<?php woocommerce_shipping_calculator( $calculator_text ); ?>
			<?php endif; ?>
		</div>
	</div>
</div>
