<?php /* Template Name: shaker-category */ get_header(); ?>
<?php
$post_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID();
$membrance = get_field('membrance_category_products');
$shak = array(
	"post_types" => 'products',
	''
);
?>
<main class="shaker-product container">
	<?php
	if (isset($membrance)) {
		if (count(array_filter($membrance)) > 0) {
			foreach ($membrance as $post_id) {
				get_template_part('/templates/components/cards/product-cards/membrance', 'product', ['post_id' => $post_id]);
			}
		}
	}
	?>
	<div class="shaker-content">
		<?php the_content() ?>
	</div>
</main>
<?php get_footer() ?>