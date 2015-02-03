( function ( $ ) {
	$( '#firstHeading' ).click( function() { callANonExistentFunctionOnClick(); } ).click();
}( jQuery ) );
