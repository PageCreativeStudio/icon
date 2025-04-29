<?php
/**
 * Template Name: Blog
 */

get_header(); ?>

<div class="postarea container-fluid mx-auto px-md-4 mx-auto text-left">
    <div>
        
    </div>
    <?php
    $latest_args = array(
        'post_type' => 'post',
        'posts_per_page' => 4,
    );

    $latest_query = new WP_Query($latest_args);

    if ($latest_query->have_posts()): ?>
        <div class="row pt-4 pt-lg-5" id="posts-container">
            <?php while ($latest_query->have_posts()):
                $latest_query->the_post(); ?>
                <div class="col-12 col-lg-6 px-2 mb-5 mb-lg-5">
                    <a class="postarea__link" href="<?php the_permalink(); ?>">
                        <div class="postarea__image-container">
                            <img class="w-100" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
                                alt="<?php the_title(); ?>">
                        </div>
                        <h2 class="text-black font-30 font-mb-25 mt-2 pt-4 pb-0 mb-1 max-40">
                            <?php the_title(); ?>
                        </h2>
                        <?php if (get_field("sub_title")): ?>
                            <h3 class="text-black font-20 font-mb-18 pt-3 pb-0 mb-3 px-0 mx-0 max-40">
                                <?php echo get_field('sub_title'); ?>
                            </h3>
                        <?php endif; ?>
                        <p class="font-15 font-mb-14 max-40 py-2">
                            <?php echo wp_trim_words(get_the_excerpt(), 18); ?>
                        </p>
                        <span class="text-sec font-13 underline">Read more</span>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
        <?php wp_reset_postdata(); endif; ?>
</div>

<?php get_footer(); ?>