<section class="pt-3">
    <div class="container-fluid mx-auto px-md-4 pb-5 text-center">
        <?php if ($slider_title = get_field('products_slider_title')): ?>
            <h2 class="text-black font-22 font-mb-20 text-center mb-0 pb-4 pb-lg-4 mb-lg-2">
                <?php echo esc_html($slider_title); ?>
            </h2>
        <?php endif; ?>

        <div class="row pb-lg-5 mx-lg-0">
            <?php
            $selected_products = get_field('product_to_show');

            if (!empty($selected_products)): ?>
                <div class="related__slider owl-carousel owl-theme">
                    <?php foreach ($selected_products as $product_post):
                        if (!($product_post instanceof WP_Post)) continue;
                        
                        $product = wc_get_product($product_post->ID);
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
                                                <img src="<?php echo esc_url($product_image); ?>" alt="<?php echo esc_attr($product_title); ?>" loading="lazy">
                                            <?php else: ?>
                                                <img src="<?php echo wc_placeholder_img_src(); ?>" alt="No image available" loading="lazy">
                                            <?php endif; ?>
                                        </div>
                                    </a>
                                </div>

                                <a href="<?php echo esc_url($product_link); ?>">
                                    <h3 class="font-17 font-mb-15 mb-0 pb-0 pb-lg-1 pt-3 mt-1"><?php echo esc_html($product_title); ?></h3>
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
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
