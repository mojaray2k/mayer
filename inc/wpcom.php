<?php
/**
 * WordPress.com-specific functions and definitions.
 *
 * @package    Mayer/inc
 * @since      1.0.0
 */

global $themecolors;

/**
 * Set a default theme color array for WP.com.
 *
 * @global     array        $themecolors
 * @package    Mayer/inc
 * @since      1.0.0
 */
$themecolors = array(
        'bg'     => 'ffffff',
        'border' => 'f2f2f2',
        'text'   => '383838',
        'link'   => '56b4ce',
        'url'    => '56b4ce',
);

add_action( 'wp_enqueue_scripts', 'mayer_dequeue_fonts', 11 );
/**
 * Dequeue Google Fonts if Custom Fonts are being used instead.
 *
 * @package    Mayer/inc
 * @since      1.0.0
 */
function mayer_dequeue_fonts() {

	if ( class_exists( 'TypekitData' ) && class_exists( 'CustomDesign' ) && CustomDesign::is_upgrade_active() ) {

	    $custom_fonts = TypekitData::get( 'families' );

		if ( $custom_fonts && $custom_fonts['headings']['id'] ) {

			wp_dequeue_style( 'mayer-nunito' );
			wp_dequeue_style( 'mayer-muli' );
			wp_dequeue_style( 'mayer-source-sans-pro' );

	    }

		if ( $custom_fonts && $custom_fonts['body-text']['id'] ) {

			wp_dequeue_style( 'mayer-nunito' );
			wp_dequeue_style( 'mayer-muli' );
			wp_dequeue_style( 'mayer-source-sans-pro' );

		}

	}

}