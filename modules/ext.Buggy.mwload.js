( function () {
	mw.loader.using( 'ext.Buggy.mwload', () => {
		callANonExistentFunctionOnMwLoadSuccess();
	} );
}() );
