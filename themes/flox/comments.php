<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<?php 
/* Comment box 
/******************************/
function ckav_comment_box($comment, $args, $depth) {

	$GLOBALS['comment'] = $comment; 
	
	if ($comment->comment_type == 'pingback' || $comment->comment_type == 'trackback') { ?>
		<li <?php comment_class('comment-wrp'); ?> id="li-comment-<?php comment_ID() ?>">
			<div class="comment-box" id="comment-<?php comment_ID() ?>">
				<div class="info w100">
					<strong><?php esc_attr_e('Pingback:', 'flox'); ?></strong> <?php comment_author_link(); ?><?php edit_comment_link( esc_attr__('Edit', 'flox'), '<span class="edit-link">', '</span>' ); ?>
				</div>
			</div>
	<?php } else { ?>
		<li <?php comment_class('comment-wrp'); ?> id="li-comment-<?php comment_ID() ?>">

			<div class="comment-box" id="comment-<?php comment_ID() ?>">
				<div class="img-wrp">
					<div class="img"><?php echo get_avatar( $comment, $args['avatar_size'] ); ?></div>
				</div>
				<div class="info-wrp">
					<div class="info">
						<div class="row">
							<div class="col">
								<h5 class="content-title small comment-author"><?php printf(esc_html__('%s', 'flox'), get_comment_author_link()) ?></h5>
								<a class="comment-permalink" href="<?php echo htmlspecialchars ( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(esc_html__('%1$s', 'flox'), get_comment_date(), get_comment_time()) ?></a>
							</div>
							<div class="col-3 align-r italic reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>
						</div>
						
						<div class="comment-text">
							<?php comment_text(); ?>
						</div>

						<?php if ($comment->comment_approved == '0') : ?>
							<em><?php esc_html_e('Your comment is awaiting moderation.', 'flox') ?></em><br />
						<?php endif; ?>
					</div>
				</div>
			</div>
	<?php } ?>
<?php } ?>


<?php 

/* Comment area
/******************************/ ?>
<div id="comments" class="comments-area">

<?php if ( have_comments() ) { ?>

	<h2 class="section-title mr-b-small">
		<?php printf( _nx( 'One comment', 'Comments (%1$s)', get_comments_number(), 'comment', 'flox' ), number_format_i18n( get_comments_number() ), get_the_title() ); ?>
	</h2>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'flox' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( esc_attr__( 'Older Comments', 'flox' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( esc_attr__( 'Newer Comments', 'flox' ) ); ?></div>
	</nav><!-- #comment-nav-above -->
	<?php endif; // Check for comment navigation. ?>

	<ol class="comment-list">
		<?php
		wp_list_comments( array(
			'style'      => 'ol',
			'short_ping' => true,
			'avatar_size'=> 50,
			'callback' => 'ckav_comment_box',
		) );
		?>
	</ol><!-- .comment-list -->

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'flox' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( esc_attr__( 'Older Comments', 'flox' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( esc_attr__( 'Newer Comments', 'flox' ) ); ?></div>
	</nav><!-- #comment-nav-below -->
	<?php endif; // Check for comment navigation. ?>
<?php } // have_comments() ?>



	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) { ?>
	<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'flox' ); ?></p>
	<?php } else {
    echo "<h4 class='content-title ckav-reply-title' data-title='".esc_attr__('Comments', 'flox')."'>".esc_attr__('Leave a reply', 'flox')."</h4>";
	}?>

	<?php 
	$req      = get_option( 'require_name_email' );
	$html_req = ( $req ? " required='required'" : '' );
	comment_form(
		array(
			'title_reply_to' => '',
			'title_reply' => '',
			
			'comment_notes_after' => '',
				
			'cancel_reply_before'  => '',
			'cancel_reply_after'   => '',
			'class_submit' => 'ckav-btn primary-btn',
			'comment_field' => '<div class="form-group">
									<textarea id="comment" rows="6" name="comment" class="form-control" placeholder="'.esc_attr__('Type your comment', 'flox').'"></textarea>
								</div>',
			'fields' => array(
				'author' => '<div class="row gt20"><div class="col-md-4">
								<div class="form-group">
									<input id="author" name="author" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="'.esc_attr__('Your name *', 'flox').'" ' . esc_attr($html_req) . ' />
								</div>
							</div>',
		
				'email' => '<div class="col-md-4">
								<div class="form-group">
									<input id="email" name="email" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" placeholder="'.esc_attr__('Email address *', 'flox').'" ' . esc_attr($html_req) . ' />
								</div>
							</div>',
		
				'url' => '<div class="col-md-4">
							<div class="form-group">
								<input id="url" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="'.esc_attr__('Website', 'flox').'" />
							</div>
						</div></div>',
			),
		)
	); ?>

</div><!-- #comments -->
