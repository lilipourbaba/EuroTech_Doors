<?php

$post_id = $args['post_id'];
$post_img = get_the_post_thumbnail_url($post_id, 'full');

?>


<a href="<?php the_permalink($post_id) ?>" class="home__top-blogs__posts__card" style="background-image:url('<?= $post_img ?>')">

    <div class="home__top-blogs__posts__card__content">

        <div class="home__top-blogs__posts__card__content__title">
            <?php the_title(); ?>
        </div>

        <div class="home__top-blogs__posts__card__content__expert-and-btn">

            <?php the_excerpt(); ?>

            <button class="button-primary">
                <i class="iconsax" icon-name="arrow-up"></i>
            </button>

        </div>

    </div>

</a>