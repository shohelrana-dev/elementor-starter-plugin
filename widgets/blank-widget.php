<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Blank_Widget extends Widget_Base {

    public function get_name () {
        return 'blank_widget';
    }

    public function get_title () {
        return __( 'Blank Widget', 'elementor-starter-plugin' );
    }

    public function get_icon () {
        return 'eicon-posts-ticker';
    }

    public function get_categories () {
        return [ 'general', 'custom' ];
    }

    protected function _register_controls () {
        $this->register_content_controls();
        $this->register_style_controls();

    }

    protected function register_content_controls () {
        $this->start_controls_section( 'section_content', [
                'label' => __( 'Content', 'elementor-starter-plugin' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control( 'heading', [
                'label' => __( 'Heading', 'elementor-starter-plugin' ),
                'type'  => Controls_Manager::TEXT,
            ]
        );

        $this->end_controls_section();
    }

    protected function register_style_controls () {
        $this->start_controls_section( 'section_style', [
                'label' => __( 'Style', 'elementor-starter-plugin' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label'    => __( 'Typography', 'elementor-starter-plugin' ),
                'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .heading',
            ]
        );

        $this->end_controls_section();
    }

    protected function render () {
        $settings = $this->get_settings_for_display();
        $heading = $this->get_settings( 'heading' );
        ?>
        <h1 class="heading"><?php echo esc_html( $heading ); ?></h1>
        <?php
    }
}
