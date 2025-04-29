<?php
/**
 * Template Name: Blog
 */

get_header(); ?>

<div class="postspage container-fluid mx-auto px-md-4 mx-auto text-left pt-lg-4">
    <div class="postcategory__filter d-flex flex-wrap gap-2 py-3 bordertop borderbottom" id="categoryFilter">

        <div class="d-none d-md-flex flex-wrap gap-2" id="categoryButtons">
            <button class="catbtn active" data-cat="all">All</button>
            <?php
            $categories = get_categories(array('hide_empty' => false));
            foreach ($categories as $category) {
                echo '<button class="catbtn" data-cat="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</button>';
            }
            ?>
        </div>

        <div class="d-md-none w-100 pt-1">
            <h2 class="font-18 text-black bordertop py-3 mb-0 mt-3">Filter Blog Categories</h2>
            <select id="categorySelect" class="cat-select">
                <option value="all">All</option>
                <?php
                foreach ($categories as $category) {
                    echo '<option value="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</option>';
                }
                ?>
            </select>
        </div>
    </div>

    <?php if (get_query_var('paged') < 2): ?>
        <div class="stickyrow row pt-4 pt-lg-5">
            <?php
            $sticky = get_option('sticky_posts');
            rsort($sticky);
        
            $latest_query = new WP_Query(array(
                'post__in' => array_slice($sticky, 0, 1), // only latest sticky
                'ignore_sticky_posts' => 1,
                'post_type' => 'post'
            ));
            $excluded_post_ids = !empty($sticky) ? array_slice($sticky, 0, 1) : array();
        
            if ($latest_query->have_posts()):
                while ($latest_query->have_posts()):
                    $latest_query->the_post();
                    $post_categories = get_the_category();
                    $cat_slugs = wp_list_pluck($post_categories, 'slug');
                    $cat_names = wp_list_pluck($post_categories, 'name');
                    ?>
                    <div class="col-12 mb-3 mb-lg-3">
                        <div class="row justify-content-between">
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
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    <?php endif; ?>


    <div class="row pt-4 pt-lg-5 pb-5" id="postGrid">
        <?php
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $cat = get_query_var('category_name') ? get_query_var('category_name') : '';
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 4,
            'paged' => $paged,
            'post__not_in' => $excluded_post_ids,
            'ignore_sticky_posts' => 1,
        );
        if ($cat && $cat !== 'all') {
            $args['category_name'] = $cat;
        }

        $latest_query = new WP_Query($args);
        if ($latest_query->have_posts()):
            while ($latest_query->have_posts()):
                $latest_query->the_post();
                $post_categories = get_the_category();
                $cat_slugs = wp_list_pluck($post_categories, 'slug');
                $cat_names = wp_list_pluck($post_categories, 'name');
                ?>
                <div class="col-lg-6 post-item mb-4 mb-lg-5" data-cats="<?php echo implode(' ', $cat_slugs); ?>">
                    <div class="row justify-content-between">
                        <div class="col-4 col-lg-4 pr-1">
                            <div class="postarea__image-container h-100 pr-lg-3">
                                <img class="w-100" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
                                    alt="<?php the_title(); ?>">
                            </div>
                        </div>
                        <div class="col-8 col-lg-8 px-2 bordertop">
                            <a class="postarea__link align-self-center" href="<?php the_permalink(); ?>">
                                <div class="pt-3 pt-lg-3 mt-lg-2">
                                    <span class="font-13 font-mb-12 uppercase text-gray mb-0">
                                        <span><?php echo esc_html(implode(', ', $cat_names)); ?></span>
                                    </span>
                                    <h2 class="text-black font-20 font-mb-16 mt-2 mt-lg-2 pb-0 mb-1 max-30">
                                        <?php the_title(); ?>
                                    </h2>
                                </div>
                                <span class="text-sec font-13 underline align-self-center">Read more</span>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
            endwhile;
            ?>
            <div class="bordertop justify-items-start w-100 mt-4 pt-4 pt-lg-3 mt-lg-4 w-100 mx-3 mx-lg-3 pb-4">
                <div class="pagination-btns mt-4 mt-lg-5 d-flex">
                    <div class="prev"><?php previous_posts_link('Previous'); ?></div>
                    <div class="next ml-auto"><?php next_posts_link('Next', $latest_query->max_num_pages); ?></div>
                </div>
            </div>
            <?php
            wp_reset_postdata();
        else:
            echo '<p>No posts found.</p>';
        endif;
        ?>

    </div>
</div>


<?php get_footer(); ?>