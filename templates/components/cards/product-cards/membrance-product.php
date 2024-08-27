<?php $post_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID();
$membrance_image = get_field('membrance_category' , $post_id);
     ?>

<div class="membrance-card">
          <p class="hide"><?= get_the_title($post_id); ?>
</p> 

    <div class="gallery">
    <img src="<?= isset($membrance_image['membrance_image_1'])? $membrance_image['membrance_image_1'] :''?>" class="  " alt="">
    <div class="card">
        <img src="<?= isset($membrance_image['membrance_image_2']) ? $membrance_image['membrance_image_2'] : '' ?>" class="  " alt="">
        <p><?= isset($membrance_image['subtitle_of_membrance_image_2']) ? $membrance_image['subtitle_of_membrance_image_2'] : ''; ?> </p>
        <img src="<?= isset($membrance_image['membrance_image_3']) ? $membrance_image['membrance_image_3'] : '' ?>" class="card-margin" alt="">
        <p><?= isset($membrance_image['subtitle_of_membrance_image_3']) ? $membrance_image['subtitle_of_membrance_image_3'] : ''; ?>
        </p>
    </div>
    </div>
    <div class="title">
          <p class="mb-hide"><?= get_the_title($post_id); ?></p>
       <a href="<?php the_permalink($post_id) ?>" class="more">View product</a>
    </div>
</div>