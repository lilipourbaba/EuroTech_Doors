<?php
$post_id = $args['post_id'];
$author_name = get_the_author_meta('display_name', get_post_field('post_author', $post_id));
?>
<a href="<?php the_permalink($post_id) ?>">
	<div class="blog-posts paper">
		<h3>
			<?= get_the_title($post_id) ?>
		</h3>
		<div class="paragraph">
			<?php echo get_the_content(post: $post_id) ?>
		</div>
	</div>
</a>