<section class="pb-5 pt-2 imagewithtext">
    <div class="container-fluid mx-auto px-lg-4 mx-auto text-left pb-4 pb-lg-5">
        <div class="row">
            <div class="col-12 col-lg-6 pl-lg-5">
                <img class="w-100" src="<?php echo get_field('image_left'); ?>" alt="<?php the_title(); ?>">
                <?php if (get_field("image_left_caption")): ?>
                    <p class="font-13 text-gray pt-3 mb-1 mb-lg-3"><?php echo get_field('image_left_caption'); ?></p>
                <?php endif; ?>
            </div>
            <div class="col-12 col-lg-6">
                <div class="max-45">
                    <?php if (get_field("image_left_title")): ?>
                        <h2 class="font-25 font-mb-18 text-black my-0 pb-3">
                            <?php echo get_field('image_left_title'); ?>
                        </h2>
                    <?php endif; ?>
                    <?php if (get_field("image_left_textarea")): ?>
                        <div class="font-15 font-mb-14 text-black my-0 pb-2"><?php echo get_field('image_left_textarea'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>