<?php

add_action( 'after_setup_theme', 'pp_theme_setup' );
add_filter( 'stylesheet_uri', 'pp_stylesheet_uri', 10, 2 );

/**
 * Basic theme setup stuff like theme support
 *
 * @package pp
 * @subpackage boilerplate-theme_filters+hooks
 * @internal only called as `after_setup_theme` action
 * @link https://codex.wordpress.org/Function_Reference/add_theme_support
 *
 */
function pp_theme_setup() {

	global $content_width;

	// Set the $content_width for things such as video embeds.
	// http://codex.wordpress.org/Content_Width
	if ( !isset( $content_width ) )
		$content_width = 1000;

	// Let WordPress manage document title
	add_theme_support( 'title-tag' );

	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption') ); 	// http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5

	// Add support for excerpts
	add_post_type_support( 'page', 'excerpt' );

}

/**
 * Change the stylesheet url to our compiled stylesheet from Sassyplayte
 *
 * @package pp
 * @subpackage boilerplate-theme_filters+hooks
 * @internal only called as `stylesheet_uri` filter
 * @link https://github.com/nathansh/sassyplate Sassyplate SASS boilerplate repo
 *
 */
function pp_stylesheet_uri( $stylesheet_uri, $stylesheet_dir_uri ){
	return $stylesheet_dir_uri . '/stylesheets/css/style.css';
}

/**
 * Use wp_enqueue to add theme stylesheet to wp_head()
 *
 * @package pp
 * @subpackage boilerplate-theme\filters+hooks
 * @uses pp_stylesheet_uri()
 * @link http://codex.wordpress.org/Function_Reference/wp_enqueue_style
 * @internal the '15' in the add_action forces the file to load after the other styles in wp_head().
 *
 */
function pp_enqueue_styles() {
	 wp_enqueue_style( 'theme-stylesheet',  get_bloginfo( 'stylesheet_url' ) );
}
add_action( 'wp_enqueue_scripts', 'pp_enqueue_styles', 15 );

// Clean up <head> and improve security.
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'feed_links', 2  );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
