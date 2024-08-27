<?php $post_id = isset ($args['post_id']) ? $args['post_id'] : get_the_ID();
$product_cat = get_the_terms($post_id, 'product_cat');
?>
<div class="product-card">
    <a href="<?php the_permalink($post_id) ?>">
        <div class="card">
          <?= get_the_post_thumbnail($post_id, 'full') ?>
            <div class="detail">
                <p class="paragraph">
                    <?= get_the_title($post_id); ?>
                </p>
                <p class="cat">
                    <span class="cat-name">
                        <?= is_array($product_cat) ? $product_cat[0]->name : '';
                        ?>
                    </span>
                   <i class="iconsax more"
                            icon-name="arrow-right"></i>
                </p>
            </div>
        </div>
    </a>
</div>