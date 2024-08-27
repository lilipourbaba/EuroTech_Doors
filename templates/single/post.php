<?php get_header() ?>
<?php
$post_id = isset ($args['post_id']) ? $args['post_id'] : get_the_ID();
$about_us = get_field('about_us');
$author_name = get_the_author_meta('display_name', get_post_field('post_author', get_the_ID()));
?>
<main class="single-post-page">
	<div class="post-image">
		<?= get_the_post_thumbnail($post_id, 'full') ?>
	</div>
	<div class="single-blog container">
		<div class="single-sidebar">
			<?php
			get_template_part(
				'templates/components/sidebar/singleblog-sidebar',
				null,
			);
			?>
		</div>
		<div class="post-main">
			<div class="hide">
				<h3> About the blog</h3>
				<p class="paper">

					<?php echo $about_us ?>
				</p>

				<h3>categories</h3>
				<ul class="cat">
					<!-- <li class="current-cat"><i class="iconsax" icon-name="flash-1"></i>
						<?= get_cat_name($category_id = 4);


						?>
					</li> -->
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
			<h1>
				<?= get_the_title($post_id) ?>
			</h1>
			<div class="postmeta">

				<span class="meta-comment meta"><i class="iconsax" icon-name="eye"></i>
					<?= setPostViews(get_the_ID()); ?> view
				</span>

				<div>
					<span class="meta-date">
						<?= get_the_date('d M') ?>
					</span>.
					<span class="meta-comment">
						<?= cyn_reading_time(get_the_ID()) . " Read"; ?>
					</span>
					</span>
				</div>
			</div>
			<div class="post-content">
				<?php the_content() ?>
			</div>
			<div class="single-comment-number">
				<h3>
					<?= get_comments_number($post_id); ?> comments
				</h3>
			</div>
			<div class="blog-comments">

				<?php echo comments_template();
				?>
			</div>

		</div>
	</div>
</main>


<?php get_footer() ?>