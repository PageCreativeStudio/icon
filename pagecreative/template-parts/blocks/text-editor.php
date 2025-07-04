<section class="pb-4 pb-lg-5 pt-2">
    <div class="faqs container-fluid max-55 mx-auto px-md-4 mx-auto text-left pb-4 pb-lg-5">
        <div class="row">
            <div class="col-12">
                <?php if (get_field("text_editor_title")): ?>
                    <h3 class="font-25 font-mb-18 text-black my-0 pb-3">
                        <?php echo get_field('text_editor_title'); ?>
                    </h3>
                <?php endif; ?>
                <?php if (get_field("text_editor_textarea")): ?>
                    <div class="font-15 font-mb-14 text-gray my-0 pb-2"><?php echo get_field('text_editor_textarea'); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>