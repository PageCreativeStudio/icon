<?php
/**
 * Template Name: Services
 */

get_header(); ?>


<div class="container-fluid mx-auto px-md-4 mx-auto text-left pb-5 pt-3 pt-lg-4">
    <div class="servicesfilter bordertop borderbottom mb-lg-3 py-3">

        <div class="d-none d-md-flex align-items-center flex-wrap">
            <span class="text-black pr-3">Services we provide:</span>
            <?php
            $services_query = new WP_Query(array(
                'post_type' => 'services',
                'posts_per_page' => -1,
                'post_status' => 'publish'
            ));
            if ($services_query->have_posts()):
                $i = 1;
                $links = [];
                while ($services_query->have_posts()):
                    $services_query->the_post();
                    $links[] = '<a href="#service-' . $i . '" class="font-14">' . get_the_title() . '</a>';
                    $i++;
                endwhile;
                echo implode(' <span class="px-2">|</span> ', $links);
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <div class="d-md-none mt-2">
            <h2 class="font-18 text-black bordertop py-3 mb-0 mt-3">Services we provide:</h2>
            <select id="mobile-service-select" class="cat-select font-14">
                <option value="">Select a service</option>
                <?php
                $services_query = new WP_Query(array(
                    'post_type' => 'services',
                    'posts_per_page' => -1,
                    'post_status' => 'publish'
                ));
                if ($services_query->have_posts()):
                    $i = 1;
                    while ($services_query->have_posts()):
                        $services_query->the_post(); ?>
                        <option value="service-<?php echo $i; ?>"><?php the_title(); ?></option>
                        <?php $i++;
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </select>
        </div>
    </div>
</div>

<section class="pb-5">
    <div class="container-fluid mx-auto px-md-4 mx-auto pb-2 pb-lg-4">
        <div class="row">
            <?php
            $services_query = new WP_Query(array(
                'post_type' => 'services',
                'posts_per_page' => -1,
                'post_status' => 'publish'
            ));
            if ($services_query->have_posts()):
                $i = 1;
                while ($services_query->have_posts()):
                    $services_query->the_post(); ?>
                    <div id="service-<?php echo $i; ?>" class="verticalcol col-12 col-lg-6 pb-4 pb-lg-5">
                        <div class="row">
                            <div class="col-12">
                                <div class="postarea__image-container h-100">
                                    <img class="w-100" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>"
                                        alt="<?php the_title(); ?>">
                                    <?php if (get_field("image_caption")): ?>
                                        <p class="font-13 text-gray pt-3"><?php echo get_field('image_caption'); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="pt-3 pt-lg-0 max-45">
                                    <h2 class="text-black font-32 font-mb-22 mt-2 pb-2">
                                        <?php the_title(); ?>
                                    </h2>
                                    <?php if (get_field("sub_title")): ?>
                                        <h3 class="font-20 font-mb-17 text-black my-0 pb-3">
                                            <?php echo get_field('sub_title'); ?>
                                        </h3>
                                    <?php endif; ?>
                                    <?php if (get_field("description")): ?>
                                        <p class="font-15 text-black my-0 pb-2"><?php echo get_field('description'); ?></p>
                                    <?php endif; ?>
                                    <a href="<?php the_permalink(); ?>"
                                        class="text-sec font-13 underline align-self-center my-0 pt-3 d-inline-block mb-3 mb-lg-0">
                                        Read more
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $i++;
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>



<?php get_template_part('template-parts/blocks/social-logos'); ?>

<div class="pt-4 pt-lg-5">
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