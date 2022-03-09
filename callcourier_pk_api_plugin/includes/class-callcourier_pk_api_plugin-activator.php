<?php

/**
 * Fired during plugin activation
 *
 * @link       http://huzaifairfan.com/
 * @since      1.0.0
 *
 * @package    callcourier_pk_api_plugin
 * @subpackage callcourier_pk_api_plugin/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    callcourier_pk_api_plugin
 * @subpackage callcourier_pk_api_plugin/includes
 * @author     Huzaifa Irfan <huzaifairfan2001@gmail.com>
 */
class callcourier_pk_api_plugin_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		
		$post = array(     
			'post_content'   => '
		   [callcourier_pk_track_form]
		   [callcourier_pk_track_details]

			', //content of page
			'post_title'     =>'callcourier_pk Shipment Details', //title of page
			'post_status'    =>  'publish' , //status of page - publish or draft
			'post_type'      =>  'page'  // type of post
  );
  wp_insert_post( $post ); // creates page


	}

}
