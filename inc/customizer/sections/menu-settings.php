<?php
/**
 * Menu Settings
 *
 * Register Menu Settings section, settings and controls for Theme Customizer
 *
 * @package ctpress
 */

/**
 * Adds post settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function ctpress_customize_register_menu_settings( $wp_customize ) {

	/*Add Sections for Menu Settings.*/
	$wp_customize->add_section( 'ctpress_section_menu', array(
		'title'    => esc_html__( 'Menu Settings', 'ctpress' ),
		'priority' => 40,
		'panel'    => 'ctpress_options_panel',
		'capability'  => 'edit_theme_options', //Capability needed to tweak
		'description' => __('Allows you to customize theme menu background color, font color, search show and hide.', 'ctpress'), //Descriptive tooltip
	) );

	/*Get Default Settings.*/
	$default = ctpress_default_options();

    /*Menu Background Color*/
	$wp_customize->add_setting(
		'ctpress[menu_bg_color]', array(
		  'default' 		  => $default['menu_bg_color'],
		  'sanitize_callback' => 'sanitize_hex_color',
		  'type' 			  => 'option',
		  'transport'         => 'postMessage',
		  'capability' 		  => 'edit_theme_options'
		)
	);  

	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 'ctpress[menu_bg_color]', array(
			'label' 	=> esc_html__( 'Menu background color settings', 'ctpress' ),
			'section'   => 'ctpress_section_menu',
			'settings'  => 'ctpress[menu_bg_color]'
		)
		)
	);

    /*Menu Font Color*/
	$wp_customize->add_setting(
		'ctpress[menu_font_color]', array(
		  'default' => $default['menu_font_color'],
		  'sanitize_callback' => 'sanitize_hex_color',
		  'type' => 'option',
		  'transport'         => 'postMessage',
		  'capability' => 'edit_theme_options'
		)
	);  

	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 'ctpress[menu_font_color]', array(
			'label' => esc_html__( 'Menu font color settings', 'ctpress' ),
			'section' => 'ctpress_section_menu',
			'settings' => 'ctpress[menu_font_color]'
		)
		)
	); 

    /*Menu Font hover Color*/
	$wp_customize->add_setting (
		'ctpress[menu_font_hv_clr]', array(
			'default' 		  => $default['menu_font_hv_clr'],
			'sanitize_callback' => 'sanitize_hex_color',
			'type' 			  => 'option',
			'transport'      	  => 'postMessage',
			'capability' 		  => 'edit_theme_options'
		)
	);  

	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'ctpress[menu_font_hv_clr]', array(
			'label' => esc_html__( 'Menu font hover color settings', 'ctpress' ),
			'section' => 'ctpress_section_menu',
			'settings' => 'ctpress[menu_font_hv_clr]'
		)
		)
	);  

	/*Add Menu Details Headline.*/
	$wp_customize->add_control( new ctpress_Customize_Header_Control(
		$wp_customize, 'menu_settings', array(
			'label'    => esc_html__( 'Menu Search Option Hide settings', 'ctpress' ),
			'section'  => 'ctpress_section_menu',
			'settings' => array(),
			'priority' => 10,
		)
	) );

	/*Add Setting and Control for showing menu search.*/
	$wp_customize->add_setting( 'ctpress[menu_search]', array(
		'default'           => $default['menu_search'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ctpress_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'ctpress[menu_search]', array(
		'label'    => esc_html__( 'Hide search', 'ctpress' ),
		'section'  => 'ctpress_section_menu',
		'settings' => 'ctpress[menu_search]',
		'type'     => 'checkbox',
		'priority' => 20,
	) );

}
add_action( 'customize_register', 'ctpress_customize_register_menu_settings' );


