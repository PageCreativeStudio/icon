<?php
/**
 * Orders
 *
 * Shows orders on the 'my-orders' endpoint with a custom card layout for Processing and Completed orders, including quote_data.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.5.0
 */

defined('ABSPATH') || exit;

$customer_orders = $args['customer_orders'];
$has_orders = $args['has_orders'];

do_action('woocommerce_before_account_orders', $has_orders); ?>

<div class="container-fluid mx-auto max-100 px-0 text-left pt-0 pt-lg-0 pb-5 pb-lg-5">
	<div class="borderbottom font-18 font-mb-16 mb-lg-0 py-3">
		<div class="d-flex flex-wrap justify-content-between">
			<div>
				<h2 class="text-black font-25 font-mb-20"> My orders <span class="font-13">
						(<?php echo esc_html(count($customer_orders)); ?> items)
					</span>
				</h2>
			</div>
			<div class="d-none d-lg-block">
				<p class="font-16 mb-0">Need Help? 0207 183 8431 </p>
				<a href="mailto:sales@iconprinting.com" class="font-15 mb-0">sales@iconprinting.com</a>
			</div>
		</div>
	</div>
</div>

<?php if ($has_orders): ?>

	<!--<h2><?php esc_html_e('My Orders', 'woocommerce'); ?> (<?php echo esc_html(count($customer_orders)); ?> items)</h2>-->

	<div class="woocommerce-orders-cards">
		<?php
		foreach ($customer_orders as $customer_order) {
			$order = wc_get_order($customer_order); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
			$order_id = $order->get_order_number();
			$status = $order->get_status();
			$total = $order->get_formatted_order_total();
			$tracking = get_post_meta($order->get_id(), 'tracking_number', true) ?: 'N/A';
			$payment_status = $order->get_payment_method_title() ? 'PAID' : 'PENDING';
			$shipping_status = $status === 'completed' ? 'Shipped' : 'Processing';
			$items = $order->get_items();
			?>
			<div class="woocommerce-order-card">
				<div class="order-header">
					Payment Status: <span
						class="payment-status text-ter <?php echo esc_attr($payment_status === 'PAID' ? 'paid' : 'pending'); ?>">
						<?php echo esc_html($payment_status); ?>
					</span> |
					<span>Order no: <span class="text-ter"><?php echo esc_html($order_id); ?></span></span> |
					<span>Shipping Status: <span class="text-ter"><?php echo esc_html($shipping_status); ?></span></span> |
					<span>Tracking Number: <a class="text-ter"
							href="https://example.com/track?number=<?php echo esc_attr($tracking); ?>"
							target="_blank"><?php echo esc_html($tracking); ?></a></span>
				</div>
				<div class="order-content">
					<?php foreach ($items as $item_id => $item):

						if (!is_a($item, 'WC_Order_Item_Product')) {
							continue;
						}

						$product = $item->get_product();

						if (!$product) {
							continue;
						}

						$thumbnail = $product->get_image();
						$product_permalink = get_permalink($product->get_id());
						$quote_data = get_post_meta($item->get_id(), 'quote_data', true);
						?>


						<div class="order-item">
							<div class="col-12 col-md-2 product-thumbnail align-self-start">
								<?php
								echo $product_permalink
									? '<a href="' . esc_url($product_permalink) . '">' . $thumbnail . '</a>'
									: $thumbnail;
								?>
							</div>
							<div class="order-details">
								<h3><?php echo esc_html($item->get_name()); ?></h3>
								<p>Product Details: <a href="#" class="toggle-details">show details</a></p>
								<div class="quote-details" style="display: none;">
									<?php if ($quote_data && is_array($quote_data)):
										$item_data = [];
										$colour = $quote_data['colour'] ?? '';
										$size_quantities = $quote_data['size_quantities'] ?? [];
										$print_areas = $quote_data['print_areas'] ?? [];
										$print_techniques = $quote_data['print_techniques'] ?? [];
										$technique_options = $quote_data['technique_options'] ?? [];

										if (!empty($colour)) {
											$item_data[] = [
												'key' => __('Material Colour', 'your-text-domain'),
												'value' => esc_html($colour),
											];
										}

										if (!empty($size_quantities) && is_array($size_quantities)) {
											$sizes = [];
											foreach ($size_quantities as $size => $quantity) {
												if ($quantity > 0) {
													$sizes[] = esc_html($size . ': ' . $quantity);
												}
											}
											if (!empty($sizes)) {
												$item_data[] = [
													'key' => __('Print Quantity', 'your-text-domain'),
													'value' => implode(', ', $sizes),
												];
											}
										}

										if (!empty($print_areas) && !empty($print_techniques)) {
											$print_details = [];
											foreach ($print_areas as $print_area) {
												$print_area_key = strtolower($print_area);
												if (!isset($print_techniques[$print_area_key]))
													continue;
												$print_technique = $print_techniques[$print_area_key];
												$print_technique_key = strtolower($print_technique);
												$current_technique_options = $technique_options[$print_area_key][$print_technique_key] ?? '';
												$print_details[] = esc_html("$print_area: $print_technique" . ($current_technique_options ? " ($current_technique_options)" : ''));
											}
											if (!empty($print_details)) {
												$item_data[] = [
													'key' => __('Print Details', 'woocommerce'),
													'value' => implode(', ', $print_details),
												];
											}
										}

										if (!empty($quote_data['logo_url'])) {
											$item_data[] = [
												'key' => __('Logo', 'your-text-domain'),
												'value' => '<a href="' . esc_url($quote_data['logo_url']) . '" target="_blank">' . __('View Logo', 'your-text-domain') . '</a>',
											];
										}

										if (!empty($item_data)):
											echo '<ul>';
											foreach ($item_data as $data) {
												echo '<li><strong>' . esc_html($data['key']) . ':</strong> ' . wp_kses_post($data['value']) . '</li>';
											}
											echo '</ul>';
										else:
											echo '<p>' . esc_html__('No quote details available.', 'woocommerce') . '</p>';
										endif;
									else:
										echo '<p>' . esc_html__('No quote details available.', 'woocommerce') . '</p>';
									endif;
									?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					<div class="order-total py-4 px-3 px-lg-4">
						<span class="font-18">Total <?php echo wp_kses_post($total); ?></span>
						<a href="<?php echo esc_url($order->get_view_order_url()); ?>"
							class="download-details text-black font-14">
							<svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
								<path
									d="M3.07812 16.7676V19.0176C3.07812 19.6143 3.31518 20.1866 3.73713 20.6086C4.15909 21.0305 4.73139 21.2676 5.32812 21.2676H18.8281C19.4249 21.2676 19.9972 21.0305 20.4191 20.6086C20.8411 20.1866 21.0781 19.6143 21.0781 19.0176V16.7676M16.5781 12.2676L12.0781 16.7676M12.0781 16.7676L7.57812 12.2676M12.0781 16.7676V3.26758"
									stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
							Download Order Details</a>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>

	<script>
		document.addEventListener('DOMContentLoaded', function () {
			document.querySelectorAll('.toggle-details').forEach(function (link) {
				link.addEventListener('click', function (e) {
					e.preventDefault();
					const details = this.parentElement.querySelector('.quote-details');
					details.style.display = details.style.display === 'block' ? 'none' : 'block';
					this.textContent = details.style.display === 'block' ? 'hide details' : 'show details';
				});
			});
		});
	</script>

	<style>
		.woocommerce-orders-cards {
			display: flex;
			flex-direction: column;
			gap: 20px;
			margin-top: 20px;
		}

		.woocommerce-order-card {
			border: 1px solid #E1E1E1;
			border-radius: 10px;
			padding: 0;
		}

		.order-header {
			display: flex;
			gap: 15px;
			flex-wrap: wrap;
			background: #333333;
			color: #fff;
			padding: 16px 14px 14px;
			border-radius: 10px 10px 0 0;
			align-items: center;
			font-size: 14px;
			letter-spacing: 0.2px;
		}

		.order-content {
			display: flex;
			flex-direction: column;
			gap: 15px;
		}

		.order-item {
			display: flex;
			gap: 15px;
			align-items: center;
		}

		.order-image {
			width: 100px;
			height: auto;
		}

		.order-details h3 {
			margin: 0 0 5px;
			font-size: 1.2em;
		}

		.quote-details ul {
			list-style: none;
			padding: 0;
			margin: 5px 0 0;
		}

		.quote-details li {
			margin-bottom: 5px;
		}

		.order-total {
			margin-left: auto;
			text-align: right;
		}

	</style>

<?php else: ?>

	<?php wc_print_notice(esc_html__('No processing or completed orders found.', 'woocommerce') . ' <a class="woocommerce-Button wc-forward button" href="' . esc_url(apply_filters('woocommerce_return_to_shop_redirect', wc_get_page_permalink('shop'))) . '">' . esc_html__('Browse products', 'woocommerce') . '</a>', 'notice'); ?>

<?php endif; ?>

<?php do_action('woocommerce_after_account_orders', $has_orders); ?>