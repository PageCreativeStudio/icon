<?php
$product = get_query_var('product');
?>

<div class="product-images-container">
    <div class="featured-image">
        <?php if (has_post_thumbnail()): ?>
            <div class="main-image">
                <?php
                $thumbnail_id = get_post_thumbnail_id();
                $srcset = wp_get_attachment_image_srcset($thumbnail_id, 'full');
                $sizes = wp_get_attachment_image_sizes($thumbnail_id, 'full');
                echo wp_get_attachment_image($thumbnail_id, 'full', false, array('srcset' => $srcset, 'sizes' => $sizes));
                ?>
            </div>
        <?php else: ?>
            <img src="path-to-default-image.jpg" alt="No gallery image" class="default-featured-image">
        <?php endif; ?>

        <div class="featured-image-arrows">
            <button class="prev-featured-image" aria-label="Previous Featured Image">&#10094;</button>
            <button class="next-featured-image" aria-label="Next Featured Image">&#10095;</button>
        </div>
    </div>

    <?php if ($product->get_gallery_image_ids()): ?>
        <div class="product-gallery owl-carousel">
            <?php
            $attachment_ids = $product->get_gallery_image_ids();
            foreach ($attachment_ids as $attachment_id):
                $image_link = wp_get_attachment_url($attachment_id);
                $image_srcset = wp_get_attachment_image_srcset($attachment_id, 'full');
                $image_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
                if (empty($image_alt)) {
                    $image_alt = get_the_title();
                }
                ?>
                <div class="gallery-item">
                    <img src="<?php echo esc_url($image_link); ?>" srcset="<?php echo esc_attr($image_srcset); ?>"
                        alt="<?php echo esc_attr($image_alt); ?>">
                </div>
            <?php endforeach; ?>

            <!-- Featured Image as Part of the Carousel -->
            <div class="gallery-item featured-image-item">
                <?php
                echo wp_get_attachment_image($thumbnail_id, 'full', false, array('srcset' => $srcset, 'sizes' => $sizes));
                ?>
            </div>
        </div>
    <?php endif; ?>
</div>