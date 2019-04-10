<?php

/**
 * nonce-required.class.php
 *
 * @author Dominik Kocuj
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2 or later
 * @copyright Copyright (c) 2016-2018 kocuj.pl
 * @package kocuj_internal_lib
 */

// set namespace
namespace KocujIL\V12a\Enums\Project\Components\Backend\SettingsForm;

// security
if ((! defined ( 'ABSPATH' )) || ((isset ( $_SERVER ['SCRIPT_FILENAME'] )) && (basename ( $_SERVER ['SCRIPT_FILENAME'] ) === basename ( __FILE__ )))) {
	header ( 'HTTP/1.1 404 Not Found' );
	die ();
}

/**
 * Required nonce constants class
 *
 * @access public
 */
final class NonceRequired {
	
	/**
	 * Empty constructor for blocking of creating an instance of this class
	 *
	 * @access private
	 * @var void
	 */
	private function __construct() {
	}
	
	/**
	 * Nonce are not required
	 */
	const NO = 0;
	
	/**
	 * Nonce are required
	 */
	const YES = 1;
}
