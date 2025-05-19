<?php
/**
 * Custom Single Product Template
 * This is a completely custom layout for displaying product details.
 */

defined('ABSPATH') || exit;
global $product;
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class('custom-product', $product); ?>>
    <div class="container-fluid mx-auto px-md-4 mb-lg-5 pt-3 pt-lg-4">
        <div class="row">
            <div class="col-12 col-lg-6 max-50 pr-lg-5">
                <div class="">
                    <?php
                    set_query_var('product', $product);
                    get_template_part('woocommerce/image-gallery');
                    ?>
                    <div class="product__toggle py-5 d-none d-lg-block">
                        <?php if (have_rows('collaspsibles_repeater')): ?>
                            <div class="acf-collapsibles">
                                <?php while (have_rows('collaspsibles_repeater')):
                                    the_row(); ?>
                                    <div class="acf-toggle-item">
                                        <h3 class="toggle-header font-16"><?php echo esc_html(get_sub_field('title')); ?></h3>
                                        <div class="toggle-content">
                                            <div class="pt-3 pb-4">
                                                <?php echo get_sub_field('content'); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

            <div class="col-12 col-lg pl-lg-5 pt-3 pt-lg-0 pb-5 pb-lg-5">
                <div>
                    <?php
                    global $product;
                    $product_id = $product->get_id();
                    $variations = $product->is_type('variable') ? $product->get_available_variations() : [];
                    ?>

                    <div class="borderbottom pb-3">
                        <div class="d-flex flex-wrap justify-content-between pb-0">
                            <p class="font-15 font-mb-14 mb-0">Continental ICP-01</p>
                            <p class="font-15 font-mb-14 mb-0"><?php echo esc_html($product->get_sku()); ?></p>
                        </div>
                        <h1 class="font-30 font-mb-25 my-2 my-lg-3"><?php the_title(); ?></h1>
                        <h2 class="font-18 product-price">
                            <?php echo $product->get_price_html(); ?>
                        </h2>
                    </div>

                    <div class="borderbottom py-4">
                        <div class="inneritem">
                            <p class="text-black font-15 mb-0 pb-2">Product description</p>
                            <?php
                            $product = wc_get_product(get_the_ID());
                            $full_description = wp_strip_all_tags($product->get_description());
                            $words = explode(' ', $full_description);
                            $short = implode(' ', array_slice($words, 0, 54));
                            ?>

                            <div class="product-description font-14 py-1">
                                <div class="short-description font-14 py-1">
                                    <?php echo esc_html($short); ?>
                                    <?php if (count($words) > 54): ?>
                                        ... <button class="toggle-description font-14 underline d-block text-black p-0 mt-3"
                                            data-action="expand">Read more</button>
                                    <?php endif; ?>
                                </div>

                                <?php if (count($words) > 54): ?>
                                    <div class="full-description py-1 font-14" style="display: none;">
                                        <?php echo esc_html($full_description); ?>
                                        <button class="toggle-description font-14 underline d-block text-black p-0 mt-3"
                                            data-action="collapse">Read less</button>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <?php echo do_shortcode('[custom_product_fields]'); ?>
                
                    <?php if(get_field("collaspsibles_repeater")) : ?>
                        <div class="product__toggle py-5 d-block d-lg-none mb-4 mb-lg-0">
                            <?php if (have_rows('collaspsibles_repeater')): ?>
                                <div class="acf-collapsibles">
                                    <?php while (have_rows('collaspsibles_repeater')):
                                        the_row(); ?>
                                        <div class="acf-toggle-item">
                                            <h3 class="toggle-header font-16"><?php echo esc_html(get_sub_field('title')); ?></h3>
                                            <div class="toggle-content">
                                                <div class="pt-3 pb-4">
                                                    <?php echo get_sub_field('content'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>

<section>
    <div class="container-fluid mx-auto px-md-4 pb-5 text-center">
        <h2 class="text-black font-22 font-mb-18 text-center mb-0 pb-4 pb-lg-4 mb-lg-2">Similar Products</h2>
        <div class="row pb-lg-5 mx-lg-0">
            <?php
            get_template_part('woocommerce/related-products');
            ?>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/blocks/social-logos'); ?>

<div class="py-lg-3">
    <?php get_template_part('template-parts/blocks/testimonials'); ?>
</div>


<!--<div id="product-<?php the_ID(); ?>" <?php wc_product_class('custom-product', $product); ?>>
    <div class="container py-5">
        <div class="row">
        
            <div class="col-md-6">
                <div class="product-images">
                    <?php
                    // WooCommerce Product Images (gallery and main image)
//                 do_action('woocommerce_before_single_product_summary');
                    ?>
                </div>
            </div>

          
            <div class="col-md-6">
                <div class="product-details">
                    <h1 class="product-title"><?php the_title(); ?></h1>

                    <div class="product-price">
                        <?php
                        //                       do_action('woocommerce_single_product_summary');
                        ?>
                    </div>

                    <div class="product-description mt-3">
                        <?php
                        //                        echo wpautop($product->get_short_description());
                        ?>
                    </div>

                    <div class="product-attributes mt-3">
 //                       <?php
 //                       $terms = get_the_terms(get_the_ID(), 'pa_colour');
 //                       if ($terms && !is_wp_error($terms)) {
 //                           echo '<strong>Colour:</strong><br>';
 //                           foreach ($terms as $term) {
 //                               echo '<span class="badge bg-primary mr-2">' . esc_html($term->name) . '</span>';
 //                           }
 //                       }
 //                       ?>
                    </div>
                </div>
            </div>
        </div>

       
        <div class="row mt-5">
            <div class="col-12">
                <?php
                // WooCommerce Product Tabs (Reviews, Additional Information)
//                do_action('woocommerce_after_single_product_summary');
                ?>
            </div>
        </div>

    </div>
</div>