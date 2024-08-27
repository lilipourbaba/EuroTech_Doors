<?php
$post_id = isset ($args['post_id']) ? $args['post_id'] : get_the_ID();
$author_name = get_the_author_meta('display_name', get_post_field('post_author', $post_id));
?>
<a href="<?php the_permalink($post_id) ?>">
	<div class="blog-posts">
		<?= get_the_post_thumbnail($post_id, 'full') ?>
		<div class="post-detail">
			<h5>
				<?= get_the_title($post_id) ?>
			</h5>

			<div class="postmeta">
				<div>
					<span class="meta-date meta">
						<?= get_the_date('d M') ?>
					</span>
					.<span class="meta-comment meta">
						<?= cyn_reading_time(get_the_ID()) . " Read"; ?>
					</span>
					</span>
				</div>
				<span class="meta-comment meta"><i class="iconsax" icon-name="eye"></i>
					<?php echo getPostViews(get_the_ID()) . " view"; ?>
				</span>
			</div>
		</div>
	</div>
</a>