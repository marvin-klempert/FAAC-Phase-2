<?php

/**
 * exception-code.class.php
 *
 * @author Dominik Kocuj
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2 or later
 * @copyright Copyright (c) 2016-2018 kocuj.pl
 * @package kocuj_internal_lib
 */

// set namespace
namespace KocujIL\V12a\Enums\Project\Components\Backend\EditorTextButtons;

// security
if ((! defined ( 'ABSPATH' )) || ((isset ( $_SERVER ['SCRIPT_FILENAME'] )) && (basename ( $_SERVER ['SCRIPT_FILENAME'] ) === basename ( __FILE__ )))) {
	header ( 'HTTP/1.1 404 Not Found' );
	die ();
}

/**
 * Exceptions codes constants class
 *
 * @access public
 */
final class ExceptionCode {
	
	/**
	 * Empty constructor for blocking of creating an instance of this class
	 *
	 * @access private
	 * @var void
	 */
	private function __construct() {
	}
	
	/**
	 * Error: Button identifier already exists
	 */
	const BUTTON_ID_EXISTS = 1;
	
	/**
	 * Error: Button identifier does not exist
	 */
	const BUTTON_ID_DOES_NOT_EXIST = 2;
}
