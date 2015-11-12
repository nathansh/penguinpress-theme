<div class="l-sidebar">

	<?php
		/**
		 * Sub menu using wp_nav_menu with sub_menu added
		 * @link http://nathansh.github.io/penguinpress-theme/docs/function-pp_wp_nav_menu_objects_sub_menu.html
		 * @link https://codex.wordpress.org/Function_Reference/wp_nav_menu
		 */
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'container' => 'nav',
			'container_class' => 'menu subnav',
			'depth' => 2,
			'sub_menu' => true
			)
		);
	?>

	<?php if ( is_active_sidebar( 'primary' ) ) : ?>
		<?php dynamic_sidebar( 'primary' ); ?>
	<?php else : ?>
	<?php endif; ?>
</div><!--  #sidebar -->
