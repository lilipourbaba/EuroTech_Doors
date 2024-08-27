<?php

$instagram_link = null !== get_option('cyn_instagram') ? get_option('cyn_instagram') : '';
$pinterest_link = null !== get_option('cyn_pinterest') ? get_option('cyn_pinterest') : '';
$facebook_link = null !== get_option('cyn_facebook') ? get_option('cyn_facebook') : '';
$x_link = null !== get_option('cyn_x') ? get_option('cyn_x') : '';

$instagram_id = null !== get_option('cyn_instagram_label') ? get_option('cyn_instagram_label') : '';
$pinterest_id = null !== get_option('cyn_pinterest_label') ? get_option('cyn_pinterest_label') : '';
$facebook_id = null !== get_option('cyn_facebook_label') ? get_option('cyn_facebook_label') : '';
$x_id = null !== get_option('cyn_x_label') ? get_option('cyn_x_label') : '';

$address = null !== get_option('cyn_text_address') ? get_option('cyn_text_address') : '';
$map_link = null !== get_option('cyn_address_map') ? get_option('cyn_address_map') : '';
$phone_number = null !== get_option('cyn_phone_number_one') ? get_option('cyn_phone_number_one') : '';
$phone_number2 = null !== get_option('cyn_phone_number_two') ? get_option('cyn_phone_number_two') : '';
?>
<footer class="site-footer">
	<div class="footer-wrapper">
		<div class="footer-col">
			<h4 class="footer-col-title">discover</h4>
			<?php wp_nav_menu(['theme_location' => 'footer-col1']) ?>
		</div>
		<div class="footer-col col-contact">
			<h4 class="footer-col-title">Contact</h4>
			<?php if (!empty ($phone_number))
				echo "<div><a href='tel:$phone_number'>" . $phone_number . '</a></div>' ?>
			<?php if (!empty ($phone_number2))
				echo "<div><a href='tel:$phone_number2'>" . $phone_number2 . '</a></div>' ?>
				<div class="icon-social-media">
				<?php render_social_media($pinterest_link, 'pinterest.svg') ?>
				<?php render_social_media($facebook_link, 'facebook.svg') ?>
				<?php render_social_media($instagram_link, 'instagram.svg') ?>
				<?php render_social_media($x_link, 'x.svg') ?>
			</div>
		</div>
		<div class="footer-col">
			<h4 class="footer-col-title">Our Compony</h4>
			<?php wp_nav_menu(['theme_location' => 'footer-col2']) ?>
		</div>
		<div class="footer-col col-support">
			<h4 class="footer-col-title">Support</h4>
			<?php wp_nav_menu(['theme_location' => 'footer-col3']) ?>

		</div>
		<?php if (!empty ($address)): ?>
			<div class="footer-col footer-address">
				<h4 class="footer-col-title">Address</h4>
				<div>
					<a href="<?= $map_link?>"><?= $address ?></a>
				</div>
			</div>
		<?php endif ?>
		<div class="footer-col col-newsletter" id="newsletter">
			<h4 class="footer-col-title">Join Our Newsletter</h4>
			<div>Subscribe To Our Blog Posts</div>
			<form class="form-newsletter" id="subscribe" action="">
				<input class="input-primary" name="email" type="email" id="email_input" placeholder="email">
				<button class="button-primary" id="Subscribe-button">Subscribe</button>
				<p class=" " id="success"></p>
			</form>
		</div>
	</div>
</footer>

<div class="wp-scripts">
	<?php wp_footer() ?>
</div>

</body>

</html>