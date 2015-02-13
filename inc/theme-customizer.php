<?php
/**
 * Implementation of the Mayer Theme Customizer.
 *
 * @package    Mayer
 * @since      1.0.0
 */

/*------------------------------------------------------------------*
 * Public Functions
/*------------------------------------------------------------------*/

add_action( 'customize_register', 'mayer_theme_customizer' );
/**
 * Introduces the fields for the Twitter username, Facebook URL, Pinterest URL, and Google+ URL
 * into the Theme Customizer
 *
 * @param    object    $wp_customizer    A reference to the WordPress Theme Customizer
 * @since    1.0.0
 */
function mayer_theme_customizer( $wp_customizer ) {

	// Theme options
	$wp_customizer->add_section(
		'mayer_theme_options',
		array(
			'title'     =>  __( 'Theme', 'mayer' ),
			'priority'  => 300
		)
	);

	_mayer_add_twitter_username( $wp_customizer, 1 );
	_mayer_add_facebook_url( $wp_customizer, 2 );
	_mayer_add_pinterest_url( $wp_customizer, 3 );
	_mayer_add_googleplus_url( $wp_customizer, 4 );
	_mayer_add_linkedin_url( $wp_customizer, 5 );
	_mayer_add_email_address( $wp_customizer, 6 );

	_mayer_display_gravatar( $wp_customizer, 7 );
	_mayer_display_footer_social_icons( $wp_customizer, 8 );

	_mayer_move_sidebar( $wp_customizer, 9 );

}

/*------------------------------------------------------------------*
 * Private Functions
/*------------------------------------------------------------------*/

/**
 * Adds a setting and a control for the author's email address.
 *
 * @param    object    $wp_customizer    A reference to the WordPress Theme Customizer
 * @since    1.1.0
 */
function _mayer_add_email_address( $wp_customizer, $priority ) {


	$wp_customizer->add_setting(
		'mayer_email_address',
		array(
			'default'           => '',
			'transport'         => 'postMessage'
		)
	);

	$wp_customizer->add_control(
		'mayer_email_address',
		array(
			'section'  =>  'mayer_theme_options',
			'label'    => __( 'Email Address', 'mayer' ),
			'type'     => 'text',
			'priority' => $priority
		)
	);


}

/**
 * Adds a setting and a control for the Twitter username.
 *
 * @param    object    $wp_customizer    A reference to the WordPress Theme Customizer
 * @since    1.0.0
 */
function _mayer_add_twitter_username( $wp_customizer, $priority ) {


	$wp_customizer->add_setting(
		'mayer_twitter_username',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_title_with_dashes'
		)
	);

	$wp_customizer->add_control(
		'mayer_twitter_username',
		array(
			'section'  =>  'mayer_theme_options',
			'label'    => __( 'Twitter Username (without "@")', 'mayer' ),
			'type'     => 'text',
			'priority' => $priority
		)
	);


}

/**
 * Adds a setting and a control for the Facebook username.
 *
 * @param    object    $wp_customizer    A reference to the WordPress Theme Customizer
 * @since    1.0.0
 */
function _mayer_add_facebook_url( $wp_customizer, $priority ) {

	$wp_customizer->add_setting(
		'mayer_facebook_url',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customizer->add_control(
		'mayer_facebook_url',
		array(
			'section'  =>  'mayer_theme_options',
			'label'    => __( 'Facebook URL', 'mayer' ),
			'type'     => 'text',
			'priority' => $priority
		)
	);


}

/**
 * Adds a setting and a control for the Pinterest URL
 *
 * @param    object    $wp_customizer    A reference to the WordPress Theme Customizer
 * @since    1.0.0
 */
function _mayer_add_pinterest_url( $wp_customizer, $priority ) {

	$wp_customizer->add_setting(
		'mayer_pinterest_url',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customizer->add_control(
		'mayer_pinterest_url',
		array(
			'section'  =>  'mayer_theme_options',
			'label'    => __( 'Pinterest URL', 'mayer' ),
			'type'     => 'text',
			'priority' => $priority
		)
	);

}

/**
 * Adds a setting and a control for the Google+ username.
 *
 * @param    object    $wp_customizer    A reference to the WordPress Theme Customizer
 * @since    1.0.0
 */
function _mayer_add_googleplus_url( $wp_customizer, $priority ) {

	$wp_customizer->add_setting(
		'mayer_googleplus_url',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customizer->add_control(
		'mayer_googleplus_url',
		array(
			'section'  =>  'mayer_theme_options',
			'label'    => __( 'Google+ URL', 'mayer' ),
			'type'     => 'text',
			'priority' => $priority
		)
	);

}

/**
 * Adds a setting and a control for the LinkedIn URL.
 *
 * @param    object    $wp_customizer    A reference to the WordPress Theme Customizer
 * @since    1.8.0
 */
function _mayer_add_linkedin_url( $wp_customizer, $priority ) {

	$wp_customizer->add_setting(
		'mayer_linkedin_url',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customizer->add_control(
		'mayer_linkedin_url',
		array(
			'section'  =>  'mayer_theme_options',
			'label'    => __( 'LinkedIn URL', 'mayer' ),
			'type'     => 'text',
			'priority' => $priority
		)
	);

}

/**
 * Changes the location of the sidebar on the blog
 *
 * @param    object    $wp_customizer    A reference to the WordPress Theme Customizer
 * @param    int       $prioritity       Where this option falls in the Customizer
 * @since    1.5.0
 */
function _mayer_move_sidebar( $wp_customizer, $priority ) {


	$wp_customizer->add_setting(
		'mayer_has_left_sidebar',
		array(
			'default'           => '',
			'transport'         => 'refresh'
		)
	);

	$wp_customizer->add_control(
		'mayer_has_left_sidebar',
		array(
			'section'  =>  'mayer_theme_options',
			'label'    => __( 'Place the Sidebar on the Left?', 'mayer' ),
			'type'     => 'checkbox',
			'priority' => $priority
		)
	);


}

/**
 * Toggles the display of the gravatar image in the header.
 *
 * @param    object    $wp_customizer    A reference to the WordPress Theme Customizer
 * @since    1.5.0
 */
function _mayer_display_gravatar( $wp_customizer, $priority ) {

	$wp_customizer->add_setting(
		'mayer_display_gravatar',
		array(
			'default'           => 'checked',
			'transport'         => 'postMessage'
		)
	);

	$wp_customizer->add_control(
		'mayer_display_gravatar',
		array(
			'section'  =>  'mayer_theme_options',
			'label'    => __( 'Display Gravatar in Header?', 'mayer' ),
			'type'     => 'checkbox',
			'priority' => $priority
		)
	);


}

/**
 * Toggles the display of the social icons in the footer.
 *
 * @param    object    $wp_customizer    A reference to the WordPress Theme Customizer
 * @since    1.5.0
 */
function _mayer_display_footer_social_icons( $wp_customizer, $priority ) {

	$wp_customizer->add_setting(
		'mayer_display_footer_social_icons',
		array(
			'default'           => '',
			'transport'         => 'refresh'
		)
	);

	$wp_customizer->add_control(
		'mayer_display_footer_social_icons',
		array(
			'section'  =>  'mayer_theme_options',
			'label'    => __( 'Display Social Icons in the Footer?', 'mayer' ),
			'type'     => 'checkbox',
			'priority' => $priority
		)
	);


}