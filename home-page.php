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
                    <h2 class="animated fadeInDown">
                            <?php echo ot_get_option('promo-text'); ?>
                    </h2>
                </div>
            </div>
            <div class="small-intro home-intro">
                 <div class="container">
                     <img class="pull-right img-circle profile-image" src="<?php echo ot_get_option('profile-image'); ?>" alt="<?php bloginfo('name') ?>"/>
                     <?php echo ot_get_option('profile-text'); ?>
                 </div>
            </div>
            <div class="description-intro home-intro">
                 <div class="container">
                     <?php echo ot_get_option('description1-text'); ?>
                 </div>
            </div>
            <div class="description2-intro home-intro">
                 <div class="container">
                     <?php echo ot_get_option('description2-text'); ?>
                 </div>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
