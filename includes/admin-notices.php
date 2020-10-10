<?php

class EL_Admin_Notices {

    public function admin_notice_missing_main_plugin () {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }

        $message = sprintf(
        /* translators: 1: Plugin name 2: Elementor */
            esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'elementor-starter-plugin' ),
            '<strong>' . esc_html__( 'Elementor Starter Plugin', 'elementor-starter-plugin' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'elementor-starter-plugin' ) . '</strong>'
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    public function admin_notice_minimum_elementor_version () {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }

        $message = sprintf(
        /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-starter-plugin' ),
            '<strong>' . esc_html__( 'Elementor Starter Plugin', 'elementor-starter-plugin' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'elementor-starter-plugin' ) . '</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    public function admin_notice_minimum_php_version () {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }

        $message = sprintf(
        /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-starter-plugin' ),
            '<strong>' . esc_html__( 'Elementor Starter Plugin', 'elementor-starter-plugin' ) . '</strong>',
            '<strong>' . esc_html__( 'PHP', 'elementor-starter-plugin' ) . '</strong>',
            self::MINIMUM_PHP_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }


}
