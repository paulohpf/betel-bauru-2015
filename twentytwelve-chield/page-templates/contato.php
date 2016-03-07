<?php
/**
 * Template Name: Contato
 */

get_header(); ?>
	<script type="text/javascript">
		function validateForm(){
			alert_Contato = "<strong>Atenção!</strong><br>";
			//session = valor("captcha-session");
			retorno_nome = false;
			retorno_email = false;
			retorno_message = false;
			//captcha = false;
			mudarClass("alert_Contato", "alert alert-warning");
			
			if(valor("nome")==""){
				alert_Contato = alert_Contato+"O campo <strong>Nome</strong> precisa ser preenchido.<br>"
			}else{
				retorno_nome = true;
			}
			if(valor("email")==""){
				alert_Contato = alert_Contato+"O campo <strong>Email</strong> precisa ser preenchido.<br>"
			}else{
				retorno_email = true;
			}
			if(valor("message")==""){
				alert_Contato = alert_Contato+"O campo <strong>Mensagem</strong> precisa ser preenchido.<br>"
			}else{
				retorno_message = true;
			}
			
			/*if(valor("captcha") != session){
			alert_Contato = alert_Contato+"O campo de verificação foi preenchido errado.<br>"		
			}
			else{
				captcha = true;
			}*/
			
			if(retorno_nome == true && retorno_email == true && retorno_message == true /*&& captcha == true*/){
				escondeCampo("alert_Contato");
				return true;
			}else{
				valor_div("alert_Contato", alert_Contato);
				mostraCampo("alert_Contato");
				focus("alert_Contato");
			}	
			
			return false;
		}
		
		function erroCaptcha(){
			nome = "<?php echo $_REQUEST['nome'] ?>";
			email = "<?php echo $_REQUEST['email'] ?>";
			message = "<?php echo $_REQUEST['message'] ?>";
			mudarClass("alert_Contato", "alert alert-warning");

			valor('nome', nome);
			valor('email', email);
			valor('message', message);

			alert_Contato = "<strong>Atenção!</strong><br>O campo de verificação foi preenchido errado.<br>"
			valor_div("alert_Contato", alert_Contato);
			mostraCampo("alert_Contato");
			focus("alert_Contato");
		}
		
		function sucessoEnvio(){
			mudarClass("alert_Contato", "alert alert-success");
			alert_Contato = "<strong>Sucesso!</strong><br>Sua mensagem foi enviada, aguarde um momento que entraremos em contato assim que possivel.<br>"
			valor_div("alert_Contato", alert_Contato);
			mostraCampo("alert_Contato");
			
			document.form_contato.reset();
			focus("alert_Contato");
		}
	</script>

	<?php if ( has_post_thumbnail() ) {	the_post_thumbnail('full');	} ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			
			</div>
				<?php 
					$action=$_REQUEST['action']; 					
					
						while (have_posts()) : the_post();
						
							get_template_part('content-personalized', get_post_format()); 

							comments_template('', true); 

						endwhile; // end of the loop.
						
					if ($action!=""){	/* send the submitted data */ 
						 
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
								
								mail("webmaster@betel-bauru.com.br", $subject, $message_editor, $from); ?>
								<script type="text/javascript">sucessoEnvio();</script>
						<?php	}						
						
						}else{ ?>
							<script type="text/javascript">erroCaptcha();</script>		
				<?php	} 
					}
				?>
		
		</div><!-- #content -->
	</div><!-- #primary -->		
<?php get_footer(); ?>		