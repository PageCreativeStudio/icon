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

    <section class="pb-3 pb-lg-5">
        <div class="heroarea pb-5 d-none d-lg-block">
            <div class="heroarea__container position-relative d-block">
                <img class="w-100 hero__image" src="<?php echo get_field('hero_image'); ?>"
                    alt="<?php echo get_field('hero_title'); ?>">
                <div class="heroarea__inner">
                    <div class="max-50 mx-auto w-100 px-3">
                        <h1 class="text-white font-35 font-mb-30 mb-0 pb-0 pt-0"><?php the_title(); ?></h1>
                        <?php if (get_field("sub_title")): ?>
                            <p class="text-white font-15 pt-2 pb-3 max-25 mx-auto mb-1">
                                <?php echo get_field('sub_title'); ?>
                            </p>
                        <?php endif; ?>
                        <?php if (get_field("button_label")): ?>
                            <a class="btnb bg-white font-15 text-black" href="<?php echo get_field('button_link'); ?>">
                                <?php echo get_field('button_label'); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="heroarea d-block d-lg-none pb-5">
            <div class="max-50 mx-auto w-100 px-3">
                <h1 class="text-dark font-mb-25 mb-0 pb-0 pt-0 max-20 mx-auto pt-3">
                    <?php the_title(); ?>
                </h1>
                <?php if (get_field("sub_title")): ?>
                    <p class="text-dark font-15 pt-2 pb-3 max-25 mx-auto mb-1"><?php echo get_field('sub_title'); ?>
                    </p>
                <?php endif; ?>
                <?php if (get_field("button_label")): ?>
                    <a class="btnc bg-dark font-15 text-white mb-5" href="<?php echo get_field('button_link'); ?>">
                        <?php echo get_field('button_label'); ?>
                    </a>
                <?php endif; ?>
            </div>
            <img class="w-100 hero__image" src="<?php echo get_field('hero_image'); ?>"
                alt="<?php echo get_field('hero_title'); ?>">
        </div>
    </section>

</article><!-- #post-<?php the_ID(); ?> -->



<?php get_footer(); ?>