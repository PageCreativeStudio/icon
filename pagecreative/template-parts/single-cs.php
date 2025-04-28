<?php
/**
 * Template part for displaying single case study
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pagecreative
 */
get_header(); ?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <section class="singlecs pb-2">
        <div class="heroarea pb-5 d-none d-lg-block">
            <div class="heroarea__container position-relative d-block">
                <img class="w-100 hero__image" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
                    alt="<?php the_title(); ?>">
                <div class="heroarea__inner">
                    <div class="max-50 mx-auto text-center w-100 px-3">
                        <h1 class="text-white font-35 mx-auto text-center font-mb-30 mb-0 pb-0 pt-0">
                            <?php the_title(); ?>
                        </h1>
                        <?php if (get_field("sub_title")): ?>
                            <p class="text-white font-15 pt-2 text-center pb-3 max-25 mx-auto mb-1">
                                <?php echo get_field('sub_title'); ?>
                            </p>
                        <?php endif; ?>
                        <?php if (get_field("button_label")): ?>
                            <a class="btnb bg-white font-15 text-center text-black px-5"
                                href="<?php echo get_field('button_link'); ?>">
                                <?php echo get_field('button_label'); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="heroarea text-center d-block d-lg-none pb-5">
            <div class="max-50 text-center mx-auto w-100 px-3">
                <h1 class="text-black font-mb-25 mb-0 pb-0 pt-0 max-20 text-center mx-auto pt-3">
                    <?php the_title(); ?>
                </h1>
                <?php if (get_field("sub_title")): ?>
                    <p class="text-dark font-15 pt-2 pb-3 max-25 text-center mx-auto mb-1">
                        <?php echo get_field('sub_title'); ?>
                    </p>
                <?php endif; ?>
                <?php if (get_field("button_label")): ?>
                    <a class="btnc bg-dark font-15 text-white text-center mb-5"
                        href="<?php echo get_field('button_link'); ?>">
                        <?php echo get_field('button_label'); ?>
                    </a>
                <?php endif; ?>
            </div>
            <img class="w-100 hero__image heromobile__image text-center"
                src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php the_title(); ?>">
        </div>
    </section>


    <div class="container-fluid max-50 mx-auto px-2">
        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<p id="breadcrumbs" class="mb-0 font-14 pb-2 mb-4">', '</p>');
        }
        ?>
        <div class="singlecontent py-5">
            <?php the_content(); ?>
        </div>
    </div>


    <?php if (get_field("product_to_show")): ?>
        <section class="pt-5">
            <div class="container-fluid mx-auto px-md-4 pb-3 text-center">
                <h2 class="text-black font-22 font-mb-18 text-center mb-0 pb-4 pb-lg-4 mb-lg-2">Related Products</h2>
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
                                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>"
                                                        alt="<?php the_title(); ?>" loading="lazy">
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

    <div>
        <div class="max-50 mx-auto w-100 px-3 text-center pb-4 pb-lg-5 pt-3 pt-lg-4">
            <h1 class="text-black font-mb-25 mb-0 pb-0 pt-0 mx-auto pt-3">Custom clothing done right </h1>
            <p class="text-black font-15 pt-2 pb-3 max-25 mx-auto mb-1">We make bespoke apparel for the world's best
                brands.</p>
            <a class="btnc bg-dark font-15 text-white px-4 px-lg-5 mb-5" href="<?php echo home_url(); ?>/contact-us/">
                Get a Quote </a>
        </div>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->



<?php get_footer(); ?>