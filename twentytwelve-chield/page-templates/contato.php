<?php
/**
 * Template Name: Contato
 */

get_header(); ?>

	<?php if ( has_post_thumbnail() ) {	the_post_thumbnail('full');	} ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
				<?php 
					$action=$_REQUEST['action']; 
					if ($action=="")    /* display the contact form */ { 
					
					while (have_posts()) : the_post(); 

						get_template_part('content-personalized', get_post_format()); 

						comments_template('', true); 

					endwhile; // end of the loop.
					 
						}  
					else{	/* send the submitted data */ 
						 
						$nome=$_REQUEST['nome']; 
						$email=$_REQUEST['email']; 
						$message=$_REQUEST['message'];
						$from="From: $nome<$email>\r\nReturn-path: $email"; 
						if (($nome=="")||($email=="")||($message=="")){ 
							echo "Todos os campos são obrigatorios, porfavor preencha <a href=\"\">o formulario</a> de novo."; 
						}else{         
							$from="From: $nome<$email>\r\nReturn-path: $email"; 
							$subject="Formulario de contato Betel"; 
							mail("webmaster@betel-bauru.com.br", $subject, $message, $from); 
							echo "Email enviado!"; 
						}
					}
				?>
		
		</div><!-- #content -->
	</div><!-- #primary -->		
<?php get_footer(); ?>		