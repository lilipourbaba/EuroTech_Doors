<?php $post_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID(); ?>
<div class="swiper-slide">
	<a href="<?php the_permalink($post_id) ?>">
		<h2>
			<?= get_the_title($post_id) ?>

		</h2>
		<div class="paragraph">
			<?= get_the_content() ?>
		</div>
	</a>
</div>