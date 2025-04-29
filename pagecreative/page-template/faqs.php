<?php
/**
 * Template Name: FAQs
 */

get_header(); ?>


<div class="faqs container-fluid mx-auto px-md-4 mx-auto text-left pb-5">
    <h2 class="bordertop borderbottom font-20 font-mb-16 mb-lg-3 py-3 mt-lg-3">Frequently Asked Questions</h2>
    <div class="row justify-content-between pb-lg-4 pt-3 pt-lg-4">
        <div class="col-12 col-lg-4 order-lg-1 order-2 h-100">
            <img class="w-100 h-100 mb-lg-4 mt-5 mt-lg-0" src="<?php echo get_field('featured_image'); ?>"
                alt="Frequently Asked Questions">
            <div class="font-15 singlecontent bordertop pt-4 mt-5">
                <?php echo get_field('content_editor'); ?>
            </div>
        </div>
        <div class="col-12 col-lg-8 order-lg-2 order-1 pl-lg-4">
            <div class="stickytop">
                <?php if (have_rows('faqs_repeater')) { ?>
                    <?php while (have_rows('faqs_repeater')) {
                        the_row(); ?>
                        <div class="faq-item">
                            <h3 class="borderbottom py-3 mb-0 font-18 font-mb-16 mb-lg-3 pr-4 pr-lg-3">
                                <?php echo get_sub_field('question'); ?>
                            </h3>
                            <div class="togglearea">
                                <div class="py-2 px-2">
                                    <?php echo get_sub_field('answer'); ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div class="pt-2 pt-lg-5">
    <?php get_template_part('template-parts/blocks/testimonials'); ?>
</div>


<?php get_footer(); ?>