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
        <!-- Featured Image -->
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="main-image">
                <?php 
                // Display the main featured image with srcset for responsive images
                $thumbnail_id = get_post_thumbnail_id();
                $srcset = wp_get_attachment_image_srcset($thumbnail_id, 'full');
                $sizes = wp_get_attachment_image_sizes($thumbnail_id, 'full');
                echo wp_get_attachment_image($thumbnail_id, 'full', false, array('srcset' => $srcset, 'sizes' => $sizes)); 
                ?>
            </div>
        <?php else: ?>
            <img src="path-to-default-image.jpg" alt="No gallery image" class="default-featured-image"> <!-- Fallback image if no gallery -->
        <?php endif; ?>
        
        <!-- Arrows around Featured Image -->
        <div class="featured-image-arrows">
            <button class="prev-featured-image" aria-label="Previous Featured Image">&#10094;</button>
            <button class="next-featured-image" aria-label="Next Featured Image">&#10095;</button>
        </div>
    </div>

    <?php if ( $product->get_gallery_image_ids() ) : ?>
        <!-- Product Gallery (Only show if gallery images exist) -->
        <div class="product-gallery owl-carousel">
            <?php
            // Get the product gallery images
            $attachment_ids = $product->get_gallery_image_ids();
            foreach ( $attachment_ids as $attachment_id ) :
                $image_link = wp_get_attachment_url( $attachment_id ); // Get image URL
                $image_srcset = wp_get_attachment_image_srcset($attachment_id, 'full'); // Get srcset for responsive images
                ?>
                <div class="gallery-item">
                    <img src="<?php echo esc_url( $image_link ); ?>" srcset="<?php echo esc_attr($image_srcset); ?>" alt="Product Image">
                </div>
            <?php endforeach; ?>
            
            <!-- Featured Image as last gallery item -->
            <div class="gallery-item featured-image-item">
                <?php 
                // Display the main featured image as the last item
                echo wp_get_attachment_image($thumbnail_id, 'full', false, array('srcset' => $srcset, 'sizes' => $sizes)); 
                ?>
            </div>
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