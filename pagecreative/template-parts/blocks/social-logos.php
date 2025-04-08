<section class="pb-lg-4">
    <div class="socialarea max-width mx-auto text-center pb-3 pb-lg-4">
        <div class="socialarea__container">
            <h2 class="font-28 text-dark font-mb-22 mb-0 pb-5 pb-lg-5 pt-2 px-2">
                <?php echo get_field('social_proof_title', 'options'); ?></h2>
            <div class="d-flex flex-wrap justify-content-center">
                <?php if (have_rows('logos_repeater', 'options')) { ?>
                    <?php while (have_rows('logos_repeater', 'options')) {
                        the_row(); ?>
                        <div class="icon-src px-4 px-lg-5 pb-5">
                            <img src="<?php echo get_sub_field('logo', 'options'); ?>"
                                alt="We make bespoke apparel for the world's best brands">
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</section>