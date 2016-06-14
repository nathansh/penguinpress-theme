<?php /* If there are no posts */ ?>

<article id="post-0" class="post error404 not-found">
	<?php
		if ( is_search() && isset( $_GET['s'] ) ) {
			echo __( "Sorry, there aren't any results for ", wp_get_theme()->get('TextDomain') ) . '<span class="search_term">&quot;' . $_GET['s'] . '&quot;</span>';
		} elseif( is_404() ) {
			get_template_part( 'partials/404' );
		}else {
			echo '<p>' . __( "Sorry, there don't seem to be any content.", wp_get_theme()->get('TextDomain') ) . '</p>';
		}
	?>
</article><!-- #post-0 -->
