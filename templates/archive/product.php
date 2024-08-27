<?php get_header(); ?>
<?php
$front_page_id = get_option('page_on_front');
$product_hero = get_field('product_hero', $front_page_id);
$heroTitle = get_field('product_hero_title', $front_page_id);
$product = new WP_Query([
	'post_type' => 'product',
	'posts_per_page' => 10,
	'post__not_in' => [get_the_ID()],
]);
$post_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID();
$product_cat = get_the_terms($post_id, 'product_cat');
$categories = get_terms([
	'taxonomy' => 'product_cat',
	'hide_empty' => true,
	'number' => 5
]);
$current_term_ID = 0;
if (is_tax()) {
	$current_term_ID = get_queried_object()->term_id;
}

 


?>
<main class="archive-product">

	<img src="<?= $product_hero; ?>" class="product__hero" />
	<div class="product__hero-title container">
		<p><?= $heroTitle; ?></p>
	</div>

	<div class="container archive-product-main">
		<div class="single-sidebar">
			<?php
			get_template_part(
				'templates/components/sidebar/products-sidebar',
				null,
			);
			?>
		</div>
		<div class="allproduct">
			<div class="catergories">
				<ul class="cat">

					<a href="<?= get_post_type_archive_link('product') ?>">
						<li>All Products</li>
					</a>
					<?php
					foreach ($categories as $cat) {
						$category_class = $current_term_ID === $cat->term_id ? 'active' : '';
						echo "<a class=\"$category_class\" href=" . get_term_link($cat->term_id) . '"><li>' . $cat->name;
						echo "</li></a>";
					}
					?>
				</ul>
			</div>
			<div class="like-product">
				<h2>
					<?= is_array($product_cat) ? $product_cat[0]->name : '';

					?>
				</h2>
				<div class="products">
					<?php
					if (have_posts()) {
						while (have_posts()) {
							the_post();
							$post_id = get_the_ID();
							get_template_part('/templates/components/cards/product-cards/suggest', 'product', ['post_id' => $post_id]);
						}
					} else {
						echo "No Product Exists";
					}
					?>
					<?php wp_reset_postdata() ?>




				</div>
			</div>
		</div>
	</div>
	 <?= the_pagination(); ?> 
	<?php
	// echo "<div class='pagination container'>" . paginate_links(
	// 	array(
	// 		'total' => $product->max_num_pages,
	// 		'prev_next' => false,
	// 		'mid_size' => 1,
	// 	)
	// ) . "</div>";
	?>

	<div class="container">
		<?php echo term_description() ?>
	</div>
</main>
<?php get_footer() ?>