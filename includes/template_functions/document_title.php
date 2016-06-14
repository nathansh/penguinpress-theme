<?php

	/**
	 * Return document title, used in the title tag and og:title.
	 *
 	 * @package pp
	 * @subpackage boilerplate-theme
	 *
	 * @link https://codex.wordpress.org/Function_Reference/wp_title WordPress's wp_title() function
	 *
	 * @return string 	Title for the head
	 *
	 */
	function pp_get_document_title() {

		if ( is_home() ) {
			return get_bloginfo( 'name' );
		} else {
			return wp_title( '-', false, 'right' ) . get_bloginfo( 'name' );
		}


	}

	/**
	 * Print the document title, used in the title tag and og:title.
	 *
	 * ### Usage
	 * ```php
	 * <title><?php document_title(); ?></title>
	 * ```
	 * @package pp
	 * @subpackage boilerplate-theme
	 *
	 * @uses pp_get_document_title()
	 * @link https://codex.wordpress.org/Function_Reference/wp_title WordPress's wp_title() function
	 *
	 */
	function pp_document_title() {

		echo pp_get_document_title();

	}
