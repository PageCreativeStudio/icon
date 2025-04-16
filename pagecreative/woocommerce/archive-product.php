<?php
/**
 * Template Name: Shop
 */

get_header(); ?>



<div class="shop__container container-fluid mx-auto px-md-4 pt-3 pb-4 pb-lg-5 mb-lg-5 ">
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
                <div class="row px-2 px-lg-0">
                    <?php
                    if (have_posts()):
                        while (have_posts()):
                            the_post();
                            global $product;
                            ?>
                            <div class="col-6 col-md-4 col-xl-3 pb-3 px-1 px-lg-2">
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
                                        <h3 class="font-17 font-mb-15 mb-0 pb-0 pb-lg-1 pt-2"><?php the_title(); ?></h3>
                                    </a>

                                    <?php
                                    $description = wp_strip_all_tags(get_the_content());
                                    if (!empty($description)): ?>
                                        <p class="product-excerpt font-14 font-mb-12 text-gray mb-0 pb-1 pb-lg-1">
                                            <?php echo wp_trim_words($description, 5, '...'); ?>
                                        </p>
                                    <?php endif; ?>

                                    <a href="<?php the_permalink(); ?>">
                                        <p class="text-black font-15 font-mb-13">
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
                        echo '';
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
        <h2 class="quote-title font-25 font-mb-20 mb-0"><?php the_title(); ?></h2>
    </div>
</div>

<div class="faq__container">
    <div class="container-fluid mx-auto text-center px-md-4 pt-3 pb-4 pb-lg-5 mb-lg-5">
        <h2 class="font-30 font-mb-25">Frequently asked questions</h2>
        <div class="product__toggle py-5 d-block d-lg-none mb-4 mb-lg-0">

            <div class="acf-collapsibles">
                <?php if (have_rows('collaspsibles_repeater')): ?>
                    <?php while (have_rows('collaspsibles_repeater')):
                        the_row(); ?>
                        <div class="acf-toggle-item text-left">
                            <h3 class="toggle-header font-16"><?php echo get_sub_field('title'); ?></h3>
                            <div class="toggle-content">
                                <div class="pt-3 pb-4">
                                    <?php echo get_sub_field('content'); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php get_template_part('template-parts/blocks/social-logos'); ?>

<?php get_template_part('template-parts/blocks/testimonials'); ?>


<?php get_footer(); ?>