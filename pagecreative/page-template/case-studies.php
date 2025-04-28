<?php
/**
 * Template Name: Case studies
 */

get_header(); ?>

<div class="postarea container-fluid mx-auto px-md-4 mx-auto text-left">
    <h2 class="bordertop borderbottom font-22 font-mb-20 mb-lg-3 py-3 mt-lg-3">Case studies</h2>
    <?php
    $total_case_studies = wp_count_posts('case-studies')->publish;

    $sticky_posts = get_option('sticky_posts');
    $latest_args = array(
        'post_type' => 'case-studies',
        'posts_per_page' => 4,
        'post__not_in' => $sticky_posts,
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

        <?php if ($total_case_studies > 4): ?>
            <div id="loadMoreBtn" class="text-center mt-4 mb-5 pb-4 pb-lg-5">
                <button class="btnc border-0 bg-dark font-15 text-white " style="background:#E7E7E7">Load More Posts</button>
                <div id="loader" style="display: none;" class="mt-3 font-15 text-black">Loading...</div>
            </div>
        <?php endif; ?>

        <script>
            let offset = 4;
            const totalPosts = <?php echo $total_case_studies; ?>;
            const loadMoreBtn = document.getElementById('loadMoreBtn');
            const loader = document.getElementById('loader');

            loadMoreBtn.addEventListener('click', function () {
                loader.style.display = 'block';

                fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'action=load_more_posts&offset=' + offset
                })
                    .then(response => response.text())
                    .then(data => {
                        loader.style.display = 'none'; 

                        if (data.trim()) {
                            document.getElementById('posts-container').insertAdjacentHTML('beforeend', data);
                            offset += 4;

                            if (offset >= totalPosts) {
                                loadMoreBtn.style.display = 'none';
                            }
                        } else {
                            loader.style.display = 'none';
                        }
                    });
            });
        </script>
        <?php wp_reset_postdata(); endif; ?>

    <div>
        <div class="max-50 mx-auto w-100 px-3 text-center pb-4 pb-lg-5 pt-3 pt-lg-4">
            <h1 class="text-black font-mb-25 mb-0 pb-0 pt-0 mx-auto pt-3">Custom clothing done right </h1>
            <p class="text-black font-15 pt-2 pb-3 max-25 mx-auto mb-1">We make bespoke apparel for the world's best
                brands.</p>
            <a class="btnc bg-dark font-15 text-white px-4 px-lg-5 mb-5" href="<?php echo home_url(); ?>/contact-us/">
                Get a Quote </a>
        </div>
    </div>
</div>

<?php get_footer(); ?>