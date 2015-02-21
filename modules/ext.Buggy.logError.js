/*jshint undef:false  */
( function ( mw ) {
	try {
		callANonExistentFunctionForManualLogging();
	} catch ( e ) {
		mw.errorLogging.logError( e, { foo: 'bar' } );
	}
}( mediaWiki ) );
