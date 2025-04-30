<?php
/**
 * Template part for displaying service
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
                        <h1 class="text-white font-35 mx-auto text-center font-mb-30 mt-lg-0 mb-0 pb-0 pt-0">
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
            yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumbs mb-0 font-13 pb-2 mb-0">', '</p>');
        }
        ?>
        <div class="singlecontent pb-5 pt-4">
            <?php the_content(); ?>
        </div>
    </div>

    <div>
        <div class="max-50 mx-auto w-100 px-3 text-center pb-4 pb-lg-5 pt-3 pt-lg-4">
            <h1 class="text-black font-30 font-mb-25 mb-0 pb-0 pt-0 mx-auto pt-3">Custom clothing done right </h1>
            <p class="text-black font-16 pt-2 pb-3 max-25 mx-auto mb-1">We make bespoke apparel for the world's best
                brands.</p>
            <a class="btnc bg-dark font-15 text-white px-4 px-lg-5 mb-5" href="<?php echo home_url(); ?>/contact-us/">
                Get a Quote </a>
        </div>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->



<?php get_footer(); ?>