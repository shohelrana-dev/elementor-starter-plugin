<?php
/**
 * Plugin Name: Elementor Starter Plugin
 * Version:     1.0.0
 * Author:      Shohel Rana
 * Author URI:  https://github.com/shohelrrrana
 * Text Domain: elementor-starter-plugin
 */

if ( ! defined( 'ABSPATH' ) ) exit;

require_once __DIR__ . '/includes/admin-notices.php';
require_once __DIR__ . '/includes/register-categories.php';
require_once __DIR__ . '/includes/enqueue.php';
require_once __DIR__ . '/includes/register-widgets.php';

final class Elementor_Start_Plugin {

    const VERSION = '1.0.0';
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
    const MINIMUM_PHP_VERSION = '7.0';


    private static $_instance = null;

    public static function instance () {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;

    }

    public function __construct () {
        // Init Plugin
        add_action( 'plugins_loaded', array( $this, 'init' ) );
    }

    public function init () {
        load_plugin_textdomain( 'elementor-starter-plugin' );

        $admin_notices = new EL_Admin_Notices();

        // Check if Elementor installed and activated
        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $admin_notices, 'admin_notice_missing_main_plugin' ] );
            return;
        }

        // Check for required Elementor version
        if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $admin_notices, 'admin_notice_minimum_elementor_version' ] );
            return;
        }

        // Check for required PHP version
        if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
            add_action( 'admin_notices', [ $admin_notices, 'admin_notice_minimum_php_version' ] );
            return;
        }

        new EL_Register_Categories();
        new EL_Enqueue();
        new EL_Register_Widgets();

    }

}

// Instantiate Plugin.
Elementor_Start_Plugin::instance();
