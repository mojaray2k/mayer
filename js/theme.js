/**
 * If the sidebar is in the large desktop view, set its background color.
 *
 * @param      $        A reference to the jQuery function
 * @package    Mayer/js
 * @since      1.1.0
 */
function setSidebar( $, viaCustomizer ) {
	'use strict';

	var height;
	if ( ( window.location !== window.parent.location ) || ( 992 < $( '#primary-wrapper' ).width() && $( '#sidebar' ).height() <= $( '#main' ).height() ) ) {

		height = ( undefined === viaCustomizer ) ? $( '#main' ).height() : $( '#main' ).height() + 100;

		$( '#sidebar' )
			.height( height );

	} else if ( $('#sidebar' ).height() > $( '#main' ).height() ) {

		$( '#sidebar' )
			.height( 'auto' );

	} else {

		$( '#sidebar' )
			.height( 'auto' );

	}

}

/**
 * Applies the necessary elements and class names to elements whenever the
 * page loads.
 *
 * @package    Mayer/js
 * @since      1.0.0
 */
(function($) {
	'use strict';

	var $stickyWrapper, $stickyBanner;

	/**
	 * If a sticky post exists, then this applies a ribbon to the sticky post
	 */
	$(function() {

		if ( 'rtl' === $( 'html' ).attr( 'dir' ) ) {
			return;
		}

		if ( 0 < $( '.sticky' ).length ) {

			$stickyWrapper = $( '<div />' ).addClass( 'sticky-wrapper sticky-wrapper' );
			$stickyBanner = $( '<div />' )
								.addClass( 'sticky-ribbon' )
								.text( 'Sticky' );
			$stickyWrapper.append( $stickyBanner );

			$( '.sticky' ).append( $stickyWrapper );

		}

		/* Checks to see if the social icons are being displayed in the footer.
		 * If so, then adjusts the padding of its container.
		 */
		if ( 0 < $( '#social-icons-footer' ).length ) {

			$( '#social-icons-footer' )
				.parent()
				.css( 'padding-top', '20px' );

		}

		/* For comments, if there are code blocks that exceed the width of their
		 * parent container, then set their display to block.
		 */
		$( '.response-text p code' ).each( function() {

			if ( $( '.response-text' ).parent().width() < $( this ).width() ) {
				$( this ).css( 'display', 'block' );
			}

		});

		$( 'body' ).fitVids();

		/* This sets the sidebar's height equal to that of the main container's.
		 * Note that the scroll implementation is a @TODO until something more
		 * elegant comes along. The main reason for this is because oEmbed's
		 * cause a calculation to be wrong until they've loaded.
		 */
		$( window ).resize(function() {

			if ( ( window.location === window.parent.location ) ) {
				setSidebar( $ );
			}

		}).scroll(function() {

			if ( ( window.location === window.parent.location ) ) {
				setSidebar( $ );
			}

		}).load(function() {

			if ( ( window.location === window.parent.location ) ) {
				setSidebar( $, false );
			}

		});

	});

	/* If the site is being viewed via the Theme Customizer,
	 * we need to adjust the sidebar to accomodate for the 3.9 widget
	 * customizer.
	 */
	$( window ).load( function() {
		setSidebar( $ );
	});

})( jQuery );