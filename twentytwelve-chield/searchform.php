<form method="get" class="searchform clearfix" action="<?php echo home_url(); ?>/">
	<input type="text" value="<?php echo ( '' == get_search_query() ) ? __( '', 'arras' ) : the_search_query() ?>" name="s" class="s" onfocus="if ( this.value == '<?php _e( '', 'arras' ) ?>' ) this.value = ''" onblur="if ( this.value == '' ) this.value = '<?php _e( '', 'arras' ) ?>'" />
	<input type="submit" class="searchsubmit" value="<?php _e( 'Search', 'arras' ) ?>" title="<?php printf( __( 'Procurar %s', 'arras' ), esc_html( get_bloginfo('name') ) ) ?>" />
</form>