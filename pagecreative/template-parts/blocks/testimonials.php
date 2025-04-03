<section class="pb-lg-4">
    <div class="testimonialsarea max-width mx-auto text-center pb-3 pb-lg-4 text-center">
        <div class="testimonials__slider owl-carousel owl-theme">
            <?php if (have_rows('testimonial_repeater', 'options')) { ?>
                <?php while (have_rows('testimonial_repeater', 'options')) {
                    the_row(); ?>
                    <div class="review-item">
                        <p class="text-dark font-22 font-mb-18 px-2 max-50 mx-auto">
                            <?php echo get_sub_field('text', 'options'); ?></p>
                        <p class="font-15 text-dark"><?php echo get_sub_field('author', 'options'); ?></p>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>