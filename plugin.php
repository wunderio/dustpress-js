<?php
/**
 * Plugin Name: DustPress.JS
 * Plugin URI: https://github.com/devgeniem/dustpress-js
 * Description: DustPress JavaScript library. Provides a front-end interface for interacting with the backend functions.
 * Version: 4.4.4
 * Author: Originally by Geniem Oy / Forked for Wunder by Miika Arponen
 * Author URI: http://www.geniem.com
 */
class DustPressJs {

    /**
     * Initalizes the plugin
     *
     * @type    function
     * @date    24/05/2016
     * @since   0.1.0
     *
     * @return  void
     */
    public function __construct() {
        add_action( 'init', [ $this, 'enqueue_scripts' ] );
    }

    /**
     *  This function enqueues front end scripts.
     *
     *  @type    function
     *  @date    17/12/2015
     *  @since   0.1.0
     *
     *  @return  void
     */
    public function enqueue_scripts() {

        // Variables.
        $plugin_data  = get_file_data( __FILE__, [ 'Version' => 'Version' ], 'plugin' );
        $version      = $plugin_data['Version'];
        $dependencies = apply_filters( 'dustpress/js/dependencies', [ 'jquery' ] );
        $in_footer    = apply_filters( 'dustpress/js/in_footer', false );

        wp_register_script( 'dustpress', trailingslashit( plugin_dir_url( __FILE__ ) ) . 'js/dustpress-min.js', $dependencies, $version, $in_footer );

        wp_enqueue_script( 'dustpress' );
    }
}

new DustPressJs();
