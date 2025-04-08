<?php
/**
 * Custom Single Product Template
 * This is a completely custom layout for displaying product details.
 */

defined( 'ABSPATH' ) || exit;  // Exit if accessed directly.

global $product;
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'custom-product', $product ); ?>>
    <div class="container py-5">
        <div class="row">
            <!-- Left Column: Product Images -->
            <div class="col-md-6">
                <div class="product-images">
                    <?php
                    // WooCommerce Product Images (gallery and main image)
                    do_action( 'woocommerce_before_single_product_summary' );
                    ?>
                </div>
            </div>

            <!-- Right Column: Product Details -->
            <div class="col-md-6">
                <div class="product-details">
                    <h1 class="product-title"><?php the_title(); ?></h1>

                    <!-- Product Price -->
                    <div class="product-price">
                        <?php
                        // Display product price
                        do_action( 'woocommerce_single_product_summary' );
                        ?>
                    </div>

                    <!-- Add to Cart Form -->
                    <div class="add-to-cart">
                        <?php
                        // Add to cart button
                        do_action( 'woocommerce_single_product_summary' );
                        ?>
                    </div>

                    <!-- Product Description -->
                    <div class="product-description mt-3">
                        <?php
                        // Display product excerpt/short description
                        echo wpautop( $product->get_short_description() );
                        ?>
                    </div>

                    <!-- Product Attributes (e.g., Colour) -->
                    <div class="product-attributes mt-3">
                        <?php
                        // Display the colour attribute if it exists
                        $terms = get_the_terms( get_the_ID(), 'pa_colour' );
                        if ( $terms && ! is_wp_error( $terms ) ) {
                            echo '<strong>Colour:</strong><br>';
                            foreach ( $terms as $term ) {
                                echo '<span class="badge bg-primary mr-2">' . esc_html( $term->name ) . '</span>';
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
                do_action( 'woocommerce_after_single_product_summary' );
                ?>
            </div>
        </div>

    </div>
</div>
