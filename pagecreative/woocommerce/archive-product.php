<?php
/**
 * Template Name: Shop
 */

get_header(); ?>


<div class="shop__container container-fluid mx-auto px-md-4 pt-3 pb-lg-5 mb-lg-5 ">
    <div class="bordertop">
        <div class="category__filter py-3 px-0">
            <?php
            $filter_shortcode2 = '[searchandfilter id="1102"]';
            $filter_html = do_shortcode($filter_shortcode2);
            echo $filter_html;
            ?>
        </div>
        <div class="row">
            <div class="col-12 col-lg-3 max-20">
                <div class="megafilter-group">
                    <h4 class="text-black font-18">Filter Products</h4>
                    <?php
                    $filter_shortcode = '[searchandfilter id="1102"]';
                    $filter_html = do_shortcode($filter_shortcode);
                    echo $filter_html;
                    ?>
                </div>
            </div>
            <div class="col-12 col-lg postsrow">
                <div class="row">
                    <?php
                    if (have_posts()):
                        while (have_posts()):
                            the_post();
                            global $product; // WooCommerce product object
                            ?>
                            <div class="col-md-6 col-md-4 col-lg-3">
                                <div class="productcard__container">
                                    <?php if (has_post_thumbnail()): ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="product-image">
                                                <?php the_post_thumbnail('full'); ?>
                                            </div>
                                        </a>
                                    <?php endif; ?>

                                    <h3 class="card-title"><?php the_title(); ?></h3>

                                    <!-- Excerpt with 5 words -->
                                    <p class="product-excerpt">
                                        <?php
                                        $description = wp_strip_all_tags($product->get_short_description());
                                        echo wp_trim_words($description, 5, '...');
                                        ?>
                                    </p>

                                    <!-- Display minimum price if variable -->
                                    <p>
                                        From
                                        <?php
                                        if ($product->is_type('variable')) {
                                            $prices = $product->get_variation_prices();
                                            $min_price = min($prices['price']);
                                            echo wc_price($min_price);
                                        } else {
                                            echo $product->get_price_html();
                                        }
                                        ?>
                                        /unit
                                    </p>
                                </div>
                            </div>
                            <?php
                        endwhile;

                        the_posts_navigation();
                    else:
                        echo 'No Product found.';
                    endif;
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom Bootstrap Layout for Shop Page -->
<div class="container-fluid px-0 mx-auto text-center">
    <!-- Optional: Display Page Content if needed -->
    <!--<div class="page-content">
                <?php
                while (have_posts()):
                    the_post();
                    the_content();
                endwhile;
                ?>
    </div>-->

    <!-- Custom Product Grid Layout with Bootstrap -->

    <!-- Optional: Pagination (if needed) -->
    <div class="pagination">
        <?php
        echo paginate_links(array(
            'total' => $product_query->max_num_pages
        ));
        ?>
    </div>
</div>

<?php get_footer(); ?>