/**
 * Manages the visibility of the social icons in the Theme Customizer.
 *
 * @param         object    $             A reference to the jQuery object
 * @param         string    sId           The ID of the element to toggle
 * @param         string    sControlId    The name of Theme Customizer control
 * @package       Mayer/js
 * @since         1.0.0
 */
function toggleSocialIconVisibility( $, sId, sControlId ) {
	'use strict';
	/*global wp*/

	// Hide all of the initial social networks unless they have an anchor value
	$( '#social-networks:lt(4)' ).each( function() {
		if ( '' === $( this).children( 'a' ).attr(' href' ) ) {
			$(this).addClass('hidden');
		}
	});

	// Toggle the visibility based on the string value of element
	wp.customize( sControlId, function( value ) {
		value.bind( function( to ) {

			if ( 0 < $.trim( to ).length ) {
				$( sId ).removeClass( 'hidden' );
			} else {
				$( sId ).addClass( 'hidden' );
			}

		});
	});

}

/**
 * Manages the visibility of the Gravatar in the Theme Customizer.
 *
 * @param         object    $             A reference to the jQuery object
 * @param         string    sId           The ID of the element to toggle
 * @param         string    sControlId    The name of Theme Customizer control
 * @package       Mayer/js
 * @since         1.5.0
 */
function toggleGravatarVisibility( $, sId, sControlId ) {
	'use strict';

	wp.customize( sControlId, function( value ) {
		value.bind( function( to ) {

			if ( true === to ) {
				$( sId ).removeClass( 'hidden' );
			} else {
				$( sId ).addClass( 'hidden' );
			}

		});
	});

}

/**
 * Manages the visibility of the Social Icons in the footer.
 *
 * @param         object    $             A reference to the jQuery object
 * @param         string    sId           The ID of the element to toggle
 * @param         string    sControlId    The name of Theme Customizer control
 * @package       Mayer/js
 * @since         1.5.0
 */
function toggleFooterSocialIcons( $, sId, sControlId ) {
	'use strict';

	wp.customize( sControlId, function( value ) {
		value.bind( function( to ) {

			if ( true === to ) {
				$( sId ).removeClass('hidden');
			} else {
				$( sId ).addClass('hidden');
			}

		});
	});

}

/*----------------------------------------------------------------------------*
 * Page Load Functionality
 *----------------------------------------------------------------------------*/

(function($) {
	'use strict';

	$(function() {

		toggleSocialIconVisibility( $, '#email-address', 'mayer_email_address' );
		toggleSocialIconVisibility( $, '#twitter', 'mayer_twitter_username' );
		toggleSocialIconVisibility( $, '#facebook', 'mayer_facebook_url' );
		toggleSocialIconVisibility( $, '#pinterest', 'mayer_pinterest_url' );
		toggleSocialIconVisibility( $, '#google-plus', 'mayer_googleplus_url' );
		toggleSocialIconVisibility( $, '#linkedin', 'mayer_linkedin_url' );

		toggleGravatarVisibility( $, '#avatar', 'mayer_display_gravatar' );
		toggleFooterSocialIcons( $, '#social-icons-wrapper', 'mayer_display_footer_social_icons' );

	});

})( jQuery );