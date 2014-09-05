<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Professionl
 */
?>

	

	<footer id="colophon" class="site-footer" role="contentinfo">
        <div class="container">
            <?php 
                wp_nav_menu( array(
                    'menu'              => 'footer',
                    'theme_location'    => 'footer',
                    'depth'             => 1,
                    'container'         => 'div',
                    'container_class'   => 'footer-menu')
                );
            ?>
            <div class="clear"></div>
            <div id="copyright">
                <?php if ( ot_get_option( 'copyright' ) ): ?>
					<?php echo ot_get_option( 'copyright' ); ?>
				<?php else: ?>
			    <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> &copy; <?php echo date( 'Y' ); ?>. <?php _e('All Rights Reserved.','professionl'); ?>
				<?php endif; ?>
			</div><!--/#copyright-->
            <?php if ( !ot_get_option( 'credit' ) ): ?>
		    <div class="site-info">
			    <?php do_action( 'developr_credits' ); ?>
			    <?php printf( __( 'Proudly powered by %s', 'professionl' ), '<a href="http://wordpress.org/" rel="generator"  target="_blank">WordPress</a>' ); ?>
			    <span class="sep"> | </span>
			    <?php printf( __( 'Theme: %1$s by %2$s.', 'professionl' ), 'Professionl', '<a href="http://kanishkkunal.in" rel="designer" target="_blank">Kanishk</a>' ); ?>
		    </div><!-- .site-info -->
            <?php endif; ?>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>