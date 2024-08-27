<?php
$post_id = $args['post_id'];
$counter = $args['counter'];
$author_name = get_the_author_meta('display_name', get_post_field('post_author', $post_id));
?>
<a href="<?php the_permalink($post_id) ?>" class="popular-post">
	<span class='number'>
		<?= "0" . $counter; ?>
	</span>
	<div class="blog-posts">
		<h3>
			<?= get_the_title($post_id) ?>
		</h3>
		<div class="paragraph">
			<?php echo get_the_excerpt($post_id); ?>
		</div>
	</div>
</a>