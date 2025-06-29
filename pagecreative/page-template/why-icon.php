<?php
/**
 * Template Name: Why icon
 */

get_header(); ?>


<div class="container-fluid mx-auto px-md-4 mx-auto text-left pb-5 pt-3 pt-lg-4">
    <h2 class="bordertop borderbottom font-18 font-mb-16 mb-lg-3 py-3">We just care a lot more</h2>
</div>

<div class="container-fluid mx-auto px-0 mx-auto pt-lg-3">
    <?php the_content(); ?>
</div>

<?php get_template_part('template-parts/blocks/social-logos'); ?>

<div class="pt-2 pt-lg-5">
    <?php get_template_part('template-parts/blocks/testimonials'); ?>
</div>

<div class="container-fluid mx-auto px-md-4">
    <div class="font-15 singlecontent bordertop pt-4 mt-5 pb-5">
        <p class="font-15 text-gray max-25 pt-2">
            <span class="text-black font-18">Not finding what you're looking for?</span><br><br>
            Can't find what you're looking for or need some assistance? Call us on 0207 183 8431 or send us an email.
        </p>
    </div>
</div>



<?php get_footer(); ?>