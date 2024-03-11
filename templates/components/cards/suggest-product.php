<?php $post_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID(); ?>

<div class="product-card">
    <div>
        <img src="<?= get_field("product_secound_image") ?>" />

        <div class="detail">
            <h4>
                <?= get_the_title($post_id) ?>
            </h4>
            <a href="<?php the_permalink($post_id) ?>"> <i class="iconsax" icon-name="arrow-right"></i>
            </a>
        </div>
    </div>
</div>