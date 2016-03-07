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
		<div class="div_ibb_footer">
			<span class="logo-footer">Igreja Batista Betel</span>
			<span class="ano-desenvolvido">2015</span>
		</div>
		
		<div class="div_informacao">
			<a href="http://www.facebook.com/betelbauru" target="_blank"><img class="footer-social-image" src="http://www.betel-bauru.com.br/wp-content/themes/twentytwelve-chield/images/facebook.png" width="32px"/></a>
			<a href="http://www.youtube.com/betelbauru" target="_blank"><img class="footer-social-image" src="http://www.betel-bauru.com.br/wp-content/themes/twentytwelve-chield/images/youtube.png" width="32px"/></a>
			<br>
			<p class="informacao">Equipe de comunicação Betel</p>
		</div>
	</div>
</body>
</html>