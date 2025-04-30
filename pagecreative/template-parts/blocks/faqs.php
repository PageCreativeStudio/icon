<section class="pb-5">
    <div class="faqs container-fluid max-50 mx-auto px-md-4 mx-auto text-left pb-4 pb-lg-4">
        <div class="row justify-content-between pb-lg-4">
            <div class="col-12 order-lg-2 order-1 pl-lg-4">
                <?php if (have_rows('faqs_repeater')) { ?>
                    <?php while (have_rows('faqs_repeater')) {
                        the_row(); ?>
                        <div class="faq-item">
                            <h3 class="borderbottom py-3 mb-0 font-18 font-mb-16 mb-lg-3 pr-4 pr-lg-3">
                                <?php echo get_sub_field('question'); ?>
                            </h3>
                            <div class="togglearea">
                                <div class="py-2 px-1">
                                    <?php echo get_sub_field('answer'); ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</section>