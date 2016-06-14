<?php

/**
 * Adds a favicon to the WordPress admin
 *
 * @package pp
 * @subpackage boilerplate-theme_filters+hooks
 *
 * @internal Called by `login_head` and `admin_head` hooks
 *
 */
function pp_add_favicon() {

	$icon = false;

	// Create the URL of the logo
	$possible_favicons = array(
		'/images/favicons/favicon.ico',
		'/images/favicons/favicon.png',
		'/images/favicon.ico',
		'/images/favicon.png',
		'/favicons/favicon.ico',
		'/favicons/favicon.png',
		'/favicon.ico',
		'/favicon.png'
	);

	// Loop through possible favicons and use the first found
	foreach ( $possible_favicons as $option ) {
		if ( file_exists( get_template_directory() . $option ) ) {
			$icon = get_bloginfo( 'template_directory' ) . $option;
			break;
		}
	}

	// Print the favicon link tag
	if ( $icon ) {
		echo '<link rel="shortcut icon" href="' . $icon . '" />';
	}

}

add_action( 'login_head', 'pp_add_favicon' );
add_action( 'admin_head', 'pp_add_favicon' );
