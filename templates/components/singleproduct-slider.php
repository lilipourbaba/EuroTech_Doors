<?php
$post_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID();
$image_gallery = get_field("product_gallery");
 
?>
<div class="gallery-slider">
    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper product_gallery   ">
        <div class="swiper-wrapper">
            <?= get_the_post_thumbnail($post_id, 'full swiper-slide') ?>
                 <?php foreach ($image_gallery as $gallery):

                    if (!$gallery) continue; 
                ?>

                    <img src="<?= $gallery  ?>" class="swiper-slide" alt="">
                    
                    <?php           

                endforeach;
            ?>
 
        </div>
        <div class="buttons">

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
    <div thumbsSlider="" class="swiper thumbSwiper">
        <div class="swiper-wrapper">

            <?php if (isset($image_gallery)): ?>
                                        <?= get_the_post_thumbnail($post_id, 'full swiper-slide') ?>

                 <?php foreach($image_gallery as $gallery):
                     if (!$gallery)
                         continue;?>
                     <img src="<?=  $gallery  ?>"
                        class="swiper-slide" alt="">
                    <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</div>