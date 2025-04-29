<?php
/**
 * Template Name: Contact
 */

get_header(); ?>


<div class="container-fluid mx-auto px-md-4 mx-auto text-left pb-5 pt-3 pt-lg-4">
    <h2 class="bordertop borderbottom font-18 font-mb-16 mb-lg-3 py-3">Contact</h2>
</div>

<div class="container-fluid mx-auto px-md-4 mx-auto text-left pb-5">
    <div class="row">
        <div class="col-12 col-lg-6 order-2 order-lg-1 pr-lg-5">
            <div class="stickytop">
                <img class="w-100 h-100 mb-lg-4 mt-5 mt-lg-0"
                    src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="Contact icon printing">
            </div>
        </div>
        <div class="col-12 col-lg-6 order-1 order-lg-2 align-content-start d-inline-grid">
            <h2 class="font-30 text-black font-mb-25 mb-0 pb-4">We're here to help</h2>
            <p class="font-18 text-black pb-3 mb-0 max-35">You can find answers to the most comon enquiries on our <a
                    class="underline" href="<?php echo home_url(); ?>/faqs/">FAQ</a>.
                If you still can't find what you're after, get in touch.</p>

            <span class="w-100 bordertop pt-4 mt-3">General enquiries</span>
            <p class="font-15 text-black pb-3 mb-0 pb-4">We're open Monday to Friday — 9am to 6pm</p>

            <a class="underline font-18 text-black" href="mailto:sales@iconprinting.com">sales@iconprinting.com</a>
            <a class="underline font-18 text-black" href="tel:+44 (0)207 1838431">+44 (0)207 183 8431</a>

            <span class="w-100 pt-4 mt-lg-3">Social</span>
            <a class="underline font-18 text-black arrowup" href="https://www.instagram.com/iconprinting/"
                target="_blank">Instagram</a>
            <a class="underline font-18 text-black arrowup" href="https://www.facebook.com/iconprinting/"
                target="_blank">Facebook</a>
            <a class="underline font-18 text-black arrowup" href="https://x.com/iconprinting/"
                target="_blank">Instagram</a>

            <span class="w-100 pt-4 mt-lg-3">Address</span>
            <p class="font-18 text-black mb-0">Unit 1, Ground Floor<br>
                55 Dalston Lane</p>
            <span class="w-100 text-black pt-4 mt-lg-3">London E8 2NG Meetings are strictly by appointment only</span>

        </div>
    </div>
</div>



<?php get_footer(); ?>