<?php

	/**
	 *	Add link name to css class of menu items
	 *
 	 * @package pp
	 * @subpackage boilerplate-theme_filters+hooks
	 *
	 * @internal called by `nav_menu_css_class` filter
	 *
	 */
	add_filter( 'nav_menu_css_class', function( $classes, $item, $args ) {

		// Lowercase title
		$title = strtolower( str_replace( "--", "", preg_replace( "([^a-zA-Z])", "-", $item->title ) ) );
		// Crazy town, start from scratch
		$old_classes = $classes;
		$classes = [];

		// Loop through the classes, add active and children
		foreach ( $old_classes as $class ) {

			// Active
			if ( strstr( $class, "current") && !in_array('is-active', $classes) ) {
				$classes[] = 'is-active';
			}

			// Open the active item by default
			if ( in_array( 'is-active', $classes ) && $item->menu_item_parent == 0 && !in_array( 'is-open', $classes ) ) {
				$classes[] = 'is-open';
			}

			// Preserve any BEM classes
			if ( strstr( $class, "--" ) || strstr( $class, "__" ) || strstr( $class, "is-" ) || strstr( $class, "has-" ) || strstr( $class, "js-" ) ) {
				$classes[] = $class;
			}

		}

		// Children
		if ( in_array( "menu-item-has-children", $old_classes ) ) {
			$classes[] = 'has-children';
		}

		// Get block name
		$block = explode( ' ', $args->container_class );
		$block = end( $block );

		// Add BEM class
		$classes[] = $block . '__item';

		// Add BEM modifier for items
		$classes[] = $block . '__item--' . $title;
		$classes[] = $block . '__item--' . $item->ID;

		return $classes;

	}, 10, 3);


	/**
	 * Hook into menu objects before HTML
	 */
	add_filter( 'wp_nav_menu_objects', function( $items ){

		foreach ( $items as $item ) {

			// Add a primary-nav__child-item class
			if ( $item->menu_item_parent > 0 ) {
				$item->classes[] = 'primary-nav__child-item';
			}

		}

		return $items;

	} );


	/**
	 * Muck with the HTML
	 */
	add_filter( 'wp_nav_menu_items', function( $items ) {

		$items = str_replace( "sub-menu", "primary-nav__children", $items );

		return $items;

	} );
