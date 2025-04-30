<?php if (get_field("product_to_show")): ?>
    <section class="pt-3">
        <div class="container-fluid mx-auto px-md-4 pb-5 text-center">
            <h2 class="text-black font-22 font-mb-20 text-center mb-0 pb-4 pb-lg-4 mb-lg-2">Related Products</h2>
            <div class="row pb-lg-5 mx-lg-0">
                <?php
                $selected_products = get_field('product_to_show');

                if ($selected_products): ?>
                    <div class="related__slider owl-carousel owl-theme">
                        <?php foreach ($selected_products as $post):
                            setup_postdata($post);
                            $related_product = wc_get_product(get_the_ID());
                            ?>
                            <div class="col-12 pb-3 px-0">
                                <div class="productcard__container text-center">

                                    <div class="d-block position-relative">
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="product-image position-relative">
                                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"
                                                    loading="lazy">
                                            </div>
                                        </a>
                                    </div>

                                    <a href="<?php the_permalink(); ?>">
                                        <h3 class="font-17 font-mb-15 mb-0 pb-0 pb-lg-1 pt-3 mt-1"><?php the_title(); ?></h3>
                                    </a>

                                    <?php
                                    $description = wp_strip_all_tags(get_the_content());
                                    if (!empty($description)): ?>
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
                        <?php endforeach; ?>
                    </div>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
    </section>
<?php endif; ?>