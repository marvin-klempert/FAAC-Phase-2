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
namespace KocujIL\V12a\Classes\Project\Components\Backend\SettingsHelp;

// security
if ((! defined ( 'ABSPATH' )) || ((isset ( $_SERVER ['SCRIPT_FILENAME'] )) && (basename ( $_SERVER ['SCRIPT_FILENAME'] ) === basename ( __FILE__ )))) {
	header ( 'HTTP/1.1 404 Not Found' );
	die ();
}

/**
 * Settings help (component initialization) class
 *
 * @access public
 */
class Init extends \KocujIL\V12a\Classes\ComponentInitObject {
	
	/**
	 * Required components
	 *
	 * @access protected
	 * @var array
	 */
	protected $requiredComponents = array (
			'' => array (
					\KocujIL\V12a\Enums\ProjectCategory::BACKEND => array (
							'settings-menu' 
					) 
			) 
	);
	
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
				\KocujIL\V12a\Enums\Project\Components\Backend\SettingsHelp\ExceptionCode::HELP_ID_EXISTS => 'Help identifier for the selected settings menu already exists',
				\KocujIL\V12a\Enums\Project\Components\Backend\SettingsHelp\ExceptionCode::HELP_ID_DOES_NOT_EXIST => 'Help identifier does not exist',
				\KocujIL\V12a\Enums\Project\Components\Backend\SettingsHelp\ExceptionCode::SETTINGS_MENU_ID_DOES_NOT_EXIST => 'Settings menu identifier does not exist' 
		);
	}
}
