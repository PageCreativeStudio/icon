<section class="pb-lg-4">
    <div class="hero-header container-fluid mx-auto px-md-4 mx-auto pb-3 pb-lg-4">
        <div class="stickyrow row">
            <div class="col-12 col-lg-4 px-3 order-2 order-lg-1">
                <div class="pt-3 pt-lg-3 mt-lg-2">
                    <span class="font-14 font-mb-12 uppercase text-gray my-0 pb-3">
                        <?php echo get_field('mini_title'); ?>
                    </span>
                    <h2 class="text-black font-30 font-mb-20 my-0 pb-3 max-30">
                        <?php echo get_field('two_col_title'); ?>
                    </h2>
                    <h3 class="font-20 font-mb-18 text-black my-0 pb-3"><?php echo get_field('two_col_sub_title'); ?>
                    </h3>
                    <p class="font-15 text-black my-0 pb-3"><?php echo get_field('two_col_description'); ?></p>
                    <a href="<?php echo get_field('two_col_btn_link'); ?>"
                        class="text-sec font-13 underline align-self-center my-0 pt-3"><?php echo get_field('two_col_btn_title'); ?></a>
                </div>

            </div>
            <div class="col-12 col-lg-8 order-1 order-lg-2">
                <div class="postarea__image-container h-100">
                    <img class="w-100 mb-2" src="<?php echo get_field('two_col_image'); ?>"
                        alt="<?php echo get_field('two_col_title'); ?>">
                    <p class="font-13 text-gray"><?php echo get_field('two_col_image_caption'); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>