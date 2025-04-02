<section class="pb-lg-4">
    <div class="socialarea max-width mx-auto pb-3">
        <div class="socialarea__container">
           <h2 class="font-28 text-dark font-mb-22 mb-0 pb-5 pb-lg-5 pt-2 px-2"><?php echo get_field('social_proof_title'); ?></h2>
           <div class="d-flex flex-wrap justify-content-center">
            <?php if (have_rows('logos_repeater')) { ?>
                    <?php while (have_rows('logos_repeater')) { the_row(); ?>
                        <div class="icon-src px-4 px-lg-5 pb-5">
                            <img src="<?php echo get_sub_field('logo'); ?>" alt="We make bespoke apparel for the world's best brands">
                        </div>
                    <?php } ?>
                <?php } ?> 
            </div>
        </div>
    </div>
</section>