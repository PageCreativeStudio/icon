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
                            global $product;
                            ?>
                            <div class="col-md-6 col-md-4 col-lg-3 pb-3">
                                <div class="productcard__container text-center">
                                    <?php if (has_post_thumbnail()): ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="product-image">
                                                <?php the_post_thumbnail('full'); ?>
                                            </div>
                                        </a>
                                    <?php endif; ?>

                                    <?php
global $product;

if ( ! $product instanceof WC_Product ) {
    $product = wc_get_product( get_the_ID() );
}

$attribute_name = 'pa_color'; // make sure this is the exact slug from Attributes
$colors = wp_get_post_terms( $product->get_id(), $attribute_name );

if ( ! empty( $colors ) && ! is_wp_error( $colors ) ) {
    $max_display = 6;
    $displayed_colors = array_slice( $colors, 0, $max_display );
    $extra_count = count( $colors ) - $max_display;
    ?>
    
    <div class="product-colors d-flex align-items-center mt-2 flex-wrap">
        <?php foreach ( $displayed_colors as $term ): 
            $color_name = $term->name;
        ?>
            <div class="color-dot me-1 mb-1 rounded-circle" 
                title="<?php echo esc_attr( $color_name ); ?>"
                style="width: 16px; height: 16px; background-color: <?php echo esc_attr( strtolower( $color_name ) ); ?>; border: 1px solid #ccc;">
            </div>
        <?php endforeach; ?>

        <?php if ( $extra_count > 0 ): ?>
            <div class="color-dot more-colors ms-1 rounded-circle d-flex align-items-center justify-content-center"
                style="width: 16px; height: 16px; background-color: #f0f0f0; font-size: 10px; border: 1px solid #ccc;">
                +<?php echo $extra_count; ?>
            </div>
        <?php endif; ?>
    </div>
<?php } ?>



                                    <a href="<?php the_permalink(); ?>">
                                        <h3 class="font-16 mb-0 pb-1 pt-2"><?php the_title(); ?></h3>
                                    </a>

                                    <?php
                                    $description = wp_strip_all_tags(get_the_content());
                                    if (!empty($description)): ?>
                                        <p class="product-excerpt font-14 text-gray mb-0 pb-1">
                                            <?php echo wp_trim_words($description, 5, '...'); ?>
                                        </p>
                                    <?php endif; ?>



                                    <a href="<?php the_permalink(); ?>">
                                        <p class="text-black font-15">
                                            From
                                            <?php
                                            if ($product->is_type('variable')) {
                                                $prices = $product->get_variation_prices();
                                                $min_price = min($prices['price']);
                                                echo wc_price($min_price);
                                            } else {
                                                echo $product->get_price_html();
                                            }
                                            ?>/<span class="text-gray font-14">unit</span>
                                        </p>
                                    </a>
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