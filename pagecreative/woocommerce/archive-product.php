<?php
/**
 * Template Name: Custom Shop Page
 */

get_header(); ?>

<!-- Custom Bootstrap Layout for Shop Page -->
<div class="container-fluid px-0 mx-auto text-center">
    <!-- Optional: Display Page Content if needed -->
    <div class="page-content">
        <?php
        while ( have_posts() ) :
            the_post();
            the_content(); // Displays the content of the page (e.g., any introductory text)
        endwhile;
        ?>
    </div>

    <!-- Custom Product Grid Layout with Bootstrap -->
    <div class="row">
        <?php
        // WP Query to fetch products manually
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 12, // Change to the number of products you want to display
            'paged' => get_query_var('paged', 1),
        );
        $product_query = new WP_Query( $args );

        if ( $product_query->have_posts() ) :
            while ( $product_query->have_posts() ) : $product_query->the_post();
                global $product;
                ?>
                <div class="col-md-4 col-sm-6">
                    <!-- Bootstrap Card for Product -->
                    <div class="card">
                        <div class="card-body">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="product-image">
                                    <?php the_post_thumbnail( 'medium' ); ?>
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
            wp_reset_postdata();
        else :
            echo '<p>No products found</p>';
        endif;
        ?>
    </div>

    <!-- Optional: Pagination (if needed) -->
    <div class="pagination">
        <?php
        echo paginate_links( array(
            'total' => $product_query->max_num_pages
        ) );
        ?>
    </div>
</div>

<?php get_footer(); ?>
