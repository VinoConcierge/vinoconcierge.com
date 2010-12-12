<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<span class="alert"><?php _re('This post is password protected. Enter the password to view comments.') ?></span>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>

	<?php 

	$user_level = 8;
	$admin_emails = array();

	$admin_accounts = $wpdb->get_results("SELECT * FROM $wpdb->usermeta WHERE meta_key = 'wp_user_level' AND meta_value >= $user_level ");

	foreach ($admin_accounts as $admin_account){

		$admin_info = $wpdb->get_row("SELECT * FROM $wpdb->users WHERE ID = $admin_account->user_id");

		$admin_emails[$admin_account->user_id] = $admin_info->user_email;
	}

	?>
	
	<br />
	<h3 class="main-modules">

		<span><?php comments_number(_r('No Comments'), _r('1 Comment'), _r('% Comments'));?></span>
	
	</h3>
	
	<ol class="commentlist">
	
		<?php foreach ($comments as $comment) : ?>
		
		<?php
		$admin_comment = false;
		foreach ($admin_emails as $admin_email){
			if($comment->comment_author_email == $admin_email){
				$admin_comment = true;
   	     	    break;
			}
		};
		?>
		
		<li class="single-comment <?php echo $oddcomment; ?> <?php if($admin_comment) echo 'admincomment'; ?>" id="comment-<?php comment_ID() ?>">
			<div class="commenttext">
				<span class="author_name"><?php comment_author_link() ?></span>
				<span>&nbsp;&nbsp;|&nbsp;&nbsp;<?php comment_date('l, d F Y') ?> <?php _re('at') ?> <?php comment_time() ?></span> <?php edit_comment_link(_r('edit'),'&nbsp;',''); ?>

				<?php comment_text() ?>
				<?php if ($comment->comment_approved == '0') : ?>
				
				<span class="attention" style="margin-right: 10px;"><?php _re('Your comment is awaiting moderation.'); ?></span>

				<?php endif; ?>
				
			</div>
			<div class="comment_author_gravatar"><?php echo get_avatar( $comment, $size = '50', $default = '' ); ?></div>
			<div class="clr"></div>
		</li>

		<?php
		/* Changes every other comment to a different class */
		$oddcomment = ( empty( $oddcomment ) ) ? 'comment_alt' : '';?>
		<?php endforeach; /* end for each comment */ ?>
	
	</ol>

 	<?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<span class="attention"><?php _re('Comments are closed.'); ?></span>

	<?php endif; ?>
	
	<?php endif; ?>

	<!-- RESPOND -->

	<?php if ('open' == $post->comment_status) : ?>

	<div id="respond">
		<h3 class="main-modules">
											
			<span><?php comment_form_title( _r('Leave a Reply'), _r('Leave a Reply to %s') ); ?></span>
													
		</h3>
		<div class="module meta_post_archive" style="font-style: normal;">
			<div class="cancel-comment-reply">
				<small><?php cancel_comment_reply_link(); ?></small>
			</div>

			<?php if ( get_option('comment_registration') && !$user_ID ) : ?>

			<span class="attention"><?php _re('You must be'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _re('logged in'); ?></a> <?php _re('to post a comment.'); ?></span>
			
			<?php else : ?>

			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

				<div class="meta_comment_form_div">

				<?php if ( $user_ID ) : ?>

				<span><?php _re('Logged in as'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"><?php _re('Log out').'&raquo;' ?></a></span>

				<?php else : ?>

				<div class="fill_field"><span class="text_label"><label for="author"><?php _re('Name') ?> <?php if ($req) _re('(Required)'); ?></label></span><br /><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> class="form_text_field" /></div>				
				<div class="fill_field"><span class="text_label"><label for="email"><?php _re('Mail (will not be published)') ?> <?php if ($req) _re('(Required)'); ?></label></span><br /><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> class="form_text_field" /></div>
				<div class="fill_field"><span class="text_label"><label for="url"><?php _re('Website'); ?></label></span><br /><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" class="form_text_field" /></div>
				<div class="clr"></div>

			<?php endif; ?>

			<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

		</div>

		<div class="text_comment_form_div">
			<textarea name="comment" id="comment" cols="" rows="" tabindex="4" class="form_user_text_field"></textarea>
			<br />
			<div class="form_button_send">
				<a class="readon2"><span><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _re('Submit') ?>" class="button"/></span></a>
				<?php comment_id_fields(); ?>
			</div>
		</div>
		<div class="clr"></div>
		<?php do_action('comment_form', $post->ID); ?>
		</form>

		<?php endif; // If registration required and not logged in ?>

	</div>			
</div><!-- .module -->
								
<?php endif; // if you delete this the sky will fall on your head ?>
