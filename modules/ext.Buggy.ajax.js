/*jshint undef:false */
( function ( $ ) {
	$.get( '/wiki/Main_Page', { success: function() { callANonExistentFunctionOnAjaxSuccess(); } } );
}( jQuery ) );
