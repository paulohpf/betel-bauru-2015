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
					 
					}else{	/* send the submitted data */ 
						 
						if( $_SESSION['captcha'] == $_POST['captcha']){
							
							$nome=$_REQUEST['nome']; 
							$email=$_REQUEST['email'];
							$message=$_REQUEST['message'];
							$from="From: $nome<$email>\r\nReturn-path: $email";							

							if (($nome=="")||($email=="")||($message=="")){ 
								echo "Todos os campos são obrigatorios, porfavor preencha <a href=\"\">o formulario</a> de novo."; 
							}else{
								$nome_comunicacao = "Comunicação Betel";
								$email_comunicacao = "contato@betel-bauru.com.br";
								//$from="From: $nome<$email>\r\nReturn-path: $email";
								$from="From: $nome_comunicacao<$email_comunicacao>\r\nReply-To: $nome<$email>\r\nReturn-Path: $nome_comunicacao<$email_comunicacao>"; 
								$subject="Formulario de contato Betel"; 
								
								$message_editor = "Email enviado por $nome($email)
								Mensagem:
								$message";
								
								mail("webmaster@betel-bauru.com.br", $subject, $message_editor, $from); 
								echo "Email enviado!"; 
							}						
						
						}else{
							echo "<h1>Erro - Código digitado errado</h1>";
						}
					}
				?>
		
		</div><!-- #content -->
	</div><!-- #primary -->		
<?php get_footer(); ?>		