<?php

/**
 * lib-urls.class.php
 *
 * @author Dominik Kocuj
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2 or later
 * @copyright Copyright (c) 2016-2018 kocuj.pl
 * @package kocuj_internal_lib\kocuj_pl_lib
 */

// set namespace
namespace KocujPlLib\V12a\Classes;

// set namespaces aliases
use KocujIL\V12a as KocujIL;

// security
if ((! defined ( 'ABSPATH' )) || ((isset ( $_SERVER ['SCRIPT_FILENAME'] )) && (basename ( $_SERVER ['SCRIPT_FILENAME'] ) === basename ( __FILE__ )))) {
	header ( 'HTTP/1.1 404 Not Found' );
	die ();
}

/**
 * Library URL-s class
 *
 * @access public
 */
final class LibUrls extends KocujIL\Classes\LibUrls {
	
	/**
	 * Singleton instance
	 *
	 * @access private
	 * @var object
	 */
	private static $instance = NULL;
	
	/**
	 * Constructor
	 *
	 * @access protected
	 * @return void
	 */
	protected function __construct() {
		// set library directories
		$this->mainDir = realpath ( dirname ( __FILE__ ) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR );
		// execute parent constructor
		parent::__construct ();
	}
	
	/**
	 * Disable cloning of object
	 *
	 * @access private
	 * @return void
	 */
	private function __clone() {
	}
	
	/**
	 * Get singleton instance
	 *
	 * @access public
	 * @return object Singleton instance
	 */
	public static function getInstance() {
		// optionally create new instance
		if (! self::$instance) {
			self::$instance = new self ();
		}
		// exit
		return self::$instance;
	}
}
