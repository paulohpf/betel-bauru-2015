<?php
/**
 * Template Name: Igrejas, sidebar
 *
 * @package WordPress
 * @subpackage 
 * @since 
 */
?>

<?php get_header(); ?>

	<?php if ( has_post_thumbnail() ) {	the_post_thumbnail('full');	} ?>

<div id="primary" class="site-content">
    <div id="content" role="main">

        <?php while (have_posts()) : the_post(); ?>

            <?php get_template_part('content-personalized', get_post_format()); ?>
			
            <?php comments_template('', true); ?>

        <?php endwhile; // end of the loop.  ?>

    </div><!-- #content -->
</div><!-- #primary -->

<?php get_sidebar('igrejas'); ?>

<?php get_footer(); ?>