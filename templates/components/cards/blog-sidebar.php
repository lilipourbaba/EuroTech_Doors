<?php get_header() ?>
<?php
$post_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID();
$popular_post = get_field('popular_post');
$num = 01;
$first_blogs = new WP_Query([
	'post_type' => 'post',
	'posts_per_page' => 4,
	'post__not_in' => [get_the_ID()],
]);
$popular_blog = new WP_Query([
	'post_type' => 'post',
	'posts_per_page' => 3,
	'post__not_in' => [get_the_ID()],
]);

?>
<div class="popular-blog">

	<h3> <i class="iconsax" icon-name="star" fill="red"></i> most Popular posts</h3>


	<div class="popular-post">


		<?php
		if (count(array_filter($popular_post)) > 0) {

			foreach ($popular_post as $blog_id) {
				echo "<span class='number'>" . "0" . $num . "</span>";
				$num++;
				get_template_part('/templates/components/cards/popular', 'blog', ['post_id' => $blog_id]);
			}
		} else {
			while ($first_blogs->have_posts()) {
				$first_blogs->the_post();
				$post_id = get_the_ID();
				echo "<span class='number'>" . $num . "</span>";
				$num++;
				get_template_part('/templates/components/cards/popular', 'blog', ['post_id' => $post_id]);
			}
			wp_reset_postdata();

		}
		?>

		<!-- <?php
		while ($popular_blog->have_posts()) {
			$popular_blog->the_post();
			$post_id = get_the_ID();
			echo "<span class='number'>" . $num . "</span>";
			$num++;
			get_template_part('/templates/components/cards/popular', 'blog', ['post_id' => $post_id]);
		}
		?> -->
		<?php wp_reset_postdata() ?>
	</div>

</div>
<h3 class="">Today’s Pic</h3>
<div class="today-pic">
	<img src="<?php echo get_field("first_pic"); ?>" />
	<img src="<?php echo get_field("secound_pic"); ?>" />
	<img src="<?php echo get_field("third_pic"); ?>" />
	<img src="<?php echo get_field("fourth_pic"); ?>" />
	<img src="<?php echo get_field("fifth_pic"); ?>" />
	<img src="<?php echo get_field("sixth_pic"); ?>" />
</div>
<?php get_footer() ?>