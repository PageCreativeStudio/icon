<?php
/**
 * Template Name: Index
 */

get_header(); ?>

<div class="container-fluid px-0 mx-auto text-center py-5">
    <?php the_content(); ?>

    <?php 
    // Uncomment this only if needed
    // echo do_shortcode('[sync_customers_to_salesforce]'); 
    ?>
</div>

<?php get_footer(); ?>
