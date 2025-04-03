<section class="pb-5">
    <div class="container-fluid px-0 mx-auto mx-0 text-center">
        <h2 class="font-18 font-mb-18 text-black mb-0 pb-0"><?php echo get_field('case_studies_title'); ?></h2>
        <a href="<?php echo home_url(); ?>/case-studies/" class="text-dark d-inline-block font-14 arrowblack mb-4 pb-2"><?php echo get_field('case_studies_sub_title'); ?></a>
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
                            <div class="item_content text-center px-2 px-md-3">
                                <h3 class="text-white font-22 font-mb-18 mb-0 pb-1">
                                    <?php the_title(); ?>
                                </h3>
                                <a class="text-white font-15 mb-0 arrowwhite" href="<?php the_permalink(); ?>">Find out more</a>
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