/*jshint undef:false */
( function ( $ ) {
	$( '#firstHeading' ).click( function() { callANonExistentFunctionOnClick(); } ).click();
}( jQuery ) );
