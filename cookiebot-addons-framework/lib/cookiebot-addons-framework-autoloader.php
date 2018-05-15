<?php

/**
 * Class Cookiebot_Addons_Framework_Autoloader
 *
 * @since 1.0.0
 */
class Cookiebot_Addons_Framework_Autoloader {

	/**
	 * plugin root namespace
	 *
	 * @sice 1.0.0
	 */
	const ROOT_NAMESPACE = 'cookiebot_addons_framework\\';

	/**
	 * Register autoload method
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		spl_autoload_register( array( $this, 'cookiebot_autoloader_callback' ) );
	}

	/**
	 * Includes file from the correct namespace
	 * else it will do nothing
	 *
	 * @param $class
	 *
	 * @since 1.0.0
	 */
	public function cookiebot_autoloader_callback($class) {
		if ( strpos( $class, self::ROOT_NAMESPACE ) === 0 ) {
			$path = substr( $class, strlen( self::ROOT_NAMESPACE ) );
			$path = strtolower( $path );
			$path = str_replace( '_', '-', $path );
			$path = str_replace( '\\', DIRECTORY_SEPARATOR, $path ) . '.php';
			$path = CAF_DIR . DIRECTORY_SEPARATOR . $path;

			if ( file_exists( $path ) ) {
				include $path;
			}
		}
	}
}

/**
 * Start autoloader
 *
 * @since 1.0.0
 */
new Cookiebot_Addons_Framework_Autoloader();