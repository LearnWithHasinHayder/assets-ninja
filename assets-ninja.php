<?php
/*
Plugin Name: AssetsNinja
Plugin URI:
Description: Assets Management In Depth
Version: 1.0
Author: LWHH
Author URI: https://hasin.me
License: GPLv2 or later
Text Domain: assetsninja
Domain Path: /languages/
*/

class AssetsNinja{

	function __construct() {

		add_action('plugins_loaded',array($this,'load_textdomain'));
		add_action('wp_enqueue_scripts',array($this,'load_front_assets'));
	}

	function load_front_assets(){

	}

	function load_textdomain(){
		load_plugin_textdomain('assetsninja',false,plugin_dir_url(__FILE__)."/languages");
	}
}

new AssetsNinja();