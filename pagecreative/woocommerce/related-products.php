<?php
global $product;

// Get categories of current product
$product_cats = wc_get_product_term_ids($product->get_id(), 'product_cat');

$args = array(
    'post_type' => 'product',
    'posts_per_page' => 12,
    'post__not_in' => array($product->get_id()), // Exclude current product
    'tax_query' => array(
        array(
            'taxonomy' => 'product_cat',
            'field' => 'term_id',
            'terms' => $product_cats,
        ),
    ),
);

$related_query = new WP_Query($args);

if ($related_query->have_posts()):
    ?>
    <div class="related__slider owl-carousel owl-theme">
        <?php while ($related_query->have_posts()):
            $related_query->the_post();
            $related_product = wc_get_product(get_the_ID());
            ?>
            <div class="col-12 pb-3 px-1 px-lg-2">
                <div class="productcard__container text-center">

                    <div class="d-block position-relative">
                        <a href="<?php the_permalink(); ?>">
                            <div class="product-image position-relative">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class=""
                                    loading="lazy">
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
                    if (!empty($description)):
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