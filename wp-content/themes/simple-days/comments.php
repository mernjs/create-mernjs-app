<?php
/**
 * The template for displaying comments.
 *
 * @package Simple Days
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area post_item mb_L">

	<?php
	
	if ( have_comments() ) :

		$comments_number = get_comments_number();
		$ping_count = get_comments( array( 'status' => 'approve', 'post_id'=> get_the_ID(), 'type'=> 'pings', 'count' => true, ) );
		$comments_number = $comments_number - $ping_count;

		if($comments_number != 0): ?>
			<h4 class="comments-title">

				<?php
				if ( 1 === $comments_number ) {
					
					echo '<i class="fa fa-comment-o" aria-hidden="true"></i> '. esc_html__( 'One Comment', 'simple-days' );

				} else {
					printf('<i class="fa fa-comments-o" aria-hidden="true"></i> '.
						
						esc_attr(__('%1$s Comments','simple-days')),
						absint(number_format_i18n( $comments_number ))
					);
				}
				?>
			</h4>

			<ul class="comment-list">
				<?php wp_list_comments( array(
					'type' => 'comment',
					'callback' => 'simple_days_comment',
				) ); ?>
				<?php
				//wp_list_comments( array('avatar_size' => 100,'style'       => 'ol',					'short_ping'  => true,				) );
				?>
			</ul>
			<?php
		endif;

		if($ping_count != 0): ?>
			<h4 class="ping-title">
				<i class="fa fa-link" aria-hidden="true"></i> 
				<?php
				if ( 1 === $ping_count ) {
					esc_html_e( 'One Pingback', 'simple-days' );

				} else {
					
					printf(esc_attr(__('%1$s Pingbacks','simple-days')),
						absint(number_format_i18n( $ping_count ))
					);
				}
				?>
			</h4>
			<ul class="ping-list">
				<?php wp_list_comments( array(
					'type' => 'pings',
					'callback' => 'simple_days_comment',
					'short_ping'  => true,
				) ); ?>
			</ul>

			<?php
		endif;

		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
			<nav>
				<ul class="comment_pager f_box">
					<li class="comment_previous"><?php previous_comments_link( '<i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> '.__( 'Older Comments', 'simple-days' ) ); ?></li>
					<li class="comment_next"><?php next_comments_link( __( 'Newer Comments', 'simple-days' ).' <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>' ); ?></li>
				</ul>
			</nav>
			<!-- .comment-navigation -->
		  <?php } // Check for comment navigation

		endif; 

		
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'simple-days' ); ?></p>
		<?php
	endif;
	if ( !function_exists('yahman_addons_amp_head') ):
		comment_form( simple_days_comment_custom_fields() );
		elseif (comments_open()): ?>
			<a class="comment_button_amp" rel="nofollow" href="<?php echo esc_url(get_the_permalink())  ?>#respond"><?php esc_html_e( 'Write a comment', 'simple-days' ); ?></a>
			<?php else: ?>
				<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'simple-days' ); ?></p>
			<?php endif;
			?>

		</div><!-- #comments -->

		<?php

		function simple_days_comment_custom_fields(){
			$commenter = wp_get_current_commenter();
			$req = get_option( 'require_name_email' );
			$aria_req = ( $req ? " aria-required='true'" : '' );
			$placeholder_req  = ( $req ? " *" : '' );
			$consent   = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
			return array(
            // change the title of send button
				'label_submit'=> esc_html__('Post Comment', 'simple-days'),
            // change the title of the reply section
				'title_reply'=> esc_html__('Leave a Comment', 'simple-days'),
            // redefine your own textarea (the comment body)
				'comment_field' => '
				<div class="form-group"><div class="input-field"><textarea class="materialize-textarea" type="text" rows="10" id="textarea1" name="comment" aria-required="true" placeholder="'. esc_attr__('Comments', 'simple-days') .'"></textarea></div></div>',

				'fields' => apply_filters( 'comment_form_default_fields', array(
					'author' =>'' .
					'<div class="form-group"><div class="input-field">' .
					'<input class="validate" id="name" name="author" placeholder="'. esc_attr_x('Name', 'comment placeholder' , 'simple-days') .$placeholder_req.'" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
					'" size="30"' . $aria_req . ' /></div></div>',

					'email' =>'' .
					'<div class="form-group"><div class="input-field">' .
					'<input class="validate" id="email" name="email" placeholder="'. esc_attr__('Email', 'simple-days') .$placeholder_req.'" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) .
					'" size="30"' . $aria_req . ' /></div></div>',

					'url' => get_theme_mod( 'simple_days_post_comments_website',false) ? '' :
					'<div class="form-group"><div class="input-field"><input class="validate" placeholder="'. esc_attr__('Website', 'simple-days') .'" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
					'" size="30" /></div></div>',

					'cookies' => get_option( 'show_comments_cookies_opt_in' ) ? '<p class="comment-form-cookies-consent f_box ai_c"><input id="wp-comment-cookies-consent" class="mr10" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' .
					'<label for="wp-comment-cookies-consent" class="fs16">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'simple-days' ) . '</label></p>' : '',
				)
			),
			);
		}


