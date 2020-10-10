<?php

class EL_Register_Widgets {

    public function __construct () {
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
    }

    public function init_widgets () {
        // Include Widget files
        require_once dirname( __FILE__ ) . '/../widgets/blank-widget.php';

        // Register widgets
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Blank_Widget() );
    }
}
