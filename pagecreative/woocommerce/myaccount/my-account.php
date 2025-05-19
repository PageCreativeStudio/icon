<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
do_action( 'woocommerce_account_navigation' ); ?>


<div class="w-100 container-fluid max-100 mx-auto px-2 px-md-4 mx-auto text-left pb-5">
	<?php
		/**
		 * My Account content.
		 *
		 * @since 2.6.0
		 */
		do_action( 'woocommerce_account_content' );
	?>
</div>



<section class="pt-5 pt-lg-5 pb-0 pb-lg-0">
    <div class="container-fluid max-100 mx-auto px-2 px-md-4 pb-5 text-left">
        <div class="font-15 singlecontent bordertop pt-4 mt-5">
                <p class="font-16 pt-3 max-25 "><strong>Not finding what you’re looking for? </strong></p>
                <p class="max-25">Can’t find what you’re looking for or need some assistance? Call us on&nbsp;<strong>0207 183 8431</strong>&nbsp;or&nbsp;send us an email.</p>
        </div>
    </div>
</section>


<!--<section class="pt-5 pt-lg-5 pb-0 pb-lg-0">
    <div class="container-fluid mx-auto px-md-4 pb-5 text-center">
        <h2 class="text-black font-22 font-mb-20 text-center mb-0 pb-4 pb-lg-4 mb-lg-2">
            Our Best Sellers
        </h2>

        <div class="row pb-lg-5 mx-lg-0">
            <?php
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => -1,   
                'post_status' => 'publish',
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) : ?>
                <div class="related__slider owl-carousel owl-theme">
                    <?php while ($query->have_posts()) : $query->the_post();
                        // Get product details
                        $product = wc_get_product(get_the_ID());
                        if (!$product) continue;

                        $product_id = $product->get_id();
                        $product_title = get_the_title($product_id);
                        $product_link = get_permalink($product_id);
                        $product_image = get_the_post_thumbnail_url($product_id, 'medium');
                        $product_description = wp_strip_all_tags(get_post_field('post_content', $product_id));
                        ?>
                        <div class="col-12 pb-3 px-0">
                            <div class="productcard__container text-center">

                                <div class="d-block position-relative">
                                    <a href="<?php echo esc_url($product_link); ?>">
                                        <div class="product-image position-relative">
                                            <?php if ($product_image): ?>
                                                <img src="<?php echo esc_url($product_image); ?>"
                                                    alt="<?php echo esc_attr($product_title); ?>" loading="lazy">
                                            <?php else: ?>
                                                <img src="<?php echo wc_placeholder_img_src(); ?>" alt="No image available"
                                                    loading="lazy">
                                            <?php endif; ?>
                                        </div>
                                    </a>
                                </div>

                                <a href="<?php echo esc_url($product_link); ?>">
                                    <h3 class="font-17 font-mb-15 mb-0 pb-0 pb-lg-1 pt-3 mt-1">
                                        <?php echo esc_html($product_title); ?>
                                    </h3>
                                </a>

                                <?php if (!empty($product_description)): ?>
                                    <p class="product-excerpt font-14 font-mb-12 text-gray mb-0 pb-1 pb-lg-1">
                                        <?php echo wp_trim_words($product_description, 6, '...'); ?>
                                    </p>
                                <?php endif; ?>

                                <a href="<?php echo esc_url($product_link); ?>">
                                    <p class="text-black font-15 font-mb-13">
                                        From
                                        <?php
                                        if ($product->is_type('variable')) {
                                            $min_price = $product->get_variation_price('min', true);
                                            echo wc_price($min_price);
                                        } else {
                                            echo $product->get_price_html();
                                        }
                                        ?>
                                        /<span class="text-gray font-14">unit</span>
                                    </p>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; wp_reset_postdata(); ?>
        </div>
    </div>
</section>-->
