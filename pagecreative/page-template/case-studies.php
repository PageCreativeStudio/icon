<?php
/**
 * Template Name: Case studies
 */

get_header(); ?>

<div class="container-fluid mx-auto px-md-4 mx-auto text-left">
    <h2 class="bordertop borderbottom font-25 font-mb-22 mb-lg-3 py-4">Case studies</h2>
    <?php
    $total_posts = wp_count_posts()->publish;
    $sticky_posts = get_option('sticky_posts');
    $latest_args = array(
        'post_type' => 'case-studies',
        'posts_per_page' => 4,
        'post__not_in' => $sticky_posts,
    );
    $latest_query = new WP_Query($latest_args);
    if ($latest_query->have_posts()):
        ?>
        <div class="row pt-4" id="posts-container">
            <?php while ($latest_query->have_posts()):
                $latest_query->the_post(); ?>
                <div class="col-12 col-lg-6 px-2 mb-3 mb-lg-4">
                    <a class="newsarea__link" href="<?php the_permalink(); ?>">
                        <div class="newsarea__image-container">
                            <img class="w-100" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
                                alt="<?php the_title(); ?>">
                        </div>
                        <h2 class="text-dark font-25 font-mb-22 pt-3 pb-0 mb-2">
                            <?php the_title(); ?>
                        </h2>
                        <p class="font-15">

                        </p>
                        <span class="text-sec font-13 underline">Read more</span>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>

        <?php if ($total_posts > 4): ?>
            <div id="loadMoreBtn" class="text-center mt-4 mb-5">
                <button class="btna border-0 text-dark" style="background:#E7E7E7">Load More
                    Posts</button>
            </div>
        <?php endif; ?>

        <script>
            let offset = 3;
            const totalPosts = <?php echo $total_posts; ?>;

            document.getElementById('loadMoreBtn').addEventListener('click', function () {
                fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'action=load_more_posts&offset=' + offset
                })
                    .then(response => response.text())
                    .then(data => {
                        if (data) {
                            document.getElementById('posts-container').insertAdjacentHTML('beforeend', data);
                            offset += 4;

                            if (offset >= totalPosts) {
                                document.getElementById('loadMoreBtn').style.display = 'none';
                            }
                        }
                    });
            });
        </script>
        <?php wp_reset_postdata(); endif; ?>

</div>

<?php get_footer(); ?>