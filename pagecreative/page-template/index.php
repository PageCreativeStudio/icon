<?php
/**
 * Template Name: Index
 */

get_header(); ?>

<div class="container-fluid px-0 mx-auto text-center">
    <?php the_content(); ?>
</div>

<section class="pb-4 pb-lg-5 pt-0 imageswith__text">
    <div class="container-fluid w-100 mx-auto px-lg-4 mx-auto text-left pb-4 pb-lg-5">
        <div class="row">
            <div class="col-12 col-lg-6 pl-lg-4 twoimages order-1 order-lg-2 ">
                <div class="d-flex">
                    <img class="w-100" src="https://pagedev.co.uk/clients/icon/wp-content/uploads/2025/05/05308efe-fd0a-4ff8-a65f-16446aacd241_Look1_6928129.jpg.png"
                        alt="<?php echo get_field('image_right_title'); ?>">
                    <img class="w-100 d-none d-lg-flex"
                        src="https://pagedev.co.uk/clients/icon/wp-content/uploads/2025/05/05308efe-fd0a-4ff8-a65f-16446aacd241_Look1_6928129.jpg.png"
                        alt="<?php echo get_field('image_right_title'); ?>">
                </div>
            </div>
            <div class="col-12 col-lg-6 order-2 order-lg-1 pt-3 pt-lg-0 align-content-center">
                <div class="max-45">
                    <h2 class="font-25 font-mb-20 text-black my-0 pb-3">
                        Level up your merch with ICON
                    </h2>
                    <p class="font-16 font-mb-15 text-gray my-0 pb-2">Custom merch gets a bad rap. For good reason: it's
                        often cheaply made, badly designed,
                        and quickly headed for the bin. We're here to change all that. ICON Printing is based in
                        London, and uses the highest quality garments available for our printing, so you can be
                        sure of merch to take pride in.
                    </p>
                    <ul class="m-0 p-0">
                        <li class="d-flex"><img src="" alt="">Multiple printing methods</li>
                    </ul>
                    <div class="d-flex flex-wrap align-content-center">
                        <a href="" class="btnc bg-dark font-15 text-white mr-3 mb-0"></a>
                        <a href="" class="btna mb-0"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>