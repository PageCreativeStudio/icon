<?php
defined('ABSPATH') || exit;

$current_user_id = get_current_user_id();

// Fetch "pending payment" or custom status orders
$customer_orders = wc_get_orders([
    'customer_id' => $current_user_id,
    'status'      => ['pending'], // Or your custom quote status like 'quote-approved'
    'limit'       => -1,
]);

if (!empty($customer_orders)) :
    foreach ($customer_orders as $order):
        foreach ($order->get_items() as $item_id => $item):
            $product = $item->get_product();
            $product_permalink = $product->is_visible() ? $product->get_permalink() : '';
            ?>
            <div class="cart-item card br-10 mb-4 mb-lg-5 px-0 py-0 px-lg-5 py-lg-4 border">
                <div class="row align-items-center py-3 px-3">
                    <div class="col-12 col-lg-2 product-thumbnail">
                        <?php echo $product_permalink ? '<a href="' . esc_url($product_permalink) . '">' . $product->get_image() . '</a>' : $product->get_image(); ?>
                    </div>
                    <div class="col-12 col-lg-10 product-name px-3">
                        <h4 class="font-22"><?php echo esc_html($product->get_name()); ?></h4>
                        <p class="font-16">Qty: <?php echo esc_html($item->get_quantity()); ?></p>
                        <p class="font-16">Total: <?php echo wc_price($item->get_total()); ?></p>
                        <p class="font-16">Order ID: <strong>#<?php echo esc_html($order->get_id()); ?></strong></p>
                    </div>
                </div>
            </div>
            <?php
        endforeach;
    endforeach;
else:
    echo '<p>No completed quotes found pending payment.</p>';
endif;
?>
