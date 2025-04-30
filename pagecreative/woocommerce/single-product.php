<?php
/**
 * Custom Single Product Page
 * This page is responsible for calling the custom template for products.
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   
    <div class="entry-content">
        <?php
        while (have_posts()):
            the_post();
            wc_get_template_part('woocommerce/content', 'single-product');
        endwhile;
        ?>
    </div>

    <footer class="entry-footer">
        <?php pagecreative_entry_footer(); ?>
    </footer>
</article><?php the_ID(); ?>

<?php get_footer(); ?>