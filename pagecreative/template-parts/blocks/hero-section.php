<section>
    <div class="heroarea">
        <div class="heroarea__container">
            <img src="<?php echo get_field('hero_image'); ?>" alt="<?php echo get_field('hero_title'); ?>">
            <div class="heroarea__inner">
                <div>
                    <?php if (get_field("hero_title")): ?>
                        <h1 class="text-white font-35 font-mb-30 mb-0 pb-0"><?php echo get_field('hero_title'); ?></h1>
                    <?php endif; ?>
                    <?php if (get_field("hero_description")): ?>
                        <p class="text-white font-15 py-3"><?php echo get_field('hero_description'); ?></p>
                    <?php endif; ?>
                    <?php if (get_field("hero_description")): ?>
                        <a class="btna bg-white text-black" href="<?php echo get_field('button_link'); ?>">
                            <?php echo get_field('button_label'); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>