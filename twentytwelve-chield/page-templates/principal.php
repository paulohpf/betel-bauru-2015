<?php
/**
 * Template Name: Principal, No Sidebar
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">		

		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'page' ); ?>
		<?php endwhile; // end of the loop. ?>		
		
		<?php /* if ( function_exists( 'easingslider' ) ) { easingslider( 6279 ); } ?>
		
		<div style="padding-top:25px;">
			<?php if ( function_exists( 'easingslider' ) ) { easingslider( 6285 ); } ?><h4>Ola Mundo</h4>
			<?php if ( function_exists( 'easingslider' ) ) { easingslider( 6286 ); } ?>			
		</div> */?>
	

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>