<section class="hero d-flex flex-wrap justify-content-between align-items-center">
    <?php if (get_field("hero_titleo")): ?>
        <h1><?php echo get_field('hero_title'); ?></h1>
    <?php endif; ?>

    <?php if (get_field("hero_description")): ?>
        <p><?php echo get_field('hero_description'); ?></p>
    <?php endif; ?>

    <?php if (get_field("hero_image")): ?>
        <img src="<?php echo get_field('hero_image'); ?>" alt="">
    <?php endif; ?>
</section>