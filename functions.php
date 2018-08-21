<?php

    // https://github.com/cristian-ungureanu/customizer-repeater
    require get_template_directory() . '/kirki-develop/kirki.php';

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

    function switcher_add_dynamic_controls($wp_customize) {

        $wp_customize->add_section( 'quick_links_section', array(
            'title' => 'Quick Links'
        ));

        for ( $i = 0; $i < 8; $i++ ) {
            $wp_customize->add_setting( 'quick_links['.$i.'][text]', array(
                'capability' => 'edit_theme_options',
                'default' => 'Quick Link',
            ) );
            $wp_customize->add_setting( 'quick_links['.$i.'][page]', array(
                'capability' => 'edit_theme_options'
            ) );
          
            $wp_customize->add_control( 'quick_links['.$i.'][text]', array(
                'type' => 'text',
                'section' => 'quick_links_section', // Add a default or your own section
                'label' => __( 'Quick Link #' . ($i+1) ),
                'description' => __( 'Title for link #' . ($i+1) . '.' ),
            ) );

            $wp_customize->add_control( 'quick_links['.$i.'][page]', array(
                'type' => 'dropdown-pages',
                'section' => 'quick_links_section', // Add a default or your own section
                'description' => __( 'Destination for link #' . ($i+1) . '.' ),
            ) );

        }

        
    }

    function switcher_add_true_dynamic_controls() {
        

        Kirki::add_panel( 'ws_footer_panel', array(
            'priority'    => 10,
            'title'       => esc_attr__( 'Link Controls', 'textdomain' ),
            'description' => esc_attr__( 'Controls for customizing footer elements', 'textdomain' ),
        ) );

        Kirki::add_section( 'ws_quicklinks_section', array(
            'title'          => esc_attr__( 'Quick Links', 'textdomain' ),
            'description'    => esc_attr__( 'Add pages to the quicklinks section.', 'textdomain' ),
            'panel'          => 'ws_footer_panel',
            'priority'       => 160,
        ) );

        Kirki::add_field( 'ws_quicklinks_repeater', array(
            'type'        => 'repeater',
            'label'       => esc_attr__( 'Links', 'textdomain' ),
            'section'     => 'ws_quicklinks_section',
            'priority'    => 10,
            'row_label' => array(
                'type'  => 'field',
                'value' => esc_attr__('Quick link', 'textdomain' ),
                'field' => 'link_text',
            ),
            'button_label' => esc_attr__(' &#10133; Add  new quick link', 'textdomain' ),
            'settings'     => 'ws_quicklinks_settings',
            'default'      => array(
                array(
                    'link_text' => esc_attr__( 'Home', 'textdomain' ),
                    'link_url'  => '33',
                ),
                array(
                    'link_text' => esc_attr__( 'Kirki Repository', 'textdomain' ),
                    'link_url'  => 'https://github.com/aristath/kirki',
                ),
            ),
            'fields' => array(
                'link_text' => array(
                    'type'        => 'text',
                    'label'       => esc_attr__( 'Link Text', 'textdomain' ),
                    'description' => esc_attr__( 'This will be the label for your link', 'textdomain' ),
                    'default'     => '',
                ),
                'link_url' => array(
                    'type'        => 'dropdown-pages',
	                'label'       => esc_attr__( 'Destination', 'textdomain' ),
	                'default'     => 42
                ),
            )
        ) );
        
    }

    Kirki::add_config( 'theme_config_id', array(
        'capability'    => 'edit_theme_options',
        'option_type'   => 'theme_mod',
    ) );
    
    add_action('customize_register', 'switcher_add_custom_controls');
    add_action('customize_register', 'switcher_add_dynamic_controls');
    switcher_add_true_dynamic_controls();
?>