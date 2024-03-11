<?php get_header() ?>

<div class="mb-hide">
	<h3> About the blog</h3>
	<p class="paper">
		<?=
			$about_us = get_field('about_us'); ?>
	</p>
	<div class="catergories">
		<h3 class="catergories mb-hide">categories</h3>
		<ul class="cat">
			<?php wp_list_categories(
				[
					'orderby' => 'id',
					'hide_empty' => false,
					'title_li' => "",
					'current_category' => 1,
					'class' => 'paper',
				]
			) ?>
		</ul>
	</div>
</div>
<h3 class="">related tags</h3>
<ul class="tags">
	<?php
	$tags = get_tags();
	if ($tags):
		foreach ($tags as $tag): ?>
			<li><a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" title="<?php echo esc_attr($tag->name); ?>">
					<?php echo esc_html($tag->name); ?>
				</a></li>
		<?php endforeach; ?>
	<?php endif; ?>
</ul>
<div class="recent-posts">
	<h3> recent posts</h3>

	<?php
	$new_blogs = new WP_Query([
		'post_type' => 'post',
		'posts_per_page' => 3,
		'post__not_in' => [get_the_ID()],
	]);
	?>
	<div class="blogs">
		<?php
		while ($new_blogs->have_posts()) {
			$new_blogs->the_post();
			$post_id = get_the_ID();
			get_template_part('/templates/components/cards/SingleBlog', 'card', ['post_id' => $post_id]);
		}
		?>
		<?php wp_reset_postdata() ?>

	</div>
</div>