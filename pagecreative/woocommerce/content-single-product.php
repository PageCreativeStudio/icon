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
                        <p class="font-16 font-mb-14 mb-0">Continental ICP-01</p>
                        <p class="font-16 font-mb-14 mb-0">SKU25365</p>
                    </div>
                    <h1 class="font-30 font-mb-25 my-2"><?php the_title(); ?></h1>
                    <h2 class="font-18">From £4.80/unit</h2>
                </div>

                <!-- Colour Attributes (Clickable with background color) -->
                <div class="colour-attributes borderbottom py-4 mt-1">
                    <?php
                    // Get the 'pa_colour' attribute terms
                    $terms = get_the_terms(get_the_ID(), 'pa_colour');
                    if ($terms && !is_wp_error($terms)) {
                        echo '<p class="text-black mb-0 pb-2">Choose a colour:</p>';
                        echo '<div class="d-flex flex-wrap">';
                        foreach ($terms as $term) {
                            // Get the term meta for background colour (you may have set this in your attributes)
                            $colour = get_term_meta($term->term_id, 'pa_colour', true); // Assumes you have a custom field for the background color of the term
                            ?>
                            <!-- Color Variant Button (Clickable) -->
                            <button class="colour-option btn mr-2 mb-2"
                                style="background-color: <?php echo esc_attr($colour); ?>;"
                                data-colour="<?php echo esc_attr($term->slug); ?>"
                                aria-label="Choose Colour: <?php echo esc_attr($term->name); ?>"
                                onclick="changeColour('<?php echo esc_js($term->slug); ?>')">
                                <?php echo esc_html($term->name); ?>
                            </button>
                            <?php
                        }
                        echo '</div>';
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