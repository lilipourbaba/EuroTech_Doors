<?php
$post_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID();
$author_name = get_the_author_meta('display_name', get_post_field('post_author', $post_id));

?>
<a href="<?php the_permalink($post_id) ?>">
	<div class="blog-post">
		<?= get_the_post_thumbnail($post_id, 'full') ?>
		<div class="post-detail">
			<h2>
				<?= get_the_title($post_id) ?>
			</h2>
			<div class="paragraph mb-hide">
				<?= get_the_content() ?>
			</div>
			<div class="postmeta">


				<span class="meta"><i class="iconsax" icon-name="eye"></i>
					<?= getPostViews(get_the_ID()); ?>
				</span>
				<div class="meta">
					<span>
						<?= get_the_date('d M') ?>
					</span> .
					<span>
						<?php echo cyn_reading_time(get_the_ID()) . " Read"; ?>
					</span>
					</span>

				</div>
			</div>
		</div>
	</div>
</a>