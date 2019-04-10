<?php

/**
 * init.class.php
 *
 * @author Dominik Kocuj
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2 or later
 * @copyright Copyright (c) 2016-2018 kocuj.pl
 * @package kocuj_internal_lib
 */

// set namespace
namespace KocujIL\V12a\Classes\Project\Components\All\Options;

// security
if ((! defined ( 'ABSPATH' )) || ((isset ( $_SERVER ['SCRIPT_FILENAME'] )) && (basename ( $_SERVER ['SCRIPT_FILENAME'] ) === basename ( __FILE__ )))) {
	header ( 'HTTP/1.1 404 Not Found' );
	die ();
}

/**
 * Options (component initialization) class
 *
 * @access public
 */
class Init extends \KocujIL\V12a\Classes\ComponentInitObject {
	
	/**
	 * Constructor
	 *
	 * @access public
	 * @param object $projectObj
	 *        	\KocujIL\V12a\Classes\Project object for current project
	 * @return void
	 */
	public function __construct($projectObj) {
		// execute parent
		parent::__construct ( $projectObj );
		// set errors
		$this->errors = array (
				\KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::TYPE_ID_EXISTS => 'Options type identifier already exists',
				\KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::TYPE_ID_DOES_NOT_EXIST => 'Options type identifier does not exist',
				\KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::CONTAINER_ID_EXISTS => 'Options container identifier already exists',
				\KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::CONTAINER_ID_DOES_NOT_EXIST => 'Options container identifier does not exist',
				\KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::DEFINITION_ID_EXISTS => 'Option definition identifier already exists',
				\KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::DEFINITION_ID_DOES_NOT_EXIST => 'Option definition identifier does not exist',
				\KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::WRONG_CONTAINER_TYPE_FOR_THIS_METHOD => 'Wrong container type for use with this method',
				\KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::CANNOT_USE_ARRAY_OPTION_IN_WIDGET => 'Cannot use an array option in widget settings',
				\KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::CANNOT_USE_OPTION_AS_SEARCH_KEY => 'Cannot use option as search key' 
		);
	}
}
