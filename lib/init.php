<?php
class Kamn_Iconlist {
	
	/** Constructor */
	function __construct() {

		/** Standard Class */
		global $kamn_iconlist;
		$kamn_iconlist = new stdClass;
		
		/** Loader */
		add_action( 'plugins_loaded', array( $this, 'kamn_iconlist_loader' ), 10 );
		
		/** Setup */
		add_action( 'plugins_loaded', array( $this, 'kamn_iconlist_setup' ), 12 );		

	}
	
	/** Loader */
	function kamn_iconlist_loader() {

		/** Directory Location Constants */

		if ( !defined( 'KAMN_ICONLIST_LIB_DIR' ) ) {
			define( 'KAMN_ICONLIST_LIB_DIR', trailingslashit( KAMN_ICONLIST_DIR . 'lib' ) );
		}		

		if ( !defined( 'KAMN_ICONLIST_ADMIN_DIR' ) ) {
			define( 'KAMN_ICONLIST_ADMIN_DIR', trailingslashit( KAMN_ICONLIST_LIB_DIR . 'admin' ) );
		}

		if ( !defined( 'KAMN_ICONLIST_JS_DIR' ) ) {
			define( 'KAMN_ICONLIST_JS_DIR', trailingslashit( KAMN_ICONLIST_LIB_DIR . 'js' ) );
		}

		if ( !defined( 'KAMN_ICONLIST_CSS_DIR' ) ) {
			define( 'KAMN_ICONLIST_CSS_DIR', trailingslashit( KAMN_ICONLIST_LIB_DIR . 'css' ) );
		}
		
		/** URI Location Constants */

		if ( !defined( 'KAMN_ICONLIST_LIB_URI' ) ) {
			define( 'KAMN_ICONLIST_LIB_URI', trailingslashit( KAMN_ICONLIST_URI . 'lib' ) );
		}

		if ( !defined( 'KAMN_ICONLIST_ADMIN_URI' ) ) {
			define( 'KAMN_ICONLIST_ADMIN_URI', trailingslashit( KAMN_ICONLIST_LIB_URI . 'admin' ) );
		}

		if ( !defined( 'KAMN_ICONLIST_JS_URI' ) ) {
			define( 'KAMN_ICONLIST_JS_URI', trailingslashit( KAMN_ICONLIST_LIB_URI . 'js' ) );
		}

		if ( !defined( 'KAMN_ICONLIST_CSS_URI' ) ) {
			define( 'KAMN_ICONLIST_CSS_URI', trailingslashit( KAMN_ICONLIST_LIB_URI . 'css' ) );
		}

		/** Core Classes / Functions */
		require_once( KAMN_ICONLIST_LIB_DIR . 'core.php' );

		/** Register Modules */
		require_once( KAMN_ICONLIST_LIB_DIR . 'modules.php' );
		
		/** Load Admin */
		if ( is_admin() ) {
			
			/** Admin Options */
			require_once( KAMN_ICONLIST_ADMIN_DIR . 'admin.php' );

		}
		
	}	
	
	/** Plugin Setup */
	function kamn_iconlist_setup() {
		
		/** Utility */
		require_once( KAMN_ICONLIST_LIB_DIR . 'utils.php' );
		
	}
	
}

/** Initiate Class */
new Kamn_Iconlist();