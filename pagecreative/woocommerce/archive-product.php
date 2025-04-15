<?php
/**
 * Template Name: Shop
 */

get_header(); ?>


<div class="container-fluid mx-auto px-md-4 pb-lg-5 mb-lg-5">
    <div class="category__filter">
        <?php
        $filter_shortcode2 = '[searchandfilter id="1102"]';
        $filter_html = do_shortcode($filter_shortcode2);
        echo $filter_html;
        ?>
    </div>
    <div class="row">
        <div class="col-12 col-lg-3">
            <div class="megafilter-group">
                <?php
                $filter_shortcode = '[searchandfilter id="1102"]';
                $filter_html = do_shortcode($filter_shortcode);
                echo $filter_html;
                ?>
            </div>
        </div>
        <div class="col-12 col-lg-9 postsrow">
            <div class="row">
                <?php
                if (have_posts()):
                    while (have_posts()):
                        the_post();
                        ?>
                        <div class="col-md-4 col-sm-6">
                            <!-- Bootstrap Card for Product -->
                            <div class="card">
                                <div class="card-body">
                                    <?php if (has_post_thumbnail()): ?>
                                        <div class="product-image">
                                            <?php the_post_thumbnail('medium'); ?>
                                        </div>
                                    <?php endif; ?>

                                    <h5 class="card-title"><?php the_title(); ?></h5>
                                    <p class="card-text"><?php echo $product->get_price_html(); ?></p>

                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">View Product</a>
                                </div>
                            </div>
                        </div>

                        <?php
                    endwhile;

                    the_posts_navigation();
                else:
                    echo 'No boats found.';
                endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Custom Bootstrap Layout for Shop Page -->
<div class="container-fluid px-0 mx-auto text-center">
    <!-- Optional: Display Page Content if needed -->
    <!--<div class="page-content">
                <?php
                while (have_posts()):
                    the_post();
                    the_content();
                endwhile;
                ?>
    </div>-->

    <!-- Custom Product Grid Layout with Bootstrap -->

    <!-- Optional: Pagination (if needed) -->
    <div class="pagination">
        <?php
        echo paginate_links(array(
            'total' => $product_query->max_num_pages
        ));
        ?>
    </div>
</div>

<?php get_footer(); ?>