<?php
if (post_password_required()) {
	return;
}
comment_form(
	array(
		'logged_in_as' => null,
		'title_reply' => "leave comment",
		'title_reply_to' => "Add reply %s",
		'comment_field' => '
		<div class="input-group">
		<div class="input-box"> <lable>Name* </lable><input id="name" name="name" class="comment-input" rows="1" maxlength="50" placeholder=" " required/></div>
		<div class="input-box"> <lable>Family* </lable><input id="last-name" name="last-name" class="comment-input" rows="1" maxlength="500" placeholder=" " required/></div>
		<div class="input-box"> <lable>Email* </lable><input id="mail" name="mail" class="comment-input" rows="1" maxlength="1500" placeholder=" " required/></div>
		<div class="input-box"> <lable>Comment* </lable>
		<textarea id="comment" name="comment" class="comment-input" rows="3" maxlength="65525" placeholder="" required></textarea></div></div>',
		'id_submit' => "submit-commentform",
		'class_submit' => "btn-primary cursor-pointer",
		'name_submit' => "submit-commentform",
		'label_submit' => ' Add Comment',
		'submit_field' => '<div class="form-submit">%1$s %2$s</div>',
		'comment_notes_before' => '',
		'title_reply_to' => 'Leave a Reply',

	)
);
if (have_comments()):
	?>
	<div class="comment-list">
		<?php
		$list = wp_list_comments(
			array(
				'walker' => null,
				'max_depth' => '',
				'style' => 'div',
				'callback' => null,
				'end-callback' => null,
				'type' => 'all',
				'page' => '',
				'per_page' => '6',
				'avatar_size' => 32,
				'reverse_top_level' => null,
				'reverse_children' => '',
				'format' => current_theme_supports('html5', 'comment-list') ? 'html5' : 'xhtml',
				'short_ping' => true,
				'echo' => true,
			)
		);
		?>
	</div>
	<?php
else:
	?>
	<div class="comment-list">

		<p style="margin-top: 1rem;">No comment.</p>
	</div>
	<?php
endif;
?>
<?php
//---- Add buttons to top of post content
add_filter('the_content', 'ip_post_likes');
//---- Get like or dislike count
function ip_get_like_count($type = 'likes')
{
	$current_count = get_post_meta(get_the_id(), $type, true);

	return ($current_count ? $current_count : 0);
}