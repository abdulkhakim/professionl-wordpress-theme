<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Publishr
 */

if ( ! function_exists( 'developr_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @return void
 */
function developr_paging_nav() {
    

	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'publishr' ); ?></h1>
        <?php if ( function_exists('wp_pagenavi') ): ?>
		    <?php wp_pagenavi(); ?>
	    <?php else: ?>
		<div class="nav-links pager">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'publishr' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'publishr' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
        <?php endif; ?>
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'developr_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @return void
 */
function developr_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'publishr' ); ?></h1>
		<div class="nav-links row">
			<?php
				previous_post_link( '<div class="col-sm-6"><div class="nav-previous">%link</div></div>', _x( '<span class="meta-nav"><i class="fa fa-chevron-left"></i><strong>'.__('Previous', 'publishr').'</strong> </span> %title', 'Previous post link', 'publishr' ) );
				next_post_link(     '<div class="col-sm-6"><div class="nav-next">%link</div></div>',     _x( '<strong>'.__('Next', 'publishr').'</strong> %title <span class="meta-nav"><i class="fa fa-chevron-right"></i></span>', 'Next post link',     'publishr' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'developr_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function developr_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'publishr' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'publishr' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php if ( 0 != $args['avatar_size'] ) { echo get_avatar( $comment, $args['avatar_size'] ); } ?>
					<?php printf( __( '%s ', 'publishr' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author -->

				<div class="comment-metadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                        <i class="fa fa-clock-o"></i> 
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'publishr' ), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a>
					<?php edit_comment_link( __( 'Edit', 'publishr' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-metadata -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'publishr' ); ?></p>
				<?php endif; ?>
			</footer><!-- .comment-meta -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->

			<?php
				comment_reply_link( array_merge( $args, array(
					'add_below' => 'div-comment',
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
					'before'    => '<div class="reply">',
					'after'     => '</div>',
				) ) );
			?>
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for developr_comment()

if ( ! function_exists( 'developr_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function developr_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf( __( '<i class="fa fa-calendar"></i><span class="posted-on">%1$s</span><span class="byline"></span>', 'publishr' ),
		sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		)
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 */
function developr_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so developr_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so developr_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in developr_categorized_blog.
 */
function developr_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'developr_category_transient_flusher' );
add_action( 'save_post',     'developr_category_transient_flusher' );
