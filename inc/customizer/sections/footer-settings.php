<?php
/**
 * Footer Settings
 *
 * Register Footer Settings section, settings and controls for Theme Customizer
 *
 * @package ctpress
 */

/**
 * Adds Footer settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function ctpress_customize_register_footer_settings( $wp_customize ) {

	// Add Sections for Post Settings.
	$wp_customize->add_section( 'ctpress_section_footer', array(
		'title'    => esc_html__( 'Footer Settings', 'ctpress' ),
		'priority' => 190,
		'panel'    => 'ctpress_options_panel',
	) );

	// Get Default Settings.
	$default = ctpress_default_options();

	// Add Footer Text setting.
	$wp_customize->add_setting( 'ctpress_theme_options[footer_text]', array(
		'default'           => '',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ctpress_sanitize_footer_text',
	) );

	$wp_customize->add_control( 'ctpress_theme_options[footer_text]', array(
		'label'    => esc_html__( 'Footer Text', 'ctpress' ),
		'section'  => 'ctpress_section_footer',
		'settings' => 'ctpress_theme_options[footer_text]',
		'type'     => 'textarea',
		'priority' => 10,
	) );

	// Add selective refresh for footer text.
	$wp_customize->selective_refresh->add_partial( 'ctpress_theme_options[footer_text]', array(
		'selector'         => '.site-info .footer-text',
		'render_callback'  => 'ctpress_customize_partial_footer_text',
		'fallback_refresh' => false,
	) );

	// Add Credit Link setting.
	$wp_customize->add_setting( 'ctpress_theme_options[credit_link]', array(
		'default'           => true,
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ctpress_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'ctpress_theme_options[credit_link]', array(
		'label'    => esc_html__( 'Display credit link on footer line', 'ctpress' ),
		'section'  => 'ctpress_section_footer',
		'settings' => 'ctpress_theme_options[credit_link]',
		'type'     => 'checkbox',
		'priority' => 20,
	) );

}
add_action( 'customize_register', 'ctpress_customize_register_footer_settings' );


/**
 * Render the footer text for the selective refresh partial.
 */
function ctpress_customize_partial_footer_text() {
	echo do_shortcode( wp_kses_post( ctpress_get_option( 'footer_text' ) ) );
}
