<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://huzaifairfan.com/
 * @since      1.0.0
 *
 * @package    callcourier_pk_api_plugin
 * @subpackage callcourier_pk_api_plugin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    callcourier_pk_api_plugin
 * @subpackage callcourier_pk_api_plugin/admin
 * @author     Huzaifa Irfan <huzaifairfan2001@gmail.com>
 */
class callcourier_pk_api_plugin_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		
		function callcourier_pk_admin_page()
		{
			require_once 'partials/callcourier_pk_api_plugin-admin-display.php';
		}

		function callcourier_pk_admin()
		{
    		add_menu_page('Callcourier PK Admin','Callcourier PK Admin','manage_options','callcourier-pk-admin','callcourier_pk_admin_page','',200);
		}

		add_action('admin_menu','callcourier_pk_admin');

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in callcourier_pk_api_plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The callcourier_pk_api_plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/callcourier_pk_api_plugin-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in callcourier_pk_api_plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The callcourier_pk_api_plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/callcourier_pk_api_plugin-admin.js', array( 'jquery' ), $this->version, false );

	}

}
