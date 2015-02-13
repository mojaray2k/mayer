<?php

/*------------------------------------------------------------------*
 * Hooks
/*------------------------------------------------------------------*/

add_filter( 'wp_title', 'mayer_wp_title', 10, 2 );
/**
 * Provides a standard format for the page title depending on the view. This is
 * filtered so that plugins can provide alternative title formats.
 *
 * @param       string    $title    Default title text for current view.
 * @param       string    $sep      Optional separator.
 * @return      string              The filtered title.
 * @package     Mayer/inc
 * @since       1.0.0
 */
function mayer_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = sprintf( __( 'Page %s', 'mayer' ), max( $paged, $page ) ) . " $sep $title";
	}

	return $title;

}

add_action( 'the_content_more_link', 'mayer_add_more_link_class', 10, 2 );
/**
 * Creates a custom 'Read More' link by prepending and appending columns on either
 * side of the anchor to create a divider between the next post.
 *
 * @param       string    $link    The anchor for rendering the more tag
 * @return      string    $link    The text for the more tag
 * @package     Mayer/inc
 * @since       1.0.0
 */
function mayer_add_more_link_class( $link, $text ) {

	$html = '<div class="more-link-wrapper">';
		$html .= '<div class="divide col-lg-5 hidden-md hidden-sm hidden-xs"></div>';
		$html .= '<div class="col-lg-2 col-md-12">' . $link . '</div>';
		$html .= '<div class="divide col-lg-5 hidden-md hidden-sm hidden-xs"></div>';
	$html .= '</div>';

	return $html;

}

add_filter( 'post_class', 'mayer_add_post_class_to_single_post' );
/**
 * If the given post is a single post, then add a class to this post.
 *
 * @param       array       $classes    The array of classes being rendered on a single post element.
 * @return      array       $classes    The array of classes being rendered on a single post element.
 * @package     Mayer/inc
 * @since       1.0.0
 */
function mayer_add_post_class_to_single_post( $classes ) {

	if ( is_single() ) {
		array_push( $classes, 'single-post' );
	}

	return $classes;

}

add_filter( 'the_password_form', 'mayer_custom_password_form' );
/**
 * Customizes the post password protected form by updating the text and applying classes in order
 * to the elements from Bootstrap.
 *
 * @param       array    $form    The array of regular expressions and their replacements for the form elements.
 * @package     Mayer/inc
 * @since       1.0.0
 */
function mayer_custom_password_form( $form ) {

	$subs = array(
		'#' . __( '<p>This content is password protected. To view it please enter your password below:</p>', 'mayer' ) . '#' => __( '<p>To view this post, please enter your password:</p>', 'mayer' ),
		'#' . __( 'Password:', 'mayer' ) . '#' => '',
		'#' . __( '<input(.*?)type="password"(.*?) />', 'mayer' ) . '#' => __( '<input$1type="password"$2 class="form-control" placeholder="Password" />', 'mayer' ),
		'#' . __( '<input(.*?)type="submit"(.*?) />', 'mayer' ) . '#'   => __( '<input$1type="submit"$2 class="btn btn-default" />', 'mayer' )
	);

	echo preg_replace( array_keys( $subs ), array_values( $subs ), $form );

}

/*------------------------------------------------------------------*
 * Helper Functions
/*------------------------------------------------------------------*/

/**
 * Determines whether or not the current post is a paginated post.
 *
 * @return      boolean    True if the post is paginated; false, otherwise.
 * @package     Mayer/subpackage
 * @since       1.0.0
 */
function mayer_is_paginated_post() {

	global $multipage;
	return 0 !== $multipage;

}

/**
 * @param       int     $post_id             The ID of the post from which to return the number of comments.
 * @param       string  $type    optional    Defaults to 'comment' but will also accept any string that represents the comment types.
 * @return      int                          The number of comments and pings (based on the specified parameter) for the specified post.
 * @package     Mayer/inc
 * @since       1.0.0
 */
function mayer_post_has_comments( $post_id, $type = 'comment' ) {

	$comments = get_comments('status=approve&type=' . $type . '&post_id=' . $post_id );
	$comments = separate_comments( $comments );

	return 0 < count( $comments[ $type ] );

}

/**
 * @return      string    The year and optionally the month, if defined, to display in the date archives.
 * @package     Mayer/inc
 * @since       1.0.0
 */
function mayer_get_the_time() {

	// First, we'll grab the year
	$str_date = get_query_var( 'year' );

	// Then we'll check to see if the month number is defined
	if( 0 !== ( $month = get_query_var( 'monthnum' ) ) ) {

		// If so, we'll convert it to the name
		$month_name = get_the_date( 'F', $month );

		// Build the string up of the month name and the date
		$str_date =  $month_name . '&nbsp;' . $str_date;

	}

	return $str_date;

}

/**
 * Retrieves a default Gravatar image for the user. If one is not found, then it will
 * default to gravatar set in the Discussion settings.
 *
 * @package     Mayer/inc
 * @since       1.5.0
 */
function mayer_get_gravatar() {

	/* Initialize a default gravatar. If it's the Mystery Man, then
	 * set the value of $default equal to mm; otherwise, set it equal
	 * to an empty string.
	 */
    $default = get_option( 'avatar_default', 'mystery' );
    if ( 'mystery' == $default ) {
        $default = 'mm';
    } elseif ( 'gravatar_default' == $default ) {
        $default = '';
	}

	// Next, check to see if we're on an SSL connection. If so, use HTTPS; otherwise, use HTTP
    $protocol = ( is_ssl() ) ? 'https://secure.' : 'http://';

    // Build the URL that will retrieve the gravatar based on $default value and the $protocol
    $url = sprintf( '%1$sgravatar.com/avatar/%2$s/', $protocol, md5( get_bloginfo( 'admin_email' ) ) );
    $url = add_query_arg(
				array(
	        		's' => 140,
					'd' => urlencode( $default ),
				), $url
			);

	// Display the gravatar
    return '<img src="' . esc_url_raw( $url ) . '" alt="' . get_bloginfo( 'title' ) . '" height="140" width="140" />';

}

/**
 * Provides a default menu featuring the 'Home' link, if not other menu has been provided.
 *
 * @package     Mayer/inc
 * @since       1.0.0
 */
function mayer_default_menu() {

	$html = '<ul id="mayer-default-menu" class="nav nav-pills">';
		$html .= '<li class=" menu-item menu-item-type-post_type menu-item-object-page">';
			$html .= '<a href="' . esc_url( home_url() ) . '" title="' . __( 'Home', 'mayer' ) . '">';
				$html .= __( 'Home', 'mayer' );
			$html .= '</a>';
		$html .= '</li>';
	$html .= '</ul>';

	echo $html;

}

/**
 * Determines if the specified option value is a valid email or not. This is used to help
 * dictate the type of URL for the email address.
 *
 * @package    Mayer/inc
 * @since      1.8.0
 * @param      string    $value    The option value evaluate as an email address
 * @return     bool                True if the value is an email address; false, otherwise.
 */
function mayer_is_email_address( $value ) {
	return filter_var( $value, FILTER_VALIDATE_EMAIL );
}

/**
 * Determines if the layout options are set such that the sidebar is on the left
 * of the content or the right of the content.
 *
 * @package    Mayer/inc
 * @since      1.8.0
 * @return     bool    True if the sidebar should be on the left; otherwise, false.
 */
function mayer_has_left_sidebar() {
	return ( '1' == get_theme_mod( 'mayer_has_left_sidebar' ) );
}