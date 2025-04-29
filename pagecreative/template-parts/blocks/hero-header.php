<section class="pb-lg-4">
    <div class="hero-header container-fluid mx-auto px-md-4 mx-auto pb-3 pb-lg-4">
        <div class="stickyrow row">
            <div class="col-12 col-lg-4 px-3 order-2 order-lg-1">
                <a class="align-self-center" href="<?php the_permalink(); ?>">
                    <div class="pt-3 pt-lg-3 mt-lg-2">
                        <span class="font-14 font-mb-12 uppercase text-gray mb-0">
                            <span><?php echo esc_html(implode(', ', $cat_names)); ?></span>
                        </span>
                        <h2 class="text-black font-30 font-mb-20 mt-2 mt-lg-2 pb-0 mb-1 max-30">
                            <?php the_title(); ?>
                        </h2>
                    </div>
                    <span class="text-sec font-13 underline align-self-center">Read more</span>
                </a>
            </div>
            <div class="col-12 col-lg-8 order-1 order-lg-2">
                <div class="postarea__image-container h-100">
                    <img class="w-100" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
                        alt="<?php the_title(); ?>">
                </div>
            </div>
        </div>
    </div>
</section>