<section class="pb-5">
    <div class="container-fluid px-0 mx-auto mx-0">
        <div class="casestudies__slider owl-carousel owl-theme">
            <?php
            $args = array(
                'post_type'      => 'case-studies',
                'posts_per_page' => -1, 
                'post_status'    => 'publish'
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
            ?>
                    <div class="casestudy__item">
                        <div class="casestudy-wrapper">
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php the_title(); ?>">
                            <div class="item_content text-center">
                                <h3 class="text-dark font-20 mb-0 pb-3">
                                    <?php the_title(); ?>
                                </h3>
                                <a class="text-dark font-15 mb-0" href="<?php the_permalink(); ?>">find out more</a>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>