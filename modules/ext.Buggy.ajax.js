( function ( $ ) {
	$.when( $.get( '/wiki/Main_Page' ), $.when( 1 ) ).done( () => {
		callANonExistentFunctionOnAjaxSuccess();
	} );
}( jQuery ) );
