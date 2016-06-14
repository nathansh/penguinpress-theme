<?php


/**
 * Print the return value of a template function
 *
 * @param string $function Function name
 * @param mixed $parameters Function parameters, optional
 */
function pp_print_function( $function, $paramters = array() ) {

	if ( is_array( $paramters ) ) {
		$params = $paramters;
	} else {
		$params = array( $paramters );
	}

	$output = call_user_func_array( $function, $params );

	if ( $output ) {
		echo $output;
	}

}


/**
 * Return the markup of a widget
 *
 */
if( !function_exists( 'pp_get_the_widget' ) ){

	function pp_get_the_widget( $widget, $instance = '', $args = '' ){

		ob_start();

		the_widget( $widget, $instance, $args );

		return ob_get_clean();

	}

}
