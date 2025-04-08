<?php
/**
 * Custom Single Product Template
 * This is a completely custom layout for displaying product details.
 */

defined('ABSPATH') || exit;

global $product;
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class('custom-product', $product); ?>>
    <div class="container-fluid mx-auto px-md-4">
        <div class="row">
            <div class="col-12 col-lg-6 max-50 pr-lg-5">
                <?php
                set_query_var('product', $product);
                get_template_part('woocommerce/image-gallery');
                ?>
            </div>

            <div class="col-12 col-lg pl-lg-5 pt-3 pt-lg-0">
                <div class="borderbottom pb-3">
                    <div class="d-flex flex-wrap justify-content-between pb-0">
                        <p class="font-15 font-mb-14 mb-0">Continental ICP-01</p>
                        <p class="font-15 font-mb-14 mb-0">SKU25365</p>
                    </div>
                    <h1 class="font-30 font-mb-25 my-2 my-lg-3"><?php the_title(); ?></h1>
                    <h2 class="font-18 product-price">
                        <?php
                        $product = wc_get_product(get_the_ID());
                        $variations = $product->get_available_variations();
                        $min_price = false;
                        foreach ($variations as $variation) {
                            $variation_price = $variation['display_price'];
                            if ($min_price === false || $variation_price < $min_price) {
                                $min_price = $variation_price;
                            }
                        }

                        if ($min_price !== false) {
                            echo 'From £' . number_format($min_price, 2) . '/unit';
                        } else {
                            echo 'From £4.80/unit';
                        }
                        ?>
                    </h2>
                </div>

                <div class="borderbottom py-4">
                    <div class="inneritem">
                        <p class="text-black font-15 mb-0 pb-2">Product description</p>
                        <?php
                        $product_description = get_the_content();

                        if (!empty($product_description)) {
                            echo '<div class="product-description font-14 pt-2">';

                            echo '<div class="short-description font-14 py-2">';
                            $words = explode(' ', $product_description);
                            $shortened = implode(' ', array_slice($words, 0, 54));
                            echo $shortened;
                            if (count($words) > 54) {
                                echo '... ';
                                echo '<button class="toggle-description font-14 underline d-inline-block text-black pt-2 mt-3" data-action="expand">Read more</button>';
                            }
                            echo '</div>';

                            if (count($words) > 54) {
                                echo '<div class="full-description font-14" style="display: none;">';
                                echo $product_description;
                                echo ' <button class="toggle-description font-14 underline d-inline-block text-black pt-2 mt-3" data-action="collapse">Read less</button>';
                                echo '</div>';
                            }

                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>

                <div class="colour-attributes borderbottom py-4 mt-1">
                    <?php
                    $terms = get_the_terms(get_the_ID(), 'pa_colour');
                    $product = wc_get_product(get_the_ID());
                    $variations = $product->get_available_variations();
                    $variation_data = array();

                    foreach ($variations as $variation) {
                        $attributes = $variation['attributes'];
                        $color_attribute = isset($attributes['attribute_pa_colour']) ? $attributes['attribute_pa_colour'] : '';
                        if ($color_attribute) {
                            $variation_data[$color_attribute] = array(
                                'price_html' => $variation['price_html'],
                                'display_price' => $variation['display_price'],
                                'variation_id' => $variation['variation_id']
                            );
                        }
                    }

                    if ($terms && !is_wp_error($terms)) {
                        echo '<p class="text-black font-15 mb-0 pb-2">Choose a colour:</p>';
                        echo '<div class="d-flex flex-wrap color-variants-container">';

                        foreach ($terms as $term) {
                            $color_value = get_term_meta($term->term_id, 'color', true);
                            $color_value = !empty($color_value) ? $color_value : $term->name;
                            $slug = $term->slug;

                            $price_html = isset($variation_data[$slug]) ? $variation_data[$slug]['price_html'] : '';
                            $display_price = isset($variation_data[$slug]) ? $variation_data[$slug]['display_price'] : '';
                            $variation_id = isset($variation_data[$slug]) ? $variation_data[$slug]['variation_id'] : '';

                            echo '<div class="color-variant mr-2 mb-2" 
                        data-color="' . esc_attr($slug) . '" 
                        data-price-html="' . esc_attr($price_html) . '" 
                        data-price="' . esc_attr($display_price) . '"
                        data-variation-id="' . esc_attr($variation_id) . '"
                        style="background-color: ' . esc_attr($color_value) . '; "
                        title="' . esc_attr($term->name) . '">
                        <span class="color-check" style="display: none; color: white;">✓</span>
                    </div>';
                        }

                        echo '</div>';
                        echo '<input type="hidden" name="variation_id" id="selected-variation-id" value="">';
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
</div>



<div id="product-<?php the_ID(); ?>" <?php wc_product_class('custom-product', $product); ?>>
    <div class="container py-5">
        <div class="row">
            <!-- Left Column: Product Images -->
            <div class="col-md-6">
                <div class="product-images">
                    <?php
                    // WooCommerce Product Images (gallery and main image)
                    do_action('woocommerce_before_single_product_summary');
                    ?>
                </div>
            </div>

            <!-- Right Column: Product Details -->
            <div class="col-md-6">
                <div class="product-details">
                    <h1 class="product-title"><?php the_title(); ?></h1>

                    <div class="product-price">
                        <?php
                        do_action('woocommerce_single_product_summary');
                        ?>
                    </div>

                    <div class="product-description mt-3">
                        <?php
                        echo wpautop($product->get_short_description());
                        ?>
                    </div>

                    <div class="product-attributes mt-3">
                        <?php
                        $terms = get_the_terms(get_the_ID(), 'pa_colour');
                        if ($terms && !is_wp_error($terms)) {
                            echo '<strong>Colour:</strong><br>';
                            foreach ($terms as $term) {
                                echo '<span class="badge bg-primary mr-2">' . esc_html($term->name) . '</span>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Tabs (Additional Information, Reviews, etc.) -->
        <div class="row mt-5">
            <div class="col-12">
                <?php
                // WooCommerce Product Tabs (Reviews, Additional Information)
                do_action('woocommerce_after_single_product_summary');
                ?>
            </div>
        </div>

    </div>
</div>