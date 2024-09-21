<?php
/**
 * The template for displaying comments.
 *
 *  
 * @package WePublishing Me
 * @subpackage wepublishing
 * @since wepublishing 1.0
 */

// ***************************************************************************************
//  For the Comments
// ***************************************************************************************

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
	<h2 class="comments-title">
			<?php
				$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'wepme' ), get_the_title() );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s thought on &ldquo;%2$s&rdquo;',
						'%1$s thoughts on &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'freesia-empire'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}
			?>
		</h2>
	<?php wepublishingme_comment_nav(); ?>
	<ol class="comment-list">
	<?php
		wp_list_comments( array(
			'style'       => 'ol',
			'short_ping'  => true,
			'avatar_size' => 56,
		) );
	?>
	</ol> <!-- .comment-list -->
	<?php wepublishingme_comment_nav(); ?>
	<?php endif; // have_comments() ?>
	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
	<p class="no-comments">
	<?php _e( 'Comments are closed.', 'wepme' ); ?>
	</p>
	<?php endif; ?>
	<?php comment_form(); ?>
</div> <!-- .comments-area -->