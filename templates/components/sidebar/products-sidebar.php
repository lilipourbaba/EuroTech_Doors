<?php
$product_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID();
$rating = get_field("rating");
$product = new WP_Query([
	'post_type' => 'product',
	'posts_per_page' => 4,
	'post__not_in' => [get_the_ID()],
]);

?>
<div class="catergories mb-hide">
	<h3> category</h3>
	<ul class="cat ">
		<?php wp_nav_menu(['theme_location' => 'product-cat']) ?>

	</ul>
</div>
<div class="like-product">
	<h3>Suggested products</h3>
	<div class="sidebar-products">
		<?php
		while ($product->have_posts()) {
			$product->the_post();
			$product_id = get_the_ID();
			get_template_part('/templates/components/cards/product-cards/suggest', 'product', ['post_id' => $product_id]);
		}
		?>
		<?php wp_reset_postdata() ?>
	</div>
</div>
<div class="like-product">
	<h3>best seller</h3>
	<div class="sidebar-products">
		<?php
		while ($product->have_posts()) {
			$product->the_post();
			$product_id = get_the_ID();
			get_template_part('/templates/components/cards/product-cards/suggest', 'product', ['post_id' => $product_id]);
		}
		?>
		<?php wp_reset_postdata() ?>
	</div>
</div>