<?php /*Template Name: blog */ get_header() ?>
<?php
$post_id = isset ($args['post_id']) ? $args['post_id'] : get_the_ID();
$author_name = get_the_author_meta('display_name', get_post_field('post_author', get_the_ID()));
$banner = get_the_post_thumbnail_url($post_id, 'full');
$blog_slider = new WP_Query([
	'post_type' => 'post',
	'posts_per_page' => 6,
	'post__not_in' => [get_the_ID()],
]);
$all_blogs_page_id = get_option('page_for_posts');
?>
<main class="blog-page">

	<!-- Swiper -->
	<img src="<?= $banner;?>" class="blog__hero"/>
		<div class="swiper blogslider banner_text">
			<div class="swiper-wrapper">
				<?php
				while ($blog_slider->have_posts()) {
					$blog_slider->the_post();
					$post_id = get_the_ID();
					get_template_part('/templates/components/cards/blog-cards/blog', 'topslider', ['post_id' => $post_id]);
				}
				?>
				<?php wp_reset_postdata() ?>

			</div>
			<div class="slider-pagination">
				<div class="swiper-pagination"></div>
			</div>
		</div>
	
	<!-- top slider blog -->
	<div class="container blog-archive">
		<div class="sidebar">
			<?php
			get_template_part(
				'templates/components/sidebar/blog-sidebar',
				null,
			);
			?>
		</div>

		<div class="blog-main">
			<div class="blog-head">
				<ul>
					<a href="<?= get_permalink($all_blogs_page_id) ?>"><li class="current-cat">
							all
						</li></a>
					<?php wp_list_categories(
						[
							'orderby' => 'id',
							'hide_empty' => false,
							'title_li' => "",
						]
					) ?>
				</ul>
			</div>
			<div class="blog-section">
				<div class="blogs">
					<?php
					$new_blogs = new WP_Query([
						'post_type' => 'post',
						'posts_per_page' => 6,
						'post__not_in' => [get_the_ID()],
					]);
					?>
					<?php
					while ($new_blogs->have_posts()) {
						$new_blogs->the_post();
						$post_id = get_the_ID();
						get_template_part('/templates/components/cards/blog-cards/blogpage', 'card', ['post_id' => $post_id]);
					}
					?>
					<?php wp_reset_postdata() ?>
				</div>
			</div>
			<?php
			echo "<div class='pagination'>" . paginate_links(
				array(
					'total' => $new_blogs->max_num_pages,
					'prev_next' => false,
					'mid_size' => 1,
				)
			) . "</div>";
			?>
		</div>
	</div>
</main>

<?php get_footer() ?>