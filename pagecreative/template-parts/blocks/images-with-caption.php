<section class="pb-4">
    <div class="container-fluid mx-auto px-md-4 mx-auto pb-2 pb-lg-4">
        <div class="verticalcol row">
            <div class="col-12 col-lg-6 pb-3">
                <div class="postarea__image-container h-100 text-left">
                    <img class="w-100" src="<?php echo get_field('two_col_image_1'); ?>"
                        alt="<?php echo get_field('two_col_image_1_caption'); ?>">
                    <?php if (get_field("two_col_image_1_caption")): ?>
                        <p class="font-13 text-gray pt-3"><?php echo get_field('two_col_image_1_caption'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="postarea__image-container h-100 text-left">
                    <img class="w-100" src="<?php echo get_field('two_col_image_2'); ?>"
                        alt="<?php echo get_field('two_col_image_2_caption'); ?>">
                    <?php if (get_field("two_col_image_2_caption")): ?>
                        <p class="font-13 text-gray pt-3"><?php echo get_field('two_col_image_2_caption'); ?></p>
                    <?php endif; ?>
                </div>
            </div>

        </div>
</section>