<?php
/**
 * Template Name: Index
 */

get_header(); ?>

<!--<div class="container-fluid px-0 mx-auto text-center">
    <?php the_content(); ?>
</div>-->

<section class="pb-3 pb-lg-5">
    <div class="heroarea pb-5 d-none d-lg-block">
        <div class="heroarea__container position-relative d-block text-center">
            <img class="w-100 hero__image" src="<?php echo get_field('hero_image'); ?>"
                alt="<?php echo get_field('hero_title'); ?>">
            <div class="heroarea__inner text-center">
                <div class="max-50 mx-auto w-100 px-3">
                    <?php if (get_field("hero_title")): ?>
                        <h1 class="text-white font-35 font-mb-30 mb-0 pb-0 pt-0"><?php echo get_field('hero_title'); ?></h1>
                    <?php endif; ?>
                    <?php if (get_field("hero_description")): ?>
                        <p class="text-white font-15 pt-2 pb-3 max-25 mx-auto mb-1">
                            <?php echo get_field('hero_description'); ?>
                        </p>
                    <?php endif; ?>
                    <?php if (get_field("hero_btn_label")): ?>
                        <a class="btnb bg-white font-15 text-black" href="<?php echo get_field('hero_btn_link'); ?>">
                            <?php echo get_field('hero_btn_label'); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="heroarea d-block d-lg-none pb-5">
        <div class="max-50 mx-auto w-100 px-3">
            <?php if (get_field("hero_title")): ?>
                <h1 class="text-dark font-mb-25 mb-0 pb-0 pt-0 max-20 mx-auto pt-3"><?php echo get_field('hero_title'); ?>
                </h1>
            <?php endif; ?>
            <?php if (get_field("hero_description")): ?>
                <p class="text-dark font-15 pt-2 pb-3 max-25 mx-auto mb-1"><?php echo get_field('hero_description'); ?></p>
            <?php endif; ?>
            <?php if (get_field("hero_btn_label")): ?>
                <a class="btnc bg-dark font-15 text-white mb-5" href="<?php echo get_field('hero_btn_link'); ?>">
                    <?php echo get_field('hero_btn_label'); ?>
                </a>
            <?php endif; ?>
        </div>
        <img class="w-100 hero__image" src="<?php echo get_field('hero_image'); ?>"
            alt="<?php echo get_field('hero_title'); ?>">
    </div>
</section>


<?php get_template_part('template-parts/blocks/social-logos'); ?>


<section class="pb-4 pb-lg-5 pt-0 imageswith__text">
    <div class="container-fluid w-100 mx-auto px-lg-4 mx-auto text-left pb-4 pb-lg-5">
        <div class="row">
            <div class="col-12 col-lg-6 pl-lg-4 twoimages order-1 order-lg-2 ">
                <div class="d-flex h-100">
                    <img class="" src="<?php echo get_field('image_right_1'); ?>"
                        alt="<?php echo get_field('image_right_title'); ?>">
                    <img class="d-none d-lg-flex" src="<?php echo get_field('image_right_2'); ?>"
                        alt="<?php echo get_field('image_right_title'); ?>">
                </div>
            </div>
            <div class="col-12 col-lg-6 order-2 order-lg-1 pt-3 pt-lg-0 align-content-center">
                <div class="max-45">
                    <h2 class="font-30 font-mb-22 text-black my-0 pt-3 pt-lg-1 pb-3">
                        <?php echo get_field('image_right_title'); ?>
                    </h2>
                    <p class="font-16 font-mb-15 text-gray my-0 pb-2">
                        <?php echo get_field('image_right_description'); ?>
                    </p>
                    <ul class="mx-0 mt-1 px-0 py-3 listicons">
                        <?php if (have_rows('list_repeater_right')) { ?>
                            <?php while (have_rows('list_repeater_right')) {
                                the_row(); ?>
                                <li class="d-flex pb-2 mb-0 align-items-center"><img class="mr-2"
                                        src="<?php echo get_sub_field('icon'); ?>"
                                        alt="<?php echo get_sub_field('text'); ?>"><?php echo get_sub_field('text'); ?></li>

                            <?php } ?>
                        <?php } ?>
                    </ul>
                    <div class="d-flex flex-wrap align-content-center mt-2 gap-8">
                        <a href="<?php echo get_field('button_dark_link_1'); ?>"
                            class="btnc bg-dark font-15 text-white"><?php echo get_field('button_dark_label_1'); ?></a>
                        <a href="<?php echo get_field('button_light_link_1'); ?>"
                            class="btna mb-0"><?php echo get_field('button_light_label_1'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="pt-3">
    <div class="container-fluid mx-auto px-md-4 pb-4 text-center">
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
                        if (!($product_post instanceof WP_Post))
                            continue;

                        $product = wc_get_product($product_post->ID);
                        if (!$product)
                            continue;

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
                                                <img src="<?php echo esc_url($product_image); ?>"
                                                    alt="<?php echo esc_attr($product_title); ?>" loading="lazy">
                                            <?php else: ?>
                                                <img src="<?php echo wc_placeholder_img_src(); ?>" alt="No image available"
                                                    loading="lazy">
                                            <?php endif; ?>
                                        </div>
                                    </a>
                                </div>

                                <a href="<?php echo esc_url($product_link); ?>">
                                    <h3 class="font-17 font-mb-15 mb-0 pb-0 pb-lg-1 pt-3 mt-1">
                                        <?php echo esc_html($product_title); ?>
                                    </h3>
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

<?php get_template_part('template-parts/blocks/case-studies'); ?>

<div class="">
    <?php get_template_part('template-parts/blocks/testimonials'); ?>
</div>

<?php get_footer(); ?>