<?php

    function switcher_add_custom_controls($wp_customize) {

        $wp_customize->add_section( 'color_scheme_section', array(
            'title' => 'Color Scheme'
        ));

        $wp_customize->add_setting( 'color_scheme_radio_setting', array(
            'capability' => 'edit_theme_options',
            'default' => 'blue',
        ) );
      
        $wp_customize->add_control( 'color_scheme_radio_setting', array(
            'type' => 'radio',
            'section' => 'color_scheme_section', // Add a default or your own section
            'label' => __( 'Color-Scheme Selection' ),
            'description' => __( 'Select your basic color theme from the options below.' ),
            'choices' => array(
                'red' => __( 'Red w/Circle' ),
                'blue' => __( 'Blue' ),
                'green' => __( 'Green' ),
            ),
        ) );
    }

    add_action('customize_register', 'switcher_add_custom_controls');
?>