<?php
<p>Custom Cart</p>
foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
    $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
    $item_data = apply_filters('woocommerce_get_item_data', [], $cart_item);
    ?>
    <tr class="woocommerce-cart-form__cart-item">
        <td class="product-name">
            <?php echo apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key); ?>
            <?php
            foreach ($item_data as $data) {
                echo '<dl><dt>' . esc_html($data['key']) . ':</dt><dd>' . wp_kses_post($data['value']) . '</dd></dl>';
            }
            ?>
        </td>
        <!-- Other columns -->
    </tr>
<?php } ?>