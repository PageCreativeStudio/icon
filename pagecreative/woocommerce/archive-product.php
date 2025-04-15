<?php
defined( 'ABSPATH' ) || exit;

get_header( 'shop' ); ?>

<main class="container my-5">
    <h1 class="mb-4"><?php woocommerce_page_title(); ?></h1>

    <?php do_action( 'woocommerce_before_main_content' ); ?>

    <?php if ( woocommerce_product_loop() ) : ?>

        <?php do_action( 'woocommerce_before_shop_loop' ); ?>

        <div class="row">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="col-md-4 mb-4">
                    <?php wc_get_template_part( 'content', 'product' ); ?>
                </div>
            <?php endwhile; ?>
        </div>

        <?php do_action( 'woocommerce_after_shop_loop' ); ?>

    <?php else : ?>
        <?php do_action( 'woocommerce_no_products_found' ); ?>
    <?php endif; ?>

    <?php do_action( 'woocommerce_after_main_content' ); ?>
</main>

<?php get_footer( 'shop' ); ?>
