<?php
/**
 * Template Name: Shop
 */

get_header(); ?>


<div class="mobfilter bg-white">
    <div class="text-left">
        <a class="closefilter text-right d-inline-block mb-4" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                <path d="M1 13L13 1M1 1L13 13" stroke="black" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </a>
    </div>
    <div class="d-grid filter-group">
        <div class="megafilter-group">
            <h4 class="text-black font-20">Filter Products</h4>
            <?php
            $filter_shortcode = '[searchandfilter id="1102"]';
            $filter_html = do_shortcode($filter_shortcode);
            echo $filter_html;
            ?>
        </div>
    </div>
</div>

<div class="shop__container container-fluid mx-auto px-md-4 pt-3 pb-4 pb-lg-5 mb-lg-5 ">
    <div class="bordertop mt-3 mt-lg-0">
        <div class="d-lg-none d-flex flex-wrap justify-content-between pt-4">
            <div class="align-content-center">
                <p class="text-black font-15 mb-0">Product Categories</p>
            </div>
            <div class="">
                <a class="mobfilterbtn text-black font-15" href="#0">Show Filters
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"
                            fill="none">
                            <rect x="0.249756" y="0.109375" width="14" height="14" rx="7" fill="#333333" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.83309 6.52604H10.7498V7.69271H7.83309V10.6094H6.66642V7.69271H3.74976V6.52604H6.66642V3.60938H7.83309V6.52604Z"
                                fill="white" />
                        </svg>
                    </span>
                </a>
            </div>
        </div>
        <div class="category__filter pb-3 pt-0 pt-lg-4 px-0 mb-3 mb-lg-0">
            <?php
            $filter_shortcode2 = '[searchandfilter id="1102"]';
            $filter_html = do_shortcode($filter_shortcode2);
            echo $filter_html;
            ?>
        </div>
        <div class="row pt-lg-3">
            <div class="col-12 col-lg-3 max-20 d-none d-lg-block">
                <div class="stickytop pt-2">
                    <div class="megafilter-group">
                        <h4 class="text-black font-20">Filter Products</h4>
                        <?php
                        $filter_shortcode = '[searchandfilter id="1102"]';
                        $filter_html = do_shortcode($filter_shortcode);
                        echo $filter_html;
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg postsrow pl-lg-4">
                <div class="row px-2 px-lg-0">
                    <?php if (have_posts()): ?>
                        <?php while (have_posts()):
                            the_post(); ?>
                            <?php global $product; ?>

                            <div class="col-6 col-md-4 col-xl-3 pb-3 px-1 px-lg-2">
                                <div class="productcard__container text-center">

                                    <div class="d-block position-relative">
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="product-image position-relative">
                                                <img src="<?php echo get_the_post_thumbnail_url(); ?>"
                                                    alt="<?php the_title(); ?>" class="" loading="lazy">
                                            </div>
                                        </a>
                                        <span class="quickquote" data-product-id="<?php echo get_the_ID(); ?>" data-title="<?php the_title(); ?>">Quick Quote</span>
                                        </div>

                                    <div class="d-flex flex-wrap justify-content-center pb-1 pt-3">
                                        <?php
                                        $max_to_show = 6;
                                        $count = 0;
                                        $terms = get_the_terms($product->get_id(), 'pa_colours');

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
                                    if (!empty($description)): ?>
                                        <p class="product-excerpt font-14 font-mb-12 text-gray mb-0 pb-1 pb-lg-1">
                                            <?php echo wp_trim_words($description, 4, '...'); ?>
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
                        <?php endwhile; ?>

                        <?php the_posts_navigation(); ?>
                    <?php else: ?>
                        <p></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="quickquote__opener">
    <div class="max-40 bg-white py-4 px-4">
        <span class="closedrawer">&times;</span>
        <div>
            <?php
            global $product;
            $product_id = $product->get_id();
            $variations = $product->is_type('variable') ? $product->get_available_variations() : [];
            ?>

            <div class="borderbottom pb-3">
                <div class="d-flex flex-wrap justify-content-between pb-0">
                    <p class="font-15 font-mb-14 mb-0">Continental ICP-01</p>
                    <p class="font-15 font-mb-14 mb-0"><?php echo esc_html($product->get_sku()); ?></p>
                </div>
                <h1 class="font-25 font-mb-20 mb-0"><?php the_title(); ?></h1>
                <h2 class="font-18 product-price">
                    <?php echo $product->get_price_html(); ?>
                </h2>
            </div>

            <?php
            $terms = get_the_terms($product_id, 'pa_colours');
            $variation_data = [];
            foreach ($variations as $variation) {
                $attributes = $variation['attributes'];
                if (isset($attributes['attribute_pa_colour'])) {
                    $slug = $attributes['attribute_pa_colour'];
                    $variation_data[$slug] = [
                        'price_html' => $variation['price_html'],
                        'display_price' => $variation['display_price'],
                        'variation_id' => $variation['variation_id']
                    ];
                }
            }
            ?>

            <?php if (!empty($terms)): ?>
                <div class="colour-attributes borderbottom py-4 mt-1">
                    <p class="text-black font-15 mb-0 pb-3">Choose a colour:</p>
                    <div class="d-flex flex-wrap color-variants-container">
                        <?php foreach ($terms as $term):
                            $slug = $term->slug;
                            $color = strtolower(str_replace(['(', ')', '.', ',', ' '], '', $term->name));
                            $data = $variation_data[$slug] ?? null;
                            ?>
                            <div class="color-variant mr-2 mb-2" data-color="<?php echo esc_attr($slug); ?>"
                                data-price-html="<?php echo esc_attr($data['price_html'] ?? ''); ?>"
                                data-price="<?php echo esc_attr($data['display_price'] ?? ''); ?>"
                                data-variation-id="<?php echo esc_attr($data['variation_id'] ?? ''); ?>"
                                style="background-color: <?php echo esc_attr($color); ?>;"
                                title="<?php echo esc_attr($term->name); ?>">
                                <span class="color-check" style="display: none; color: white;">✓</span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <input type="hidden" name="variation_id" id="selected-variation-id" value="">
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
$shop_page_id = wc_get_page_id('shop');
?>
<div class="faq__container">
    <div class="container-fluid mx-auto text-center px-3 px-md-4 pt-3 pb-4 pb-lg-5 mb-lg-5">
        <h2 class="font-30 font-mb-22 text-dark">Frequently asked questions</h2>
        <div class="product__toggle pt-lg-5 pb-5 mb-4 mb-lg-0">
            <div class="row acf-collapsibles justify-content-between mx-0 px-0">
                <?php if (have_rows('collaspsibles_repeater', $shop_page_id)): ?>
                    <?php while (have_rows('collaspsibles_repeater', $shop_page_id)):
                        the_row(); ?>
                        <div class="col-lg-55 mb-2">
                            <div class="acf-toggle-item text-left">
                                <h3 class="toggle-header font-16"><?php echo get_sub_field('title'); ?></h3>
                                <div class="toggle-content">
                                    <div class="pt-3 pb-4">
                                        <?php echo get_sub_field('content'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="col-12">
                        <p>No FAQs found.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<?php get_template_part('template-parts/blocks/social-logos'); ?>

<?php get_template_part('template-parts/blocks/testimonials'); ?>


<?php get_footer(); ?>