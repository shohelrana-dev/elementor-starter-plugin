<?php

class EL_Register_Categories {

    public function __construct () {
        add_action( 'elementor/elements/categories_registered', [ $this, 'register_category' ] );
    }

    public function register_category ( $manager ) {
        $manager->add_category( 'custom', [
            'title' => __( 'Custom', 'elementor-starter-plugin' ),
            'icon'  => 'fa fa-edit',
        ] );
    }
}
