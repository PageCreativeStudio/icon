<?php
/**
 * Template Name: Contact
 */

get_header(); ?>


<div class="container-fluid mx-auto px-md-4 mx-auto text-left pb-5 pt-3 pt-lg-4">
    <h2 class="bordertop borderbottom font-18 font-mb-16 mb-lg-3 py-3">Contact</h2>
</div>

<div class="container-fluid mx-auto px-md-4 mx-auto text-left pb-5">
    <div class="row">
        <div class="col-12 col-6 order-2 order-lg-1">
            <img class="w-100 h-100 mb-lg-4 mt-5 mt-lg-0"
                src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="Contact icon printing">
            <div class="font-15 singlecontent bordertop pt-4 mt-5">
                
            </div>
        </div>
        <div class="col-12 col-6 order-1 order-lg-2">

        </div>
    </div>
</div>



<?php get_footer(); ?>