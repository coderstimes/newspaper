/**
 * Customizer Live Preview
 *
 * Reloads changes on Theme Customizer Preview asynchronously for better usability
 *
 * @package Ctpress
 */

( function( $ ) {

	/*menu search box*/
	wp.customize( 'ctpress[menu_search]', function( values ) {	
		values.bind( function( value ) {
			if ( value ) {
				$(".navbar .attr-nav").addClass("d-none");
			} else {
				$(".navbar .attr-nav").removeClass("d-none");
			}
		} );
	} );

	/*menu search box*/
	wp.customize( 'ctpress[menu_bg_color]', function( value ) {	
		value.bind( function( res ) {
			if ( res ) {
				$("nav.navbar.bootsnav, .attr-nav .search_btn").css('background-color',res);
			} 
		} );
	} );

	/*menu search box*/
	wp.customize( 'ctpress[menu_font_color]', function( value ) {	
		value.bind( function( res ) {
			if ( res ) {
				$("nav.navbar.bootsnav ul.nav>li>a, .attr-nav .search_btn").css('color',res);
			} 
		} );
	} );



	// Credit Link checkbox.
	wp.customize( 'ctpress[credit_link]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'credit-link-hidden' );
			} else {
				$( 'body' ).removeClass( 'credit-link-hidden' );
			}
		} );
	} );

} )( jQuery );
