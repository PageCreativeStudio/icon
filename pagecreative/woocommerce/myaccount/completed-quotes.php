<div class="container-fluid mx-auto max-100 px-0 text-left pt-0 pt-lg-0 pb-5 pb-lg-0">
    <div class="borderbottom font-18 font-mb-16 mb-lg-0 py-3">
        <div class="d-flex flex-wrap justify-content-between">
            <div>
                <h2 class="text-black font-25 font-mb-20"> Completed Quotes <span class="font-13">
                        (<?php
                        $pending_payment_count = 0;
                        foreach ($customer_orders as $order) {
                            if ($order->get_status() === 'pending') {
                                $pending_payment_count++;
                            }
                        }
                        echo esc_html($pending_payment_count); ?> items)
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

<?php
/**
 * Completed Quotes Template
 */
defined('ABSPATH') || exit;

$customer_orders = $args['customer_orders'];
$has_orders = $args['has_orders'];
$current_page = $args['current_page'];
$total_orders = $args['total_orders'];
$per_page = $args['per_page'];

if ($has_orders): ?>
    <!--<h2><?php esc_html_e('Completed Quotes', 'woocommerce'); ?></h2>-->
    <form id="completed-quotes-form" method="post" action="<?php echo esc_url(wc_get_checkout_url()); ?>">

        <div class="row justify-content-between">
            <div class="col-12 col-lg-7 order-2 order-lg-1">
                <h2 class="font-18 font-mb-16 text-black pt-3 pt-lg-5">Please confirm your order below before proceeding to
                    payment</h2>
                <p class="font-15 text-black pb-4 pb-lg-5">Select from the items below</p>
                <?php foreach ($customer_orders as $order): ?>
                    <!-- Container for each order -->
                    <div
                        class="woocommerce-orders-table woocommerce-table woocommerce-table--order-details shop_table order_details borderaround br-10 py-4 py-lg-5 mb-4 mb-lg-5">

                        <!-- Checkbox and order-level data (if needed) -->
                        <div class="row mb-0">
                            <div class="order__checkbox">
                                <span id="select-all-orders"></span>

                                <input type="checkbox" name="selected_orders[]"
                                    value="<?php echo esc_attr($order->get_id()); ?>" class="order-checkbox" />
                                <label class="text-white mb-0">Add item for payment</label>
                            </div>
                            <!--
                            <div class="col woocommerce-orders-table__cell">
                                <a href="<?php echo esc_url($order->get_view_order_url()); ?>">#<?php echo esc_html($order->get_order_number()); ?></a>
                            </div>
                            <div class="col woocommerce-orders-table__cell">
                                <?php echo esc_html(wc_format_datetime($order->get_date_created())); ?>
                            </div>-->
                        </div>

                        <?php foreach ($order->get_items() as $item_id => $item): ?>
                            <?php
                            if (!is_a($item, 'WC_Order_Item_Product'))
                                continue;

                            $product = $item->get_product();
                            if (!$product)
                                continue;

                            $thumbnail = $product->get_image();
                            $product_permalink = get_permalink($product->get_id());

                            $quote_data = $item->get_meta('quote_data', true);
                            ?>

                            <div class="woocommerce-orders-table__row align-items-center py-2 px-3 px-lg-4 pt-lg-4">
                                <div class="row mx-0 justify-content-between">
                                    <!-- Product Thumbnail -->
                                    <div class="col-12 col-lg-2 product-thumbnail align-self-start px-0 px-lg-3 pt-4 pt-lg-0 ">
                                        <?php
                                        echo $product_permalink
                                            ? '<a href="' . esc_url($product_permalink) . '">' . $thumbnail . '</a>'
                                            : $thumbnail;
                                        ?>
                                    </div>

                                    <!-- Product Quote Details -->
                                    <div class="col-12 col-lg-6 quote-details borderbottom px-0 pb-3 pb-lg-5">
                                        <span
                                            class="font-22 font-mb-20 text-black pt-3 pb-2"><?php echo esc_html($item->get_name()); ?></span>
                                        <p class="font-15 pt-1 text-black borderbottom pb-2">Product Details:</p>

                                        <?php
                                        if ($quote_data && is_array($quote_data)) {
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

                                            // Separate Print Quantity Block
                                            $print_quantity_block = '';
                                            if (!empty($size_quantities) && is_array($size_quantities)) {
                                                $sizes = [];
                                                foreach ($size_quantities as $size => $quantity) {
                                                    if ($quantity > 0) {
                                                        $sizes[] = esc_html($size . ': ' . $quantity);
                                                    }
                                                }
                                                if (!empty($sizes)) {
                                                    // Also keep in item_data
                                                    $item_data[] = [
                                                        'key' => __('Print Quantity', 'your-text-domain'),
                                                        'value' => implode(', ', $sizes),
                                                    ];

                                                    $print_quantity_block = '<div class="quote-data-list d-flex flex-wrap justify-content-between pt-2 borderbottom pb-2 mb-3">';
                                                    $print_quantity_block .= '<div class="quote-data-key font-15 text-black w-50">' . __('Print Quantity', 'your-text-domain') . ':</div>';
                                                    $print_quantity_block .= '<div class="quote-data-value font-14 text-black w-50">' . implode(', ', $sizes) . '</div>';
                                                    $print_quantity_block .= '</div>';
                                                }
                                            }

                                            // Separate Print Details Block
                                            $print_details_block = '';
                                            $print_details_data = [];
                                            if (!empty($print_areas) && !empty($print_techniques)) {
                                                foreach ($print_areas as $print_area) {
                                                    $print_area_key = strtolower($print_area);
                                                    if (!isset($print_techniques[$print_area_key]))
                                                        continue;

                                                    $print_technique = $print_techniques[$print_area_key];
                                                    $print_technique_key = strtolower($print_technique);
                                                    $current_technique_options = $technique_options[$print_area_key][$print_technique_key] ?? '';

                                                    if (!empty($current_technique_options)) {
                                                        $print_details_data[] = [
                                                            'area' => $print_area,
                                                            'value' => "$print_technique ($current_technique_options)"
                                                        ];
                                                    } else {
                                                        $print_details_data[] = [
                                                            'area' => $print_area,
                                                            'value' => $print_technique
                                                        ];
                                                    }
                                                }

                                                if (!empty($print_details_data)) {
                                                    // Also keep in item_data
                                                    $details_flat = [];
                                                    foreach ($print_details_data as $detail) {
                                                        $details_flat[] = esc_html($detail['area'] . ': ' . $detail['value']);
                                                    }

                                                    $item_data[] = [
                                                        'key' => __('Print Details', 'woocommerce'),
                                                        'value' => implode(', ', $details_flat),
                                                    ];

                                                    $print_details_block .= '<div class="quote-data-list d-flex flex-wrap justify-content-between">';
                                                    foreach ($print_details_data as $detail) {
                                                        $print_details_block .= '<div class="quote-data-key font-15 text-black w-50">' . esc_html($detail['area']) . ':</div>';
                                                        $print_details_block .= '<div class="quote-data-value font-14 text-black w-50">' . esc_html($detail['value']) . '</div>';
                                                    }
                                                    $print_details_block .= '</div>';
                                                }
                                            }

                                            if (!empty($quote_data['logo_url'])) {
                                                $item_data[] = [
                                                    'key' => __('Logo', 'your-text-domain'),
                                                    'value' => '<a href="' . esc_url($quote_data['logo_url']) . '" target="_blank">' . __('View Logo', 'your-text-domain') . '</a>',
                                                ];
                                            }

                                            // Output separated blocks
                                            echo $print_quantity_block;
                                            echo $print_details_block;

                                            if (!empty($item_data)) {
                                                echo '<div class="quote-data-list d-flex flex-wrap justify-content-between">';
                                                foreach ($item_data as $data) {
                                                    echo '<div class="quote-data-key font-15 text-black w-50">' . esc_html($data['key']) . ':</div>';
                                                    echo '<div class="quote-data-value font-14 text-black w-50">' . wp_kses_post($data['value']) . '</div>';
                                                }
                                                echo '</div>';
                                            } else {
                                                echo '<p>' . esc_html__('No quote details available.', 'woocommerce') . '</p>';
                                            }
                                        } else {
                                            echo '<p>' . esc_html__('No quote details available.', 'woocommerce') . '</p>';
                                        }
                                        ?>
                                    </div>



                                    <div class="col-12 col-lg-3 woocommerce-orders-table__cell text-end align-self-start px-0">
                                        <?php if ($item_id === array_key_first($order->get_items())): ?>
                                            <div class="font-20 font-mb-18 text-black pt-2 pt-lg-0 totalprice">
                                                Total: <?php echo $order->get_formatted_order_total(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>




                <?php if ($args['paginate']): ?>
                    <div class="woocommerce-pagination mt-3">
                        <?php
                        echo paginate_links([
                            'base' => esc_url(add_query_arg('paged', '%#%')),
                            'format' => '? noxiouspaged=%#%',
                            'current' => $current_page,
                            'total' => ceil($total_orders / $per_page),
                        ]);
                        ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-12 col-lg-4 order-1 order-lg-2 pb-4 pt-lg-5">
                <div class="actions stickytop cart_totals bg-lightgray br-10 px-3 px-lg-5 py-4 py-lg-5 mt-lg-4">
                    <h2 class="font-25 font-mb-22">Overview</h2>
                    <?php
                    // Initialise totals
                    $selected_orders_total = 0;
                    $selected_orders_shipping = 0;
                    $selected_orders_vat = 0;
                
                    if (!empty($customer_orders)) {
                        foreach ($customer_orders as $order) {
                            // Only count if order is pending payment
                            if ($order->has_status('pending')) {
                                $selected_orders_total += (float) $order->get_subtotal();
                                $selected_orders_shipping += (float) $order->get_shipping_total();
                                $selected_orders_vat += (float) $order->get_total_tax();
                            }
                        }
                    }
                
                    $grand_total = $selected_orders_total + $selected_orders_shipping + $selected_orders_vat;
                    ?>
                
                    <?php if ($grand_total > 0): ?>
                        <div class="quote-totals font-15 text-black mb-3">
                
                            <div class="d-flex flex-wrap justify-content-between pb-2">
                                <span class="text-black font-15 mb-0">Total (Items):</span>
                                <span class="text-black font-15 mb-0" id="total-subtotal"><?php echo wc_price($selected_orders_total); ?></span>
                            </div>
                
                            <div class="d-flex flex-wrap justify-content-between pb-2">
                                <span class="text-black font-15 mb-0">Delivery:</span>
                                <span class="text-black font-15 mb-0" id="total-shipping"><?php echo wc_price($selected_orders_shipping); ?></span>
                            </div>
                
                            <div class="d-flex flex-wrap justify-content-between pb-2">
                                <span class="text-black font-15 mb-0">VAT:</span>
                                <span class="text-black font-15 mb-0" id="total-vat"><?php echo wc_price($selected_orders_vat); ?></span>
                            </div>
                
                            <div class="d-flex flex-wrap justify-content-between pb-2 border-top pt-2">
                                <span class="text-black font-16 mb-0">Grand Total:</span>
                                <span class="text-black font-16 mb-0" id="grand-total"><?php echo wc_price($grand_total); ?></span>
                            </div>
                
                        </div>
                    <?php else: ?>
                        <div class="text-muted mb-3">No pending payments found.</div>
                    <?php endif; ?>
                
                    <div class="text-end">
                        <button type="submit" class="button w-100 text-center" name="pay_selected_orders" id="pay-selected-orders" <?php echo $grand_total > 0 ? '' : 'disabled'; ?>>
                            <?php esc_html_e('Pay Now', 'woocommerce'); ?>
                        </button>
                    </div>
                </div>
        </div>
    </form>

<?php else: ?>
    <p><?php esc_html_e('No quotes pending approval found.', 'woocommerce'); ?></p>
<?php endif; ?>