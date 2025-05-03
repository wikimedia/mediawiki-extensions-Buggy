( function ( $ ) {
	$( '#firstHeading' ).on( 'click', () => {
		callANonExistentFunctionOnClick();
	} ).trigger( 'click' );
}( jQuery ) );
