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
    <header class="entry-header py-5">
        <h1 class="text-dark"><?php the_title(); ?></h1>
    </header>

    <?php echo do_shortcode('[custom_breadcrumbs]'); ?>

    <?php
if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
}
?>

    <?php pagecreative_post_thumbnail(); ?>

    <div class="entry-content py-5">
        <?php
        the_content();
        ?>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->



<?php get_footer(); ?>