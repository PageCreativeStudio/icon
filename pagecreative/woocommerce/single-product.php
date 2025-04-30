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
    <header class="entry-header">
        <?php
        if (is_singular()):
            the_title('<h1 class="entry-title">', '</h1>');
        else:
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;

        if ('post' === get_post_type()):
            ?>
            <div class="entry-meta">
                <?php
                pagecreative_posted_on();
                pagecreative_posted_by();
                ?>
            </div>
        <?php endif; ?>
    </header>

    <?php pagecreative_post_thumbnail(); ?>

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