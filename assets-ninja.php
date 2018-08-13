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

define( "ASN_ASSETS_DIR", plugin_dir_url( __FILE__ ) . "assets/" );
define( "ASN_ASSETS_PUBLIC_DIR", plugin_dir_url( __FILE__ ) . "assets/public" );
define( "ASN_ASSETS_ADMIN_DIR", plugin_dir_url( __FILE__ ) . "assets/admin" );
define( 'ASN_VERSION', time() );

class AssetsNinja {

    private $version;

    function __construct() {

        $this->version = time();

        add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'load_front_assets' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'load_front_assets' ) );
    }

    function load_front_assets() {
        wp_enqueue_style('asn-main-css',ASN_ASSETS_PUBLIC_DIR."/css/main.css",null,$this->version);

        wp_enqueue_script( 'asn-main-js', ASN_ASSETS_PUBLIC_DIR . "/js/main.js", array(
            'jquery',
            'asn-another-js'
        ), $this->version, true );

        wp_enqueue_script( 'asn-another-js', ASN_ASSETS_PUBLIC_DIR . "/js/another.js", array(
            'jquery',
            'asn-more-js'
        ), $this->version, true );

        wp_enqueue_script( 'asn-more-js', ASN_ASSETS_PUBLIC_DIR . "/js/more.js", array( 'jquery' ), $this->version, true );

        $data = array(
            'name'=>'lwhh',
            'url'=>'https://learnwith.hasinhayder.com'
        );
        $moredata = array(
            'name'=>'LearnWithHasinHayder',
            'url'=>'https://learnwith.hasinhayder.com/wp/'
        );

        $translated_strings = array(
            'greetings'=>__('Hello World','assetsninja')
        );

        wp_localize_script('asn-more-js','sitedata',$data);
        wp_localize_script('asn-more-js','moredata',$moredata);
        wp_localize_script('asn-more-js','translations',$translated_strings);

    }


    function load_textdomain() {
        load_plugin_textdomain( 'assetsninja', false, plugin_dir_url( __FILE__ ) . "/languages" );
    }
}

new AssetsNinja();