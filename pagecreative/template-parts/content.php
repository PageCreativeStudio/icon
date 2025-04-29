<?php
/**
 * Template part for displaying content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pagecreative
 */
get_header(); ?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <section class="singlepost pb-2">
        <div class="heroarea text-center pb-4">
            <div class="max-50 text-center mx-auto w-100 px-3 pt-3 pt-lg-4">
                <span class="font-14 font-mb-13 uppercase text-gray mb-0">
                    <?php
                    $categories = get_the_category();
                    if (!empty($categories)) {
                        echo esc_html(implode(', ', wp_list_pluck($categories, 'name')));
                    }
                    ?>
                </span>

                <h1 class="text-black font-30 font-mb-22 mb-4 pb-0 pt-0 text-center mx-auto pt-3 mt-0 px-2">
                    <?php the_title(); ?>
                </h1>
            </div>
            <img class="w-100 hero__image heromobile__image max-80 text-center"
                src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php the_title(); ?>">
        </div>
    </section>


    <div class="container-fluid max-50 mx-auto px-2">
        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumbs mb-0 font-13 pb-2 mb-0">', '</p>');
        }
        ?>
        <div class="singlecontent pb-5 pt-5">
            <?php the_content(); ?>
            <div class="pt-lg-4">
                <div class="d-flex flex-wrap justify-content-center pt-5">
                    <a class="mr-2" href="javascript:void(0);" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(window.location.href), 'facebook-share-dialog', 'width=626,height=436');return false;" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                            <path
                                d="M18.2129 9.85156C18.2129 4.88104 14.1834 0.851562 9.21289 0.851562C4.24237 0.851562 0.212891 4.88104 0.212891 9.85156C0.212891 14.0722 3.11881 17.6139 7.03885 18.5866V12.602H5.18305V9.85156H7.03885V8.66644C7.03885 5.6032 8.42521 4.18336 11.4327 4.18336C12.0029 4.18336 12.9868 4.29532 13.3893 4.40692V6.89992C13.1769 6.8776 12.8079 6.86644 12.3496 6.86644C10.8739 6.86644 10.3037 7.42552 10.3037 8.87884V9.85156H13.2434L12.7384 12.602H10.3037V18.7857C14.7601 18.2475 18.2133 14.4531 18.2133 9.85156H18.2129Z"
                                fill="black" />
                        </svg>
                    </a>
                    <a class="mr-2" href="javascript:void(0);" onclick="window.open('https://twitter.com/intent/tweet?url=' + encodeURIComponent(window.location.href) + '&text=' + encodeURIComponent(document.title), 'twitter-share-dialog', 'width=626,height=436'); return false;" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                            <path
                                d="M14.4068 2.27942H16.9369L11.4094 8.59704L17.9121 17.1939H12.8205L8.83264 11.9799L4.26957 17.1939H1.73793L7.65019 10.4365L1.41211 2.27942H6.63294L10.2377 7.04517L14.4068 2.27942ZM13.5188 15.6795H14.9208L5.87116 3.71427H4.36671L13.5188 15.6795Z"
                                fill="black" />
                        </svg>
                    </a>
                    <?php
                    $share_url = urlencode(get_permalink());
                    $image_url = urlencode(get_the_post_thumbnail_url(get_the_ID(), 'full'));
                    $title     = urlencode(get_the_title());
                    ?>
                    <a class="mr-2" href="https://pinterest.com/pin/create/button/?url=<?php echo $share_url; ?>&media=<?php echo $image_url; ?>&description=<?php echo $title; ?>" onclick="window.open(this.href, 'pinterest-share-dialog', 'width=750,height=550'); return false;" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0.111328 9.81216C0.111328 14.6968 4.13322 18.6577 9.09635 18.6577C14.0585 18.6577 18.0814 14.6968 18.0814 9.81216C18.0814 4.92753 14.0585 0.967529 9.09635 0.967529C4.13322 0.967529 0.111328 4.92753 0.111328 9.81216ZM6.11822 17.2766C3.08952 16.1085 0.943359 13.2077 0.943359 9.81231C0.943359 5.38432 4.58895 1.79663 9.08628 1.79663C13.5836 1.79663 17.2292 5.38432 17.2292 9.81231C17.2292 14.2394 13.5836 17.828 9.08628 17.828C8.2461 17.828 7.43671 17.7029 6.67545 17.4699C7.00652 16.9375 7.50312 16.0649 7.68694 15.3686C7.78607 14.9935 8.19413 13.4635 8.19413 13.4635C8.45975 13.9618 9.23545 14.3843 10.0612 14.3843C12.5163 14.3843 14.2862 12.1608 14.2862 9.39832C14.2862 6.75042 12.0909 4.76853 9.26625 4.76853C5.7525 4.76853 3.8864 7.09147 3.8864 9.62C3.8864 10.7947 4.52158 12.2594 5.53789 12.7255C5.69283 12.7956 5.7756 12.7643 5.81121 12.6175C5.82212 12.5726 5.85117 12.4566 5.88597 12.3176C5.93713 12.1134 6.00072 11.8595 6.03737 11.7089C6.05662 11.6275 6.047 11.5583 5.98059 11.4787C5.64375 11.0771 5.37524 10.3381 5.37524 9.64937C5.37524 7.88158 6.73512 6.17063 9.05163 6.17063C11.0525 6.17063 12.4528 7.5121 12.4528 9.43147C12.4528 11.6 11.3402 13.1025 9.89277 13.1025C9.09398 13.1025 8.49536 12.4526 8.68688 11.654C8.76998 11.3097 8.88109 10.9556 8.98913 10.6113C9.18013 10.0026 9.36152 9.42457 9.36152 8.98526C9.36152 8.36947 9.02565 7.856 8.33175 7.856C7.51371 7.856 6.85831 8.68779 6.85831 9.80284C6.85831 10.5124 7.1018 10.9927 7.1018 10.9927C7.1018 10.9927 6.29434 14.3512 6.14709 14.9764C5.98348 15.6699 6.047 16.6428 6.11822 17.2766Z"
                                fill="black" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="postspage container-fluid mx-auto px-md-4 mx-auto ">
        <h2 class="text-black font-22 font-mb-20 text-left pb-3 bordertop pt-5 mt-4">Related Post</h2>
        <div class="row pt-2 pt-lg-3 pb-5">
            <?php
            $current_post_id = get_the_ID();

            $related_args = array(
                'post_type' => 'post',
                'posts_per_page' => 2,
                'post__not_in' => array($current_post_id),
                'ignore_sticky_posts' => 1,
            );

            $related_query = new WP_Query($related_args);

            if ($related_query->have_posts()):
                while ($related_query->have_posts()):
                    $related_query->the_post();
                    $post_categories = get_the_category();
                    $cat_slugs = wp_list_pluck($post_categories, 'slug');
                    $cat_names = wp_list_pluck($post_categories, 'name');
                    ?>
                    <div class="col-lg-6 post-item mb-4 mb-lg-5 pr-lg-5" data-cats="<?php echo esc_attr(implode(' ', $cat_slugs)); ?>">
                        <div class="row justify-content-between">
                            <div class="col-4 col-lg-4 pr-1">
                                <div class="postarea__image-container h-100 pr-lg-3">
                                    <img class="w-100"
                                        src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>"
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
                wp_reset_postdata();
            else:
                echo '<p>No posts found.</p>';
            endif;
            ?>
        </div>


    </div>


</article><!-- #post-<?php the_ID(); ?> -->



<?php get_footer(); ?>