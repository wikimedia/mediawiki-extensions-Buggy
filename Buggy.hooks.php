<?php
/**
 * Hooks for Buggy extension
 *
 * @file
 * @ingroup Extensions
 */

class BuggyHooks {
	public static function onBeforePageDisplay( OutputPage  &$out, Skin &$skin ) {
		$queryValues = $out->getRequest()->getQueryValues();
		if ( isset( $queryValues['buggy'] ) ) {
			$buggy = $queryValues['buggy'];
			if ( !is_array( $buggy ) ) {
				$buggy = array( $buggy );
			}
			if ( in_array( 'css', $buggy ) ) {
				$out->addModules( array( 'ext.Buggy.css' ) );
			}
			if ( in_array( 'startup', $buggy ) ) {
				$out->addModules( array( 'ext.Buggy.startup' ) );
			}
			if ( in_array( 'setTimeout', $buggy ) ) {
				$out->addModules( array( 'ext.Buggy.setTimeout' ) );
			}
			if ( in_array( 'onready', $buggy ) ) {
				$out->addModules( array( 'ext.Buggy.onready' ) );
			}
			if ( in_array( 'click', $buggy ) ) {
				$out->addModules( array( 'ext.Buggy.click' ) );
			}
			if ( in_array( 'ajax', $buggy ) ) {
				$out->addModules( array( 'ext.Buggy.ajax' ) );
			}
			if ( in_array( 'misc-cb', $buggy ) ) {
				$out->addModules( array( 'ext.Buggy.misc-cb' ) );
			}
			if ( in_array( 'mwload', $buggy ) ) {
				$out->addModules( array( 'ext.Buggy.mwload' ) );
			}
		}
		return true;
	}
}
