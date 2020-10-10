<?php

class EL_Enqueue {

    public function __construct () {
        add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'enqueue_frontend_styles' ] );
        add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'enqueue_frontend_scripts' ] );
    }

    public function enqueue_frontend_styles () {
        wp_enqueue_style( 'style-css', plugins_url('/../assets/css/style.css', __FILE__), [], time() );
    }

    public function enqueue_frontend_scripts () {
        wp_enqueue_script( 'scripts-js', plugins_url( '/../assets/js/scripts.js', __FILE__ ), [], time(), true );
    }
}