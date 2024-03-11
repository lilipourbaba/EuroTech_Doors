<?php
$post_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID();
$author_name = get_the_author_meta('display_name', get_post_field('post_author', $post_id));
?>
<a href="<?php the_permalink($post_id) ?>">
	<div class="blog-posts paper">
		<?= get_the_post_thumbnail($post_id, 'full') ?>
		<div class="post-detail">
			<h5>
				<?= get_the_title($post_id) ?>
			</h5>
			<div class="paragraph">
				<?= get_the_content() ?>
			</div>
			<div class="postmeta">
				<div>
					<span class="meta-date meta">
						<?= get_the_date() ?>
					</span>
					<span class="meta-comment meta">
						<?php echo getPostViews(get_the_ID()); ?>
					</span>
					</span>
				</div>
				<span class="meta-comment meta"><i class="iconsax" icon-name="eye"></i>
					<?php echo getPostViews(get_the_ID()); ?>
				</span>
			</div>
		</div>
	</div>
</a>