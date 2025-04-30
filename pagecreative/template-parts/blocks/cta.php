<div class="pb-4">
    <div class="max-50 mx-auto w-100 px-3 text-center pb-4 pb-lg-5 pt-3 pt-lg-4">
        <?php if (get_field("cta_title")): ?>
            <h1 class="text-black font-30 font-mb-25 mb-0 pb-0 pt-0 mx-auto pt-3"><?php echo get_field('cta_title'); ?></h1>
        <?php endif; ?>
        <?php if (get_field("cta_sub_title")): ?>
            <p class="text-black font-16 pt-2 pb-3 max-25 mx-auto mb-1"><?php echo get_field('cta_sub_title'); ?></p>
        <?php endif; ?>
        <?php if (get_field("cta_btn_label")): ?>
            <a class="btnc bg-dark font-15 text-white px-4 px-lg-5 mb-5" href="<?php echo get_field('cta_btn_link'); ?>">
                <?php echo get_field('cta_btn_label'); ?> </a>
        <?php endif; ?>
    </div>
</div>