<?php
// Adiciono uma função do template principal.php para ser adicionado no CSS
add_filter('body_class','twentytwelvechild_body_class_adapt',20);
function twentytwelvechild_body_class_adapt( $classes ) {

// Aplico o full-width no template principal.php
if ( is_page_template( 'page-templates/principal.php' ) ) $classes[] = 'principal';

return $classes;
}

/**
 * Criando uma area de widgets no rodape
 *
 */
function widgets_rodape_esquerda_widgets_init() {
	
if ( function_exists('register_sidebar') )
	register_sidebar( array(
		'name' => 'Widget rodape esquerdo',
		'id' => 'rodape-esquerda-widgets',
		'before_widget' => '<div class="rodape-esquerda-widgets">',
		'after_widget' => '</div>',
		'before_title' => '<h1>',
		'after_title' => '</h1>',
		) 
	);
}
add_action( 'widgets_init', 'widgets_rodape_esquerda_widgets_init' );

function widgets_rodape_central_widgets_init() {
	
if ( function_exists('register_sidebar') )
	register_sidebar( array(
		'name' => 'Widget rodape central',
		'id' => 'rodape-central-widgets',
		'before_widget' => '<div class="rodape-central-widgets">',
		'after_widget' => '</div>',
		'before_title' => '<h1>',
		'after_title' => '</h1>',
		) 
	);
}
add_action( 'widgets_init', 'widgets_rodape_central_widgets_init' );

function widgets_rodape_direita_widgets_init() {
	
if ( function_exists('register_sidebar') )
	register_sidebar( array(
		'name' => 'Widget rodape direita',
		'id' => 'rodape-direita-widgets',
		'before_widget' => '<div class="rodape-direita-widgets">',
		'after_widget' => '</div>',
		'before_title' => '<h1>',
		'after_title' => '</h1>',
		) 
	);
}
add_action( 'widgets_init', 'widgets_rodape_direita_widgets_init' );

/*
	Fim das Funções adicionadas no Template Principal (principal.php)
*/

/*
	Inicio das funções adicionadas no Template Igrejas (igrejas.php)
*/

function widgets_igrejas_widgets_init() {	
	if ( function_exists('register_sidebar') )
	register_sidebar( array(
		'name' => 'Igrejas Sidebar',
		'id' => 'sidebar-igrejas',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) 
	);
}
add_action( 'widgets_init', 'widgets_igrejas_widgets_init' );

/*
	Fim das funções adicionadas no Template Igrejas (igrejas.php)
*/

/*
	Inicio das funções adicionadas no Template Mensagens (mensagens.php)
*/

function widgets_mensagem_widgets_init() {	
	if ( function_exists('register_sidebar') )
	register_sidebar( array(
		'name' => 'Mensagem Sidebar',
		'id' => 'sidebar-mensagem',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) 
	);
}
add_action( 'widgets_init', 'widgets_mensagem_widgets_init' );

/*
	Fim das funções adicionadas no Template Mensagens (mensagens.php)
*/

function sh_the_content_by_id( $post_id=0, $more_link_text = null, $stripteaser = false ){
    global $post;
    $post = &get_post($post_id);
    setup_postdata( $post, $more_link_text, $stripteaser );
    //the_content();
	$content = get_the_content();
    wp_reset_postdata( $post );
	return $content;
}

function verificaDispositivo(){
	$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
	$ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
	$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
	$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
	$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
	$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
	$symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
	if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true){ /*Se este dispositivo for portátil, faça/escreva o seguinte */
		return true;
	}
	else{ /* Caso contrário, faça/escreva o seguinte */
		return false;
	}
}

function retorna_nome_pastor_preletor($post_id=null){
	//Função que retorna o nome do Pastor/Preletor apartir da categoria
	
	global $wpdb;
	$results = $wpdb->get_row( "SELECT GROUP_CONCAT(wp_t.name SEPARATOR '/') as term_id FROM wp_terms wp_t INNER JOIN wp_term_taxonomy wp_t_t ON wp_t_t.term_id = wp_t.term_id AND wp_t_t.taxonomy = 'category' AND wp_t_t.parent IN (55)", ARRAY_A );
									
	$resultado = $results['term_id'];
	$rest = explode("/" , $resultado);
	$size_rest = count($rest);
															
	foreach((get_the_category($post_id)) as $category) {
		$categoria = $category->cat_name . '/';
		$posicao = 0;
		for($count = 0; $count < $size_rest; $count++){
			$pos = strpos($categoria,$rest[$count]);
			if($pos === false){

			}else{
				echo $rest[$count];
				break;
			}
		}
	}	
}

function register_midias_menu() {
  register_nav_menu('midias-menu',__( 'Midias Menu' ));
}
add_action( 'init', 'register_midias_menu' );

?>