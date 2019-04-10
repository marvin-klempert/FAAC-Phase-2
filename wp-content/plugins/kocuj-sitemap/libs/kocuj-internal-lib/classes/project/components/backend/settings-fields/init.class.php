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
namespace KocujIL\V12a\Classes\Project\Components\Backend\SettingsFields;

// security
if ((! defined ( 'ABSPATH' )) || ((isset ( $_SERVER ['SCRIPT_FILENAME'] )) && (basename ( $_SERVER ['SCRIPT_FILENAME'] ) === basename ( __FILE__ )))) {
	header ( 'HTTP/1.1 404 Not Found' );
	die ();
}

/**
 * Settings form (component initialization) class
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
				\KocujIL\V12a\Enums\Project\Components\Backend\SettingsFields\ExceptionCode::TYPE_ID_EXISTS => 'Field type identifier already exists',
				\KocujIL\V12a\Enums\Project\Components\Backend\SettingsFields\ExceptionCode::TYPE_ID_DOES_NOT_EXIST => 'Field type identifier does not exist',
				\KocujIL\V12a\Enums\Project\Components\Backend\SettingsFields\ExceptionCode::TYPE_ID_NOT_DECLARED_FOR_CURRENT_SITE => 'Field type has not been declared for current site',
				\KocujIL\V12a\Enums\Project\Components\Backend\SettingsFields\ExceptionCode::CANNOT_USE_TYPE_ID_IN_WIDGET => 'Cannot use this field type in widget settings',
				\KocujIL\V12a\Enums\Project\Components\Backend\SettingsFields\ExceptionCode::CANNOT_USE_ARRAY_OPTION_IN_WIDGET => 'Cannot use an array option in widget settings',
				\KocujIL\V12a\Enums\Project\Components\Backend\SettingsFields\ExceptionCode::NO_WIDGET_OBJECT => 'No widget object',
				\KocujIL\V12a\Enums\Project\Components\Backend\SettingsFields\ExceptionCode::WRONG_ACTION_FOR_METHOD => 'Wrong action for method' 
		);
	}
	
	/**
	 * Initialize actions and filters
	 *
	 * @access public
	 * @return void
	 */
	public function actionsAndFilters() {
		// add actions
		$this->getComponent ( 'actions-filters-helper' )->addActionWhenNeeded ( 'admin_enqueue_scripts', \KocujIL\V12a\Enums\ProjectCategory::BACKEND, 'settings-fields', '', 'actionFieldsHeaders', 0 );
	}
}
