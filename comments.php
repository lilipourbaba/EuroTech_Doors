<?php

if (post_password_required()) {
	return;
}
$fields= array(
			 'author'=>
		'<div class="input-box"> <label>Name* </label><input id="name" name="author" class="comment-input" rows="1" maxlength="50" placeholder=" " required/></div>
		<div class="input-box"> <label>Family* </label><input id="last-name" name="last-name" class="comment-input" rows="1" maxlength="500" placeholder=" " required/></div>',
		'email' =>
		'<div class="input-box"> <label>Email* </label><input id="mail" name="email" class="comment-input" rows="1" maxlength="1500" placeholder=" " required/></div>',
		'cookies' =>'',
		'url'=> ''

		
);
comment_form(
	array(
		'fields' => $fields,
	    'comment_field' =>
		'<div class="input-box comment-text"> <label>Comment* </label>
		<textarea id="comment" name="comment" class="comment-input" rows="3" maxlength="65525" placeholder="" required></textarea></div>',
		'logged_in_as' => null,
		'comment_notes_before' => '',
		'title_reply' => "leave comment",
		'title_reply_to' => "Leave a Reply",
		'id_submit' => "submit-commentform",
		'class_submit' => "btn-primary cursor-pointer",
		'name_submit' => "submit-commentform",
		'label_submit' => ' Add Comment',
		'submit_field' => '<div class="form-submit">%1$s %2$s</div>',
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
				'per_page' => '',
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
// //---- Add buttons to top of post content
// add_filter('the_content', 'ip_post_likes');
// //---- Get like or dislike count
// function ip_get_like_count($type = 'likes')
// {
// 	$current_count = get_post_meta(get_the_id(), $type, true);

// 	return ($current_count ? $current_count : 0);
// }