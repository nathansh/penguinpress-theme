<?php

add_filter( 'body_class','pp_body_classes' );

/**
 * Expands the body classes added by WordPress. <br />
 * Only called by `add_filter('body_class','pp_body_classes');`
 *
 * ### Added classes
 * * `.post_type-{post_type}`
 * * `.post_name-{post_name}`
 * * `.taxonomy-{tax_name}`
 * * `.taxonomy_term-{tax_term_slug}`
 * * `.taxonomy_id-{tax_id}`
 * * `.taxonomy_term_id-{tax_term_id}`
 *
 * @package pp
 * @subpackage boilerplate-theme_filters+hooks
 *
 * @internal Called by `body_class` filter
 *
 */
function pp_body_classes( $classes, $class='' ) {
	global $wp_query;

	if ( isset( $wp_query->queried_object ) ) {

		// Post type
		if ( isset( $wp_query->queried_object->post_type ) ) {
			$classes[] = 'post_type-' . $wp_query->queried_object->post_type;
		}

		// Post name
		if ( isset( $wp_query->queried_object->post_name ) ) {
			$classes[] = 'post_name-' . $wp_query->queried_object->post_name;
		}

		// Taxonomy
		if ( isset( $wp_query->queried_object->taxonomy ) ) {
			$classes[] = 'taxonomy-' . $wp_query->queried_object->taxonomy;
		}

		// Taxonomy term
		if ( isset( $wp_query->queried_object->taxonomy ) ) {
			$classes[] = 'taxonomy_term-' . $wp_query->queried_object->slug;
		}

		// Taxonomy ID
		if ( isset( $wp_query->queried_object->cat_ID ) ) {
			$classes[] = 'taxonomy_id-' . $wp_query->queried_object->cat_ID;
		}

		// Taxonomy term ID
		if ( isset( $wp_query->queried_object->term_id ) ) {
			$classes[] = 'taxonomy_term_id-' . $wp_query->queried_object->term_id;
		}

	} // if isset

	// Has post thumbnail or other acf images, add classes for those
	if ( !pp_is_listing() ) {
		$classes = pp_post_image_classes( $classes );
	}

	// Has comments or not
	if ( is_single() ) {

		if ( comments_open() && get_comments_number() ) {
			$classes[] = 'has-comments';
		} else {
			$classes[] = 'no-comments';
		}

		// Comments open/closed
		if ( comments_open() ) {
			$classes[] = 'can-comment';
		}

	} else {
		$classes[] = 'no-comments';
	}

	// Classes for sidebars
	if ( function_exists( 'pp_sidebar_classes' ) ) {
		$classes[] = pp_sidebar_classes();
	}

	// Class for listing page
	if ( pp_is_listing() && !is_home() ) {
		$classes[] = 'is-listing-page';
	}

	// return the $classes array
	return $classes;
}
