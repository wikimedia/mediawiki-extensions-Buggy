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

			if ( in_array( 'php-exception', $buggy ) ) {
				throw new Exception( 'Buggy test exception', 123 );
			}
			if ( in_array( 'php-mwexception', $buggy ) ) {
				throw new MWException( 'Buggy test exception', 123 );
			}

			$modules = array(
				'css' => 'ext.Buggy.css',
				'startup' => 'ext.Buggy.startup',
				'setTimeout' => 'ext.Buggy.setTimeout',
				'onready' => 'ext.Buggy.onready',
				'click' => 'ext.Buggy.click',
				'ajax' => 'ext.Buggy.ajax',
				'misc-cb' => 'ext.Buggy.misc-cb',
				'mwload' => 'ext.Buggy.mwload',
				'logError' => 'ext.Buggy.logError',
			);

			foreach ( $modules as $keyword => $module ) {
				if ( in_array( $keyword, $buggy ) ) {
					$out->addModules( array( $module ) );
				}
			}
		}
		return true;
	}
}
