<?php
/**
 * Template Name: Mensagens Lightbox, Sidebar
 *
 * @package WordPress
 * @subpackage 
 * @since 
 */
?>

<?php get_header(); ?>

		<link rel="stylesheet" href="<?php echo home_url() ?>/wp-content/themes/twentytwelve-chield/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
		<script type="text/javascript" src="<?php echo home_url() ?>/wp-content/themes/twentytwelve-chield/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

		<link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
		<script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
		<script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
		<link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
		<script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

<?php

	$id_cat = $_GET["id_cat"]; //capturo o id da categoria
	if($id_cat == ""){
		$id_cat == 17; //17 = todos as ministrações
	}

	$dispositivo = verificaDispositivo();

	if ($dispositivo) {
			echo '<script>$.fancybox.defaults.width=380;
			$.fancybox.defaults.height = 260;
			$.fancybox.defaults.autoSize= false</script>';
	}else{
			echo '<script>$.fancybox.defaults.width=660;
			$.fancybox.defaults.height = 380;
			$.fancybox.defaults.autoSize= false</script>';
	}
	?>
		<script type="text/javascript">
			$(document).ready(function() {
				$(".fancybox").fancybox();
			});
			
			$(document).ready(function() {
				$(".various").fancybox();
			});
		</script>

			<?php if ( has_post_thumbnail() ) {	the_post_thumbnail('full');	} ?>
			
		<nav id="midia-navigation" class="main-navigation" role="navigation">
			<?php /*<button class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></button> */?>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'midias-menu', 'menu_class' => 'nav-menu' ) ); ?>
			
			<?php 
			
				$id_post = $_REQUEST['id_post'];
				if($id_post != ""){
			?>
					<script type="text/javascript">
						$(document).ready(function () {
							$.fancybox({
								/*'width': '40%',
								'height': '40%',*/
								'autoScale': true,
								'transitionIn': 'fade',
								'transitionOut': 'fade',
								'type': 'iframe',
								'href': '<?php echo home_url() ?>/abrir-mensagens?id_post=<?php echo $id_post ?>'
							});
						});
					</script>
			<?php	}	?>
		
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
			
		<div id="primary" class="site-content">
			<div id="content" role="main">
		<header class="entry-header">
						<span class="title-in">&nbsp//<span class="title" ><?php the_title();	/* Exibe o titlo */ ?></span></span>
						<hr id="hr_destaque" class="espaco">
		</header>

							<?php //Baixa os posts de uma determinada categoria com um limite de posts ?>
						<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;       
								query_posts( array( 'cat' => $id_cat, 'posts_per_page' => 16, 'category__not_in' => array(), 'paged' => $paged ) );
								while ( have_posts() ) : the_post(); ?> 

							<?php //Encurtador de titulos ?>
							
						<?php //Inicio do Script de encurtamento de titulos
							 if (strlen(the_title('','',FALSE)) > 17) { //Character length
								  $title_short = substr(the_title('','',FALSE), 0, 17); // Character length
								  preg_match('/^(.*)\s/s', $title_short, $matches);
							  if ($matches[1]) $title_short = $matches[1];
								  $title_short = $title_short.'...'; // Ellipsis
							  } else {
								  $title_short = the_title('','',FALSE);
							  } 
							  //Final do Script de Encurtamentos de titulos
						?>
						
							<?php //"if" que exibe as imagens das ministra��es, se n�o tiver imagem vai exibir o logo da CBN ?>

						<?php if (has_post_thumbnail( $post->ID ) ): ?>
						
						<?php	$domsxe = simplexml_load_string(get_the_post_thumbnail());
								$thumbnailsrc = $domsxe->attributes()->src;
						?>

						<div id="transbox" class="fundo">
							<a class="various fancybox.iframe" title="<?php the_title_attribute(); ?>" href=<?php echo home_url()."/abrir-mensagens?id_post=".$post->ID ?> ><img id="img_thumb" src= "<?php echo $thumbnailsrc ?>"; /></a>

								<a class="various fancybox.iframe fonttransbox" title=' <?php the_title_attribute( $args ); ?> ' href=<?php echo home_url()."/abrir-mensagens?id_post=".$post->ID ?> ><?php echo $title_short ?></a>
								<br>
								<span id="data_msg" class="fonttransbox"><?php retorna_nome_pastor_preletor(); ?><br>
								<?php the_time('j/m/y') ?></span>
						</div>

						<?php else: ?>
						
						<div id="transbox" class="fundo">
							<a class="various fancybox.iframe" title="<?php the_title_attribute(); ?>" href=<?php echo home_url()."/abrir-mensagens?id_post=".$post->ID ?> ><img id="img_thumb" src= "<?php echo get_option('home')."/wp-content/none_images/none.jpg" ?>"; /></a>

								<a class="various fancybox.iframe fonttransbox" title=' <?php the_title_attribute( $args ); ?> ' href=<?php echo home_url()."/abrir-mensagens?id_post=".$post->ID ?> ><?php echo $title_short ?></a>
								<br>
								<span id="data_msg" class="fonttransbox"><?php retorna_nome_pastor_preletor(); ?><br>
								<?php the_time('j/m/y') ?></span>
						</div>

						<?php
							endif; 
							endwhile;
						?>
						
						<br><br>
						
						<div id="pagenavi_all"><?php wp_pagenavi(); ?></div>
						
			</div><!-- #content -->
		</div><!-- #primary -->

		<?php get_sidebar('mensagem'); ?>

		<?php get_footer(); ?>