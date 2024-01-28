<?php
/**
 * Hooks for Buggy extension
 *
 * @file
 * @ingroup Extensions
 */

class BuggyHooks {
	/**
	 * @param OutputPage &$out
	 * @param Skin &$skin
	 * @return bool
	 */
	public static function onBeforePageDisplay( OutputPage &$out, Skin &$skin ) {
		static $fired = false;
		if ( $fired ) {
			// Only fire once per request
			return true;
		}
		$fired = true;

		$queryValues = $out->getRequest()->getQueryValues();
		if ( isset( $queryValues['buggy'] ) ) {
			$buggy = $queryValues['buggy'];
			if ( !is_array( $buggy ) ) {
				$buggy = [ $buggy ];
			}

			// PHP errors
			foreach ( $buggy as $error ) {
				switch ( $error ) {
					case 'php-exception':
						throw new Exception( 'Buggy test exception', 123 );
					case 'php-mwexception':
						throw new MWException( 'Buggy test exception', 123 );
					case 'missing-class':
						new Buggy_NoSuchClass();
					case 'incompatible-class':
						require 'incompatible_class.php';
					case 'php-error':
						require 'nosuchfile.php';
						break;
					case 'php-warning':
						foreach ( null as $_ ) {

						}
						break;
					case 'php-notice':
						$_ = $doesNotExist;
						break;
					case 'sql':
						$dbr = wfGetDB( DB_REPLICA );
						// phpcs:ignore MediaWiki.Usage.DbrQueryUsage.DbrQueryFound
						$dbr->query( 'THIS IS AN ERROR', __METHOD__ );
				}
			}

			// JS/asset errors
			$modules = [
				'css' => 'ext.Buggy.css',
				'startup' => 'ext.Buggy.startup',
				'setTimeout' => 'ext.Buggy.setTimeout',
				'onready' => 'ext.Buggy.onready',
				'click' => 'ext.Buggy.click',
				'ajax' => 'ext.Buggy.ajax',
				'misc-cb' => 'ext.Buggy.misc-cb',
				'mwload' => 'ext.Buggy.mwload',
				'logError' => 'ext.Buggy.logError',
			];
			foreach ( $modules as $keyword => $module ) {
				if ( in_array( $keyword, $buggy ) ) {
					$out->addModules( [ $module ] );
				}
			}
		}
		return true;
	}
}
