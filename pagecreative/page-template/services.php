<?php
/**
 * Template Name: Services
 */

get_header(); ?>


<div class="container-fluid mx-auto px-md-4 mx-auto text-left pb-5 pt-3 pt-lg-4">
    <h2 class="bordertop borderbottom font-18 font-mb-16 mb-lg-3 py-3">Contact</h2>
</div>

<section class="pb-5">
    <div class="container-fluid mx-auto px-md-4 mx-auto pb-2 pb-lg-4">
        <div class="row">
            <?php
            $args = array(
                'post_type' => 'services',
                'posts_per_page' => -1,
                'post_status' => 'publish'
            );
            $services_query = new WP_Query($args);
            if ($services_query->have_posts()) :
                while ($services_query->have_posts()) : $services_query->the_post(); ?>
                    <div class="verticalcol col-12 col-lg-6 pb-4 pb-lg-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="postarea__image-container h-100">
                                    <img class="w-100" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>"
                                        alt="<?php the_title(); ?>">
                                    <?php if (get_field("two_col_image_caption")): ?>
                                        <p class="font-13 text-gray pt-3"><?php echo get_field('two_col_image_caption'); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="pt-3 pt-lg-0 max-45">
                                    <?php if (get_field("mini_title")): ?>
                                        <span class="font-14 font-mb-12 uppercase text-gray mt-0 mb-1 pb-3">
                                            <?php echo get_field('mini_title'); ?>
                                        </span>
                                    <?php endif; ?>
                                    <h2 class="text-black font-32 font-mb-22 my-0 pb-3">
                                        <?php the_title(); ?>
                                    </h2>
                                    <?php if (get_field("two_col_sub_title")): ?>
                                        <h3 class="font-20 font-mb-17 text-black my-0 pb-3">
                                            <?php echo get_field('two_col_sub_title'); ?>
                                        </h3>
                                    <?php endif; ?>
                                    <?php if (get_field("two_col_description")): ?>
                                        <p class="font-15 text-black my-0 pb-3"><?php echo get_field('two_col_description'); ?></p>
                                    <?php endif; ?>
                                    <?php if (get_field("two_col_btn_title")): ?>
                                        <a href="<?php echo get_field('two_col_btn_link'); ?>"
                                            class="text-sec font-13 underline align-self-center my-0 pt-3 d-inline-block mb-3 mb-lg-0">
                                            <?php echo get_field('two_col_btn_title'); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>



<?php get_template_part('template-parts/blocks/social-logos'); ?>

<div class="pt-2 pt-lg-5">
    <?php get_template_part('template-parts/blocks/testimonials'); ?>
</div>

<div class="pb-4">
    <div class="max-50 mx-auto w-100 px-3 text-center pb-4 pb-lg-5 pt-3 pt-lg-4">
        <h1 class="text-black font-30 font-mb-25 mb-0 pb-0 pt-0 mx-auto pt-3">Custom clothing done right </h1>
        <p class="text-black font-16 pt-2 pb-3 max-25 mx-auto mb-1">We make bespoke apparel for the world's best
            brands.</p>
        <a class="btnc bg-dark font-15 text-white px-4 px-lg-5 mb-5" href="<?php echo home_url(); ?>/contact-us/">
            Get a Quote </a>
    </div>
</div>



<?php get_footer(); ?>