<?php

namespace WPEmerge\Helpers;

/**
 * A collection of tools dealing with urls
 */
class Arguments {
	/**
	 * Get a closure which will flip preceding optional arguments around.
	 * @example list( $argument1, $argument2 ) = Arguments::flip( $optional_arguments )( $argument1, $argument2 );
	 *
	 * @param  int      $optional_arguments
	 * @return \Closure
	 */
	public static function flip() {
		$arguments = func_get_args();
		$first_null = array_search( null, $arguments, true );

		if ( $first_null === false ) {
			return $arguments;
		}

		$arguments = array_values( array_merge(
			array_slice( $arguments, $first_null ),
			array_slice( $arguments, 0, $first_null )
		) );

		return $arguments;
	}
}