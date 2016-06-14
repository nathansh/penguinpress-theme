<?php

	/**
	 * Returns html for an ACF image
	 *
	 * ### Usage:
	 * ```php
	 * $image = pp_get_acf_image($image, $size, $classes);
	 * if ( $image ) {
	 *	echo $image;
	 * }
	 * ```
	 *
	 * @package pp
	 * @subpackage boilerplate-theme
	 *
	 * @param array|string  $image 			Image array as returned by ACF, or field name as a string
	 * @param string $size 					Image size
	 * @param string $classes 				Classes to be added
	 * @link http://www.advancedcustomfields.com/resources/image/
	 * @return string 						HTML output
	 *
	 */
	function pp_get_acf_image( $image, $size = 'thumbnail', $classes = '' ) {

		// Bail early if there's no image
		if ( !is_array( $image ) ) {

			// Maybe it's a string with a field name?
			$field = get_field( $image );
			if ( $field ) {
				$image = $field;
			} else {
				return false;
			}
		}

		$img = '<img src="' . $image['sizes'][$size] . '"';

		// Alt
		if ( !empty( $image['alt'] ) ) {
			$img .= ' alt="' . $image['alt'] . '"';
		}

		// Title
		if ( !empty( $image['title'] ) ) {
			$img .= ' title="' . $image['title'] . '"';
		}

		// Classes
		if ( $classes ) {
			$img .= ' class="' . $classes . '"';
		}

		// width/height
		$img .= ' width="' . $image['sizes'][$size . '-width'] . '"';
		$img .= ' height="' . $image['sizes'][$size . '-height'] . '" />';

		return $img;

	}

	/**
	 * Echos the output from pp_get_acf_image, which returns html for an ACF image
	 *
	 * ### Usage:
	 * ```php
	 * pp_acf_image(get_field('photo'), 'large', 'fancy_class');
	 * ```
	 *
	 * @package pp
	 * @subpackage boilerplate-theme
	 *
	 * @param array  $image 				Image array as returned by ACF
	 * @param string $size 					Image size
	 * @param string $classes 				Classes to be added
	 * @uses pp_get_acf_image()
	 * @link http://www.advancedcustomfields.com/resources/image/
	 *
	 */
	function pp_acf_image( $image, $size = 'thumbnail', $classes = '' ) {

		$image = pp_get_acf_image( $image, $size, $classes );
		if ( $image ) {
			echo $image;
		}

	}


	/**
	 * Returns the url of a post thumbnail for the current post. Can also specify
	 * post ID and image size.
	 *
	 * ### Usage
	 * For the full image of the current post:
	 * <code>
	 * $image = pp_get_post_thumbnail_url();
	 * </code>
	 *
	 * For the 'thumbnail' size of another post:
	 * <code>
	 * $image = pp_get_post_thumbnail_url('thumbnail', 13);
	 * </code>
	 *
	 * For the full image of another post:
	 * <code>
	 * $image = pp_get_post_thumbnail_url('full', 13);
	 * </code>
	 *
	 * @package pp
	 * @subpackage boilerplate-theme
	 *
	 * @param string $size 		The image size to return. Use 'full' for full image
	 * @param ind $id 			ID of another post to return
	 *
	 * @return string|bool 		Image URL or false
	 */
	function pp_get_post_thumbnail_url( $size='', $id = false ) {

		if ( !$id ) {
			$id = get_the_ID();
		}

		if ( has_post_thumbnail( $id ) ) {
			$url = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), $size );
			return $url[0];
		} else {
			return false;
		}

	}
