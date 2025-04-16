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
        <div class="row pt-lg-3">
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
                            <div class="col-6 col-md-4 col-xl-3 pb-3">
                                <div class="productcard__container text-center">

                                <div class="d-block position-relative">
                                    <a class="" href="<?php the_permalink(); ?>">
                                        <div class="product-image position-relative">
                                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"
                                                class="" loading="lazy">
                                        </div>
                                    </a>
                                    <span class="quickquote" data-title="<?php the_title(); ?>">Quick Quote</span>
                                </div>

                                    <div class="d-flex flex-wrap justify-content-center pb-1 pt-3">
                                        <!-- <?php
                                        $attributes = $product->get_attributes();
                                        $max_to_show = 6;
                                        $count = 0;
                                        if (isset($attributes['colour'])) {
                                            $colour_values = $attributes['colour']->get_options();
                                            $colour_values = array_map('trim', $colour_values);
                                            $color_map = [
                                                'black' => '#000000',
                                                'white' => '#ffffff',
                                                'light beige (sand)' => '#f5f5dc',
                                                'burgundy' => '#800020',
                                                'bright blue' => '#0096ff',
                                                'dark navy' => '#000080',
                                                'sage green' => '#9dc183',
                                                'melange grey' => '#a9a9a9',
                                            ];
                                            foreach ($colour_values as $colour_name) {
                                                if ($count >= $max_to_show)
                                                    break;
                                                $slug = strtolower($colour_name);
                                                $bg_color = $color_map[$slug] ?? '#ccc';

                                                echo '<div class="available-colors" title="' . esc_attr($colour_name) . '" style="background:' . esc_attr($bg_color) . ';"></div>';
                                                $count++;
                                            }

                                            if (count($colour_values) > $max_to_show) {
                                                echo '<div title="More Colours" class="d-flex more-colour align-items-center justify-content-center" style="font-size:14px;">+</div>';
                                            }
                                        }
                                        ?>-->
                                    </div>

                                    <a href="<?php the_permalink(); ?>">
                                        <h3 class="font-17 font-mb-16 mb-0 pb-1 pt-2"><?php the_title(); ?></h3>
                                    </a>

                                    <?php
                                    $description = wp_strip_all_tags(get_the_content());
                                    if (!empty($description)): ?>
                                        <p class="product-excerpt font-14 text-gray mb-0 pb-2">
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
                        echo 'No product found.';
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="quickquote__opener">
    <div class="max-40 bg-white py-4 px-4">
        <span class="closedrawer">&times;</span>
        <h2 class="quote-title font-20"><?php the_title(); ?></h2>
    </div>
</div>

<?php get_template_part('template-parts/blocks/social-logos'); ?>

<?php get_template_part('template-parts/blocks/testimonials'); ?>


<?php get_footer(); ?>