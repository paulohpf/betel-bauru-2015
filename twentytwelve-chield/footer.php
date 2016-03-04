<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
</div><!-- #page -->
<!-- #footer -->
	<div id="footer" class="footer">
		<?php if ( dynamic_sidebar('rodape-esquerda-widgets') ) : else : endif; ?>
		
		<?php if ( dynamic_sidebar('rodape-central-widgets') ) : else : endif; ?>
		
		<?php if ( dynamic_sidebar('rodape-direita-widgets') ) : else : endif; ?>
	</div>
	<div id="footer-message" class="footer-message">
		<span class="logo-footer">Igreja Batista Betel</span>
		<span class="ano-desenvolvido">2015</span>
		<p class="informacao">Equipe de comunicação Betel</p>
	</div>
</body>
</html>