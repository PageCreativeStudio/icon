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
                <div class="stickytop">
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

            <div class="col-12 col-lg pl-lg-5 pt-3 pt-lg-0">
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
                    $terms = get_the_terms($product_id, 'pa_colours');
                    $variation_data = [];
                    foreach ($variations as $variation) {
                        $attributes = $variation['attributes'];
                        if (isset($attributes['attribute_pa_colour'])) {
                            $slug = $attributes['attribute_pa_colour'];
                            $variation_data[$slug] = [
                                'price_html' => $variation['price_html'],
                                'display_price' => $variation['display_price'],
                                'variation_id' => $variation['variation_id']
                            ];
                        }
                    }
                    ?>

                    <?php if (!empty($terms)): ?>
                        <div class="colour-attributes borderbottom py-4 mt-1">
                            <p class="text-black font-15 mb-0 pb-3">Choose a colour:</p>
                            <div class="d-flex flex-wrap color-variants-container">
                                <?php foreach ($terms as $term):
                                    $slug = $term->slug;
                                    $color = strtolower(str_replace(['(', ')', '.', ',', ' '], '', $term->name));
                                    $data = $variation_data[$slug] ?? null;
                                    ?>
                                    <div class="color-variant mr-2 mb-2" data-color="<?php echo esc_attr($slug); ?>"
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
</div>

<section>
    <div class="container-fluid mx-auto px-md-4">
        <div class="row">
        <?php
global $product;

// Get categories of current product
$product_cats = wc_get_product_term_ids($product->get_id(), 'product_cat');

$args = array(
    'post_type'      => 'product',
    'posts_per_page' => 12,
    'post__not_in'   => array($product->get_id()), // Exclude current product
    'tax_query'      => array(
        array(
            'taxonomy' => 'product_cat',
            'field'    => 'term_id',
            'terms'    => $product_cats,
        ),
    ),
);

$related_query = new WP_Query($args);

if ($related_query->have_posts()) :
?>
    <div class="related__slider owl-carousel owl-theme">
        <?php while ($related_query->have_posts()) : $related_query->the_post();
            $related_product = wc_get_product(get_the_ID());
        ?>
            <div class="col-12 pb-3 px-1 px-lg-2">
                <div class="productcard__container text-center">

                    <div class="d-block position-relative">
                        <a href="<?php the_permalink(); ?>">
                            <div class="product-image position-relative">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"
                                    class="" loading="lazy">
                            </div>
                        </a>
                        <span class="quickquote" data-title="<?php the_title(); ?>">Quick Quote</span>
                    </div>

                    <div class="d-flex flex-wrap justify-content-center pb-1 pt-3">
                        <?php
                        $max_to_show = 6;
                        $count = 0;
                        $terms = get_the_terms($related_product->get_id(), 'pa_colours');

                        if (!empty($terms) && !is_wp_error($terms)) {
                            foreach ($terms as $term) {
                                if ($count >= $max_to_show)
                                    break;

                                $colour_name = $term->name;
                                $css_colour = strtolower(str_replace(['(', ')', '.', ',', ' '], '', $colour_name));

                                echo '<div class="available-colors" title="' . esc_attr($colour_name) . '" style="background-color:' . esc_attr($css_colour) . ';"></div>';

                                $count++;
                            }

                            if (count($terms) > $max_to_show) {
                                echo '<div title="More Colours" class="d-flex more-colour align-items-center justify-content-center">+</div>';
                            }
                        }
                        ?>
                    </div>

                    <a href="<?php the_permalink(); ?>">
                        <h3 class="font-17 font-mb-15 mb-0 pb-0 pb-lg-1 pt-2"><?php the_title(); ?></h3>
                    </a>

                    <?php
                    $description = wp_strip_all_tags(get_the_content());
                    if (!empty($description)) :
                    ?>
                        <p class="product-excerpt font-14 font-mb-12 text-gray mb-0 pb-1 pb-lg-1">
                            <?php echo wp_trim_words($description, 4, '...'); ?>
                        </p>
                    <?php endif; ?>

                    <a href="<?php the_permalink(); ?>">
                        <p class="text-black font-15 font-mb-13">
                            From
                            <?php
                            if ($related_product->is_type('variable')) {
                                $prices = $related_product->get_variation_prices();
                                $min_price = min($prices['price']);
                                echo wc_price($min_price);
                            } else {
                                echo $related_product->get_price_html();
                            }
                            ?>
                            /<span class="text-gray font-14">unit</span>
                        </p>
                    </a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>

        </div>
</section>

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