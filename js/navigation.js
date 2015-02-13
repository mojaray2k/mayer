/**
 * Manages the navigation menus for the dropdown menus of the theme.
 *
 * @package    Mayer/js
 * @since      1.0.0
 */
(function($) {
	"use strict";

	$(function() {

		var sUrl;

		/* For each of the dropdown menus, we'll override the default Bootstrap
		 * functionality by toggling the dropdown menus with the hover action.
		 *
		 * This allows users to also click on menu items to be taken to their
		 * pages.
		 */
		$( '.dropdown, .dropdown a' ).hover(function() {
			$(this).addClass( 'open' );
		}, function() {
			$(this).removeClass( 'open' );
		});

		$( '.dropdown a' ).click(function( evt ) {

			evt.preventDefault();

			sUrl = $(this).attr( 'href' );
			if ( '_blank' === $(this).attr( 'target' ) ) {
				window.open( sUrl );
			} else {
				window.location.href = sUrl;
			}

		});

		/* If the footer is also in the menu, then we remove all dropdown-menus and
		 * children as well as the carets to indicate that there are any dropdowns.
		 */
		$( '#footer-wrapper .nav-pills' )
			.children('.dropdown')
			.each(function() {

				$(this).removeClass( 'dropdown' );
				$(this).children( '.dropdown-menu' ).remove();

			});

		$('#footer-wrapper .caret').remove();

	});

})( jQuery );