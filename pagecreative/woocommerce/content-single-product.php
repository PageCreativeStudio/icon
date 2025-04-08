<?php
/**
 * Custom Single Product Template
 * This is a completely custom layout for displaying product details.
 */

defined( 'ABSPATH' ) || exit;  // Exit if accessed directly.

global $product;
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'custom-product', $product ); ?>>

</div>
