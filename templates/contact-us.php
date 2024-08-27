<?php /*Template Name: contact */ ?>
<?php
$banner = get_the_post_thumbnail_url( $post_id, 'full' );
?>

<?php get_header() ?>

<div class="contact-us"
	 id="contactUsPage">
	<div class="contact-hero"
		 <?php printf( "style=\"background-image:url('%s')\"", $banner ) ?>>
		<div class="container">
			<p><?= get_field('contact_us'); ?>
			</p>
			<div class="contact">
				<h2>Contact Us</h2>
				<?php get_template_part( '/templates/components/forms/contact-us2' ); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer() ?>