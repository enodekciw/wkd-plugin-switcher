<?php
/**
 * Plugin Name:     WKD Plugin Switcher
 * Description:     Switch plugins on/off @ specific time
 * Author:          WKD
 * Author URI:      https://wkd.lt/
 * Text Domain:     wkd-plugin-switcher
 * Version:         0.1.0
 *
 * @package         Wkd_Plugin_Switcher
 */

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

class WKD_Plugin_Switcher {

	public $plugins 	= [];
	public $active_plugins 	= [];
	public $now		= '';
	public $active_from 	= '';
	public $active_to 	= '';

	public function __construct(){
		$this->plugins = apply_filters( 'wkd_plugin_switcher_plugins', [] );
		$this->active_plugins = get_option( 'active_plugins', [] );
		$this->now = apply_filters( 'wkd_plugin_switcher_now', current_time('Hi') );
		$this->active_from = apply_filters( 'wkd_plugin_switcher_active_from', '' );
		$this->active_to = apply_filters( 'wkd_plugin_switcher_active_to', '' );
		if( $this->plugins && $this->active_from && $this->active_to ) {
			add_action( 'init', [ $this, 'switch_plugins' ], 9999 );
		}
	}

	public function switch_plugins(){
		if( $this->now >= $this->active_from && $this->now < $this->active_to ) {
			foreach( $this->plugins as $plugin ) {
				if( ! is_plugin_active( $plugin ) ) activate_plugins( $plugin );
			}
		} else {
			foreach( $this->plugins as $plugin ) {
				if( is_plugin_active( $plugin ) ) deactivate_plugins( $plugin );
			}
		}
	}

}

add_action( 'init', 'wkd_plugin_switcher_init' );
function wkd_plugin_switcher_init(){
	$plugin = new WKD_Plugin_Switcher();
}


