<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<?php if ( has_post_thumbnail() ) {	the_post_thumbnail('full');	} ?>
	
		<nav id="midia-navigation" class="main-navigation" role="navigation">
			<?php /*<button class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></button> */?>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'midias-menu', 'menu_class' => 'nav-menu' ) ); ?>
		
		<div class="fixedtopbar">
			<nav class="navbar navbar-default navbar-static-top">
			  <div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>

					  </button>
					</div>
					
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
				<ul class="nav navbar-nav">
					<?php $items = wp_get_nav_menu_items('Midias Menu'); 
						$title_selected = get_the_title($post->post_parent);
						$category = get_the_category($post->ID);
						if(empty($category) == false){
							$category_parents = strtoupper(get_category_parents($category[0]->term_id, false, ';'));
							$arvore_category_parents = preg_split("/;/", $category_parents, -1);
							$categoria_pai = $arvore_category_parents[0];
						}
						
						foreach($items as $item)
						{
							$title_echo = $item->title;					
							if(strcmp($title_selected, $title_echo) == 0 || strcmp($categoria_pai,$title_echo) == 0){	
								echo	'<li class="active"><a href="'.$item->url.'">'.strtoupper($item->title).'</a></li>';
							}else{
								echo	'<li role="presentation"><a href="'.$item->url.'">'.strtoupper($item->title).'</a></li>';
							}
						}
					?>
				</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</div>
		
		</nav><!-- #site-navigation -->

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<?php _e( 'Featured post', 'twentytwelve' ); ?>
		</div>
		<?php endif; ?>
		<header class="entry-header">
			<?php if ( ! post_password_required() && ! is_attachment() ) :
				//the_post_thumbnail();
			endif; ?>

			<?php if ( is_single() ) : ?>
			<h1 class="title-in"><?php the_title(); ?></h1>
			<?php else : ?>
			<span class="title-in">//</span><span class="title"><?php the_title(); ?></span>
			<hr id="hr_destaque">
			<?php endif; // is_single() ?>
			<?php if ( comments_open() ) : ?>
				<div class="comments-link">
					<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twentytwelve' ) . '</span>', __( '1 Reply', 'twentytwelve' ), __( '% Replies', 'twentytwelve' ) ); ?>
				</div><!-- .comments-link -->
			<?php endif; // comments_open() ?>
			<?php $alert_post_id = 'alert_'.get_the_title();
				$alert_post_id = str_replace(" ", "_", $alert_post_id)
			?>
			<div id="<?php echo $alert_post_id ?>" class="alert alert-danger"></div>			
		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
