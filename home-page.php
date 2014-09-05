<?php
/*
Template Name: Home Page (Full Width)
*/
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Professionl
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main site-page site-page-home" role="main">
            <div class="home-hero">
                <img class="hero-img" src="<?php echo ot_get_option('promo-image'); ?>" alt="<?php bloginfo('name') ?>"/>
                <div class="hero-intro container">
                    <h2>
                        <?php echo ot_get_option('promo-text'); ?>
                    </h2>
                </div>
            </div>
            <div class="container">
			    <?php while ( have_posts() ) : the_post(); ?>

				    <?php get_template_part( 'content', 'page' ); ?>

				    <?php
					    // If comments are open or we have at least one comment, load up the comment template
					    if ( comments_open() || '0' != get_comments_number() ) :
						    comments_template();
					    endif;
				    ?>

			    <?php endwhile; // end of the loop. ?>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
