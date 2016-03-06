<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="<?php echo home_url() ?>/wp-content/themes/twentytwelve-chield/bootstrap/js/bootstrap.js"/>
</script>
<script src="<?php echo home_url() ?>/wp-content/themes/twentytwelve-chield/api_betel.js"/>
</script>
<link href="<?php echo home_url() ?>/wp-content/themes/twentytwelve-chield/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">

</head>

<body <?php body_class(); ?>>
<nav id="site-navigation" class="main-navigation" role="navigation">
<div class="fixedtopbar">
	<nav class="navbar navbar-default navbar-static-top">
	  <div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>

			  </button>
			  <a class="navbar-brand" href="#"><img src="<?php echo home_url() ?>/wp-content/themes/twentytwelve-chield/images/logo.png" style="float: left; max-height:150%;"></a>
			  <p class="navbar-text">
			  </p>
			</div>
			
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<?php $items = wp_get_nav_menu_items('Central'); 
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
	
	
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<div id="divlogo" class="divlogo">
			<div class="logoheader">
				<img src="<?php echo home_url() ?>/wp-content/themes/twentytwelve-chield/images/logo.png" style="float: left;">
			</div>
			<div class="searchbar"><?php get_search_form() ?></div>
		</div>
		
		<nav id="site-navigation" class="main-navigation" role="navigation">
		
			<?php /*<button class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></button> */?>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->

		<?php if ( get_header_image() ) : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" class="header-image" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>
		<?php endif; ?>
	</header><!-- #masthead -->

	<div id="main" class="wrapper">