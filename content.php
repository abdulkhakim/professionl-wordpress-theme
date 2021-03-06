<?php
/**
 * @package Professionl
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blogroll'); ?>>
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php if ( is_sticky() ) echo'<span class="thumb-icon"><i class="fa fa-star"></i> </span>'; ?><?php the_title(); ?></a></h2>	
	</header><!-- .entry-header -->
    <?php if ( 'post' == get_post_type() ) : ?>
        <div class="entry-meta">
		    
            <span class="pull-right"><i class="fa fa-comments-o hidden-xs"></i><a class="hidden-xs" href="<?php comments_link(); ?>"><?php comments_number( 'Leave a Reply', '1 Response', '% Responses' ); ?></a></span>
            <a href="<?php the_permalink(); ?>"><?php developr_posted_on(); ?></a>
	    </div><!-- .entry-meta -->
	<?php endif; ?>
    
	<?php if ( has_post_thumbnail() && ( ot_get_option('post-text') != 'content' ) ): ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>" rel="bookmark">
			    <?php the_post_thumbnail('thumb-large'); ?>
            </a>
	    </div><!--/.post-thumbnail-->
	<?php endif; ?>
		
	 <?php 
		if ( ot_get_option('post-text') == 'content' ) {
    ?>
            <div class="entry-content">
               <?php the_content(); ?>
	        </div>
            <footer class="entry-meta">
			        <?php the_tags('<p class="post-tags"><span>'.__('TAGS:','professionl').'</span> <span class="label label-default">','</span> <span class="label label-default">','</span></p>'); ?>
                <div>
                    <a href="<?php comments_link(); ?>"><i class="fa fa-comment"></i> <?php comments_number( 'Leave a Comment', '1 Comment', '% Comments' ); ?></a>
                </div>
	        </footer><!-- .entry-meta -->
            
    <?php
        } 
		else {
    ?>
            <div class="entry-summary">
               <?php the_excerpt(); ?>
	        </div><!-- .entry-summary -->
            <div class="more-tag">
                <a class="ghost-button" href="<?php the_permalink(); ?>" ><?php echo __( 'Read More', 'professionl' ) ?></a>
            </div>
            <div class="clearfix"></div>
    <?php
		}
	?>
	
</article><!-- #post-## -->
