<?php
/**
 * Custom Single Product Template
 * This is a completely custom layout for displaying product details.
 */

defined('ABSPATH') || exit;
global $product;
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class('custom-product', $product); ?>>
    <div class="container-fluid mx-auto px-md-4 pb-lg-5 mb-lg-5">
        <div class="row">
            <div class="col-12 col-lg-6 max-50 pr-lg-5">
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

            <div class="col-12 col-lg pl-lg-5 pt-3 pt-lg-0">
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
                        <div class="product-description font-14 py-1">
                            <div class="short-description font-14 py-1">
                                <?php
                                $content = wp_strip_all_tags(apply_filters('the_content', get_the_content()));
                                $words = explode(' ', $content);
                                $short = implode(' ', array_slice($words, 0, 54));
                                echo esc_html($short);
                                ?>
                                <?php if (count($words) > 54): ?>
                                    ... <button class="toggle-description font-14 underline d-block text-black p-0 mt-3"
                                        data-action="expand">Read more</button>
                                <?php endif; ?>
                            </div>

                            <?php if (count($words) > 54): ?>
                                <div class="full-description py-1 font-14" style="display: none;">
                                    <?php echo esc_html($content); ?>
                                    <button class="toggle-description font-14 underline d-block text-black p-0 mt-3"
                                        data-action="collapse">Read less</button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <?php
$terms = get_the_terms($product_id, 'pa_colours'); // Fetching terms from attribute
$variation_data = [];

// Loop through variations and map data by attribute slug
foreach ($variations as $variation) {
    $attributes = $variation['attributes'];
    if (isset($attributes['attribute_pa_colour'])) {
        $slug = $attributes['attribute_pa_colour'];
        $variation_data[$slug] = [
            'price_html'     => $variation['price_html'],
            'display_price'  => $variation['display_price'],
            'variation_id'   => $variation['variation_id']
        ];
    }
}
?>

<?php if (!empty($terms)): ?>
    <div class="colour-attributes borderbottom py-4 mt-1">
        <p class="text-black font-15 mb-0 pb-2">Choose a colour:</p>
        <div class="d-flex flex-wrap color-variants-container">
            <?php foreach ($terms as $term):
                // Use the term name or slug as a colour fallback if no meta colour is set
                $slug = $term->slug;
                $color = strtolower(str_replace(['(', ')', '.', ',', ' '], '', $term->name));
                $data = $variation_data[$slug] ?? null;
                ?>
                <div class="color-variant mr-2 mb-2"
                    data-color="<?php echo esc_attr($slug); ?>"
                    data-price-html="<?php echo esc_attr($data['price_html'] ?? ''); ?>"
                    data-price="<?php echo esc_attr($data['display_price'] ?? ''); ?>"
                    data-variation-id="<?php echo esc_attr($data['variation_id'] ?? ''); ?>"
                    style="background-color: <?php echo esc_attr($color); ?>;"
                    title="<?php echo esc_attr($term->name); ?>">
                    <span class="color-check" style="display: none; color: white;">✓</span>
                </div>
            <?php endforeach; ?>
        </div>
        <input type="hidden" name="variation_id" id="selected-variation-id" value="">
    </div>
<?php endif; ?>



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
            </div>

        </div>
    </div>
</div>

<?php get_template_part('template-parts/blocks/social-logos'); ?>

<?php get_template_part('template-parts/blocks/testimonials'); ?>


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