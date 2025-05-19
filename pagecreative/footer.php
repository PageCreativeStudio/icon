<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pagecreative
 */

?>

<div id="quickquoteDrawer" class="quickquote__opener">
    <div class="max-40 bg-white py-4 px-3 px-md-4">
        <span class="closedrawer pl-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                <path d="M1.0907 13L13.3 1M1.0907 1L13.3 13" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </span>

        <div id="quickquoteContent">
            <div class="borderbottom pb-0 pt-4">
                <div class="d-flex flex-wrap justify-content-between pb-0">
                    <p class="font-15 font-mb-14 mb-0" id="drawer-product-title"></p>
                    <p class="font-15 font-mb-14 mb-0" id="drawer-product-sku"></p>
                </div>
                <h1 class="font-25 font-mb-20 mb-2 mt-2" id="drawer-product-name"></h1>
                <h2 class="font-15 product-price pb-2">From <span class="font-15" id="drawer-product-price"></span>/<span class="text-gray font-14">unit</span></h2>
            </div>

            <div class="custom-fields-wrapper">
                <p>Loading custom options…</p>
            </div>
        </div>
    </div>
</div>


<footer id="colophon" class="site-footer bg-lightgray pt-4 pt-lg-5 px-md-4 pb-lg-4">
    <div class="container-fluid mx-auto">
        <div class="row py-3 py-lg-5 mt-2 mt-lg-0">
            <div class="col-12 col-lg-4 col-xl-2 pb-4 pb-lg-0 mb-2 mb-lg-0">
                <img class="w-100 max-6"
                    src="<?php echo esc_url(get_template_directory_uri() . '/include/images/svg-logo.svg'); ?>"
                    alt="icon printing london logo">
            </div>
            <div class="col-12 col-lg-4 col-xl footermenu">
                <h2 class="text-black font-bold font-16 mb-2 mt-2 pb-3">
                    <?php echo get_field('footer_1_title', 'options'); ?>
                </h2>
                <ul class="p-0 m-0 list-unstyled">
                    <?php if (have_rows('menu_repeater_1', 'options')) { ?>
                        <?php while (have_rows('menu_repeater_1', 'options')) {
                            the_row(); ?>
                            <li class="pb-2 pb-lg-2"><a class="font-15 text-gray"
                                    href="<?php echo get_sub_field('item_link'); ?>"><?php echo get_sub_field('menu_item'); ?></a>
                            </li>
                        <?php } ?>
                    <?php } ?>

                </ul>
            </div>
            <div class="col-12 col-lg-4 col-xl footermenu">
                <h2 class="text-black font-bold font-16 mb-2 mt-2 pb-3">
                    <?php echo get_field('footer_2_title', 'options'); ?>
                </h2>
                <ul class="p-0 m-0 list-unstyled">
                    <?php if (have_rows('menu_repeater_2', 'options')) { ?>
                        <?php while (have_rows('menu_repeater_2', 'options')) {
                            the_row(); ?>
                            <li class="pb-2 pb-lg-2"><a class="font-15 text-gray"
                                    href="<?php echo get_sub_field('item_link'); ?>"><?php echo get_sub_field('menu_item'); ?></a>
                            </li>
                        <?php } ?>
                    <?php } ?>

                </ul>
            </div>
            <div class="col-12 col-lg-4 col-xl footermenu pt-lg-4 pt-xl-0">
                <h2 class="text-black font-bold font-16 mb-2 mt-2 pb-3">
                    <?php echo get_field('footer_3_title', 'options'); ?>
                </h2>
                <ul class="p-0 m-0 list-unstyled">
                    <?php if (have_rows('menu_repeater_3', 'options')) { ?>
                        <?php while (have_rows('menu_repeater_3', 'options')) {
                            the_row(); ?>
                            <li class="pb-2 pb-lg-2"><a class="font-15 text-gray arrowup"
                                    href="<?php echo get_sub_field('item_link'); ?>" target="_blank"><?php echo get_sub_field('menu_item'); ?></a>
                            </li>
                        <?php } ?>
                    <?php } ?>

                </ul>
            </div>
            <div class="col-12 col-lg-4 col-xl footermenu pt-lg-4 pt-xl-0">
                <h2 class="text-black font-bold font-16 mb-2 mt-2 pb-3">
                    <?php echo get_field('footer_4_title', 'options'); ?>
                </h2>
                <ul>
                    <?php if (have_rows('contact_editor', 'options')) { ?>
                        <?php while (have_rows('contact_editor', 'options')) {
                            the_row();
                            $item_link = get_sub_field('item_link');
                            $menu_item = get_sub_field('menu_item');
                            ?>
                            <li class="pb-2 pb-lg-2">
                                <?php if ($item_link) { ?>
                                    <a class="font-15 text-gray" href="<?php echo esc_url($item_link); ?>">
                                        <?php echo esc_html($menu_item); ?>
                                    </a>
                                <?php } else { ?>
                                    <span class="font-15 text-gray">
                                        <?php echo esc_html($menu_item); ?>
                                    </span>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>

            </div>
            <div class="col-12 col-lg-4 col-xl-3 newsletterarea pt-lg-4 pt-xl-0">
                <div class="max-20">
                    <h2 class="text-black font-bold font-16 mb-2 mt-2 pb-3">Newsletter</h2>
                    <p class="text-gray font-15">Tips and special offers with our monthly newsletter.</p>
                    <!-- HTML Form -->
                    <div class="footersignup pt-2 pb-4">
                        <div class="_form_7"></div><script src="https://iconprinting.activehosted.com/f/embed.php?id=7" charset="utf-8"></script>
                    </div>

                </div>
            </div>
        </div>


    </div>
</footer>
<div class="footercopyright" style="background:#f3f3f3">
    <div class="py-2 py-lg-3 mx-0">
        <div class="col-12 max-60 mx-auto text-center py-1">
            <p class="text-gray font-mb-10 font-12 mb-0"><?php echo get_field('copyright', 'options'); ?></h2>
            </p>
        </div>
    </div>
</div>

</div>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->

<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- Files Path -->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/common.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/custom-product.js"></script>
<?php wp_footer(); ?>
</main>
</body>

</html>