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
                <div class="d-flex">
                    <img class="w-100" src="<?php echo get_field('image_right_1'); ?>"
                        alt="<?php echo get_field('image_right_title'); ?>">
                    <img class="w-100 d-none d-lg-flex" src="<?php echo get_field('image_right_2'); ?>"
                        alt="<?php echo get_field('image_right_title'); ?>">
                </div>
            </div>
            <div class="col-12 col-lg-6 order-2 order-lg-1 pt-3 pt-lg-0 align-content-center">
                <div class="max-45">
                    <h2 class="font-30 font-mb-22 text-black my-0 pb-3">
                        <?php echo get_field('image_right_title'); ?>
                    </h2>
                    <p class="font-16 font-mb-15 text-gray my-0 pb-2">
                        <?php echo get_field('image_right_description'); ?>
                    </p>
                    <?php if (have_rows('list_repeater_right')) { ?>
                        <?php while (have_rows('list_repeater_right')) {
                            the_row(); ?>
                            <ul class="m-0 p-0 listicons">
                                <li class="d-flex"><img src="<?php echo get_sub_field('icon'); ?>"
                                        alt="<?php echo get_sub_field('text'); ?>"><?php echo get_sub_field('text'); ?></li>
                            </ul>
                        <?php } ?>
                    <?php } ?>
                    <div class="d-flex flex-wrap align-content-center mt-3">
                        <a href="<?php echo get_field('button_dark_link_1'); ?>"
                            class="btnc bg-dark font-15 text-white mr-3 mb-0"><?php echo get_field('button_dark_label_1'); ?></a>
                        <a href="<?php echo get_field('button_light_link_1'); ?>"
                            class="btna mb-0"><?php echo get_field('button_light_label_1'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>