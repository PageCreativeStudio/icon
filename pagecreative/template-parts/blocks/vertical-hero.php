<section class="pb-5">
    <div class="container-fluid mx-auto px-md-4 mx-auto pb-2 pb-lg-4">
        <div class="row">
            <?php if (have_rows('hero_column_repeater')) { ?>
                <?php while (have_rows('hero_column_repeater')) {
                    the_row(); ?>
                    <div class="verticalcol col-12 col-lg-6 pb-4 pb-lg-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="postarea__image-container h-100">
                                    <img class="w-100" src="<?php echo get_sub_field('two_col_image'); ?>"
                                        alt="<?php echo get_sub_field('two_col_title'); ?>">
                                    <?php if (get_sub_field("two_col_image_caption")): ?>
                                        <p class="font-13 text-gray pt-3"><?php echo get_sub_field('two_col_image_caption'); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="pt-3 pt-lg-0 max-45">
                                    <?php if (get_sub_field("mini_title")): ?>
                                        <span class="font-14 font-mb-12 uppercase text-gray mt-0 mb-1 pb-3">
                                            <?php echo get_sub_field('mini_title'); ?>
                                        </span>
                                    <?php endif; ?>
                                    <?php if (get_sub_field("two_col_title")): ?>
                                        <h2 class="text-black font-30 font-mb-22 my-0 pb-3">
                                            <?php echo get_sub_field('two_col_title'); ?>
                                        </h2>
                                    <?php endif; ?>
                                    <?php if (get_sub_field("two_col_sub_title")): ?>
                                        <h3 class="font-20 font-mb-18 text-black my-0 pb-3">
                                            <?php echo get_sub_field('two_col_sub_title'); ?>
                                        </h3>
                                    <?php endif; ?>
                                    <?php if (get_sub_field("two_col_description")): ?>
                                        <p class="font-15 text-black my-0 pb-3"><?php echo get_sub_field('two_col_description'); ?></p>
                                    <?php endif; ?>
                                    <?php if (get_sub_field("two_col_btn_title")): ?>
                                        <a href="<?php echo get_sub_field('two_col_btn_link'); ?>"
                                            class="text-sec font-13 underline align-self-center my-0 pt-3 d-inline-block mb-3 mb-lg-0"><?php echo get_sub_field('two_col_btn_title'); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>