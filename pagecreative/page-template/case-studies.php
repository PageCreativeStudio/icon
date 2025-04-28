<?php
/**
 * Template Name: Case studies
 */

get_header(); ?>

<div class="container-fluid px-0 mx-auto text-center">
    <h2 class="bordertop borderbottom font-25 font-mb-22 mb-0 py-4">Case studies</h2>
    <div class="row">
        <div class="col-12 col-xl-9">
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
                <div class="row pt-3" id="posts-container">
                    <?php while ($latest_query->have_posts()):
                        $latest_query->the_post(); ?>
                        <div class="col-12 col-lg-6 px-2 pb-4 pb-lg-0 mb-0 mb-lg-5">
                            <a class="newsarea__link mx-1" href="<?php the_permalink(); ?>">
                                <div class="newsarea__image-container">
                                    <svg class="hover-svg" xmlns="http://www.w3.org/2000/svg" width="28" height="53"
                                        viewBox="0 0 28 53" fill="none">
                                        <path d="M1.48633 1.67188L26.4863 26.6719L1.48633 51.6719" stroke="#F5B230"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
                                        alt="<?php the_title(); ?>">
                                </div>
                                <p class="newsarea__catbtn bg-sec text-pri uppercase">
                                    <?php
                                    $categories = get_the_category();
                                    if (!empty($categories)) {
                                        $category_names = wp_list_pluck($categories, 'name');
                                        echo implode(', ', $category_names);
                                    }
                                    ?>
                                </p>
                                <h2 class="text-dark font-18 font-600 mt-2 py-3 mb-0 mb-md-2 pr-3 pl-2 pr-md-5">
                                    <?php the_title(); ?>
                                </h2>
                                <span class="text-sec font-13 font-600 btnarrowsec ml-2">Load more Case Studies</span>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>

                <?php if ($total_posts > 15): ?>
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
                                    offset += 15;

                                    if (offset >= totalPosts) {
                                        document.getElementById('loadMoreBtn').style.display = 'none';
                                    }
                                }
                            });
                    });
                </script>
                <?php wp_reset_postdata(); endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>