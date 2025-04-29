<section class="pb-5">
    <div class="hero-header container-fluid mx-auto px-md-4 mx-auto pb-4 pb-lg-5">
        <div class="stickyrow row">
            <div class="col-12 col-lg-4 pr-lg-5 px-3 order-2 order-lg-1">
                <div class="pt-3 pt-lg-0">
                    <?php if (get_field("mini_title")): ?>
                        <span class="font-14 font-mb-12 uppercase text-gray my-0 pb-3">
                            <?php echo get_field('mini_title'); ?>
                        </span>
                    <?php endif; ?>
                    <?php if (get_field("two_col_title")): ?>
                        <h2 class="text-black font-30 font-mb-25 my-0 pb-3 max-30">
                            <?php echo get_field('two_col_title'); ?>
                        </h2>
                    <?php endif; ?>
                    <?php if (get_field("two_col_sub_title")): ?>
                        <h3 class="font-20 font-mb-18 text-black my-0 pb-3"><?php echo get_field('two_col_sub_title'); ?>
                        </h3>
                    <?php endif; ?>
                    <?php if (get_field("two_col_description")): ?>
                        <p class="font-15 text-black my-0 pb-3"><?php echo get_field('two_col_description'); ?></p>
                    <?php endif; ?>
                    <?php if (get_field("two_col_btn_title")): ?>
                        <a href="<?php echo get_field('two_col_btn_link'); ?>"
                            class="text-sec font-13 underline align-self-center my-0 pt-3"><?php echo get_field('two_col_btn_title'); ?></a>
                    <?php endif; ?>
                </div>

            </div>
            <div class="col-12 col-lg-8 order-1 order-lg-2">
                <div class="postarea__image-container h-100">
                    <img class="w-100" src="<?php echo get_field('two_col_image'); ?>"
                        alt="<?php echo get_field('two_col_title'); ?>">
                    <?php if (get_field("two_col_image_caption")): ?>
                        <p class="font-13 text-gray pt-3"><?php echo get_field('two_col_image_caption'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>