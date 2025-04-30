<section class="pb-4 pb-lg-5 pt-0 imagewithtext">
    <div class="container-fluid w-100 mx-auto px-lg-4 mx-auto text-left pb-4 pb-lg-5">
        <div class="row">
            <div class="col-12 col-lg-6 pr-lg-4">
                <img class="w-100" src="<?php echo get_field('image_left'); ?>" alt="<?php echo get_field('image_left_title'); ?>">
                <?php if (get_field("image_left_caption")): ?>
                    <p class="font-13 text-gray pt-3 mb-1 mb-lg-3"><?php echo get_field('image_left_caption'); ?></p>
                <?php endif; ?>
            </div>
            <div class="col-12 col-lg-6 pt-3 pt-lg-0">
                <div class="max-45 stickytop">
                    <?php if (get_field("image_left_title")): ?>
                        <h2 class="font-25 font-mb-20 text-black my-0 pb-3">
                            <?php echo get_field('image_left_title'); ?>
                        </h2>
                    <?php endif; ?>
                    <?php if (get_field("image_left_textarea")): ?>
                        <div class="font-16 font-mb-15 text-black my-0 pb-2"><?php echo get_field('image_left_textarea'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>