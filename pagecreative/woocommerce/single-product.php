<?php
/**
 * Custom Single Product Page
 * This page is responsible for calling the custom template for products.
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

// Trigger action before product content starts
//do_action( 'woocommerce_before_main_content' );

while (have_posts()):
    the_post();
    wc_get_template_part('woocommerce/content', 'single-product');
endwhile; // end of the loop

// Trigger action after product content ends
// do_action( 'woocommerce_after_main_content' );

get_template_part('template-parts/blocks/social-logos');
get_template_part('template-parts/blocks/testimonials');

'<div style="background: #ffc; padding: 1rem;">✅ social-logos.php loaded</div>'

get_footer(); ?>