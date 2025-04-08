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
            <div class="col-12 col-lg-6">
            <div class="product-images-container">
    <div class="featured-image">
        <?php if (has_post_thumbnail()) : ?>
            <div class="main-image" id="main-product-image">
                <?php the_post_thumbnail('full'); ?>
            </div>
        <?php endif; ?>
        
        <div class="featured-image-arrows">
            <button class="prev-featured-image">&#10094;</button>
            <button class="next-featured-image">&#10095;</button>
        </div>
    </div>

    <?php if ($product->get_gallery_image_ids()) : ?>
        <div class="product-gallery owl-carousel">
            <?php
            // Add featured image to gallery
            if (has_post_thumbnail()) : 
                $post_thumbnail_id = get_post_thumbnail_id();
                $gallery_html = wp_get_attachment_image($post_thumbnail_id, 'thumbnail');
                echo '<div class="gallery-item" data-id="' . esc_attr($post_thumbnail_id) . '">' . $gallery_html . '</div>';
            endif;
            
            // Add gallery images
            foreach ($product->get_gallery_image_ids() as $attachment_id) :
                $gallery_html = wp_get_attachment_image($attachment_id, 'thumbnail');
                echo '<div class="gallery-item" data-id="' . esc_attr($attachment_id) . '">' . $gallery_html . '</div>';
            endforeach;
            ?>
        </div>
    <?php endif; ?>
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