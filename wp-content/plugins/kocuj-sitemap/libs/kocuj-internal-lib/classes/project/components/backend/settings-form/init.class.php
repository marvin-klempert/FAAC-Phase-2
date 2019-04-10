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
namespace KocujIL\V12a\Classes\Project\Components\Backend\SettingsForm;

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
	 * Required components
	 *
	 * @access protected
	 * @var array
	 */
	protected $requiredComponents = array (
			'' => array (
					\KocujIL\V12a\Enums\ProjectCategory::ALL => array (
							'options' 
					),
					\KocujIL\V12a\Enums\ProjectCategory::BACKEND => array (
							'message',
							'settings-fields',
							'settings-menu' 
					) 
			) 
	);
	
	/**
	 * Allow actions and filters in "customizer" (true) or not (false)
	 *
	 * @access protected
	 * @var bool
	 */
	protected $allowActionsAndFiltersInCustomizer = false;
	
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
				\KocujIL\V12a\Enums\Project\Components\Backend\SettingsForm\ExceptionCode::CONTROLLER_ID_DOES_NOT_EXIST => 'Controller identifier does not exist',
				\KocujIL\V12a\Enums\Project\Components\Backend\SettingsForm\ExceptionCode::LIST_CONTROLLER_ID_DOES_NOT_EXIST => 'Elements list controller identifier does not exist',
				\KocujIL\V12a\Enums\Project\Components\Backend\SettingsForm\ExceptionCode::FORM_ID_EXISTS => 'Form identifier already exists',
				\KocujIL\V12a\Enums\Project\Components\Backend\SettingsForm\ExceptionCode::FORM_ID_DOES_NOT_EXIST => 'Form identifier does not exist',
				\KocujIL\V12a\Enums\Project\Components\Backend\SettingsForm\ExceptionCode::TAB_ID_EXISTS => 'Tab identifier already exists',
				\KocujIL\V12a\Enums\Project\Components\Backend\SettingsForm\ExceptionCode::TAB_ID_DOES_NOT_EXIST => 'Tab identifier does not exist',
				\KocujIL\V12a\Enums\Project\Components\Backend\SettingsForm\ExceptionCode::CANNOT_USE_ARRAY_OPTION_IN_WIDGET => 'Cannot use an array option in widget settings',
				\KocujIL\V12a\Enums\Project\Components\Backend\SettingsForm\ExceptionCode::WRONG_TABS_COUNT_IN_WIDGET => 'Wrong tabs count for widget settings' 
		);
	}
	
	/**
	 * Initialize actions and filters
	 *
	 * @access public
	 * @return void
	 */
	public function actionsAndFilters() {
		// add filters
		$this->getComponent ( 'actions-filters-helper' )->addFilterWhenNeeded ( 'set-screen-option', \KocujIL\V12a\Enums\ProjectCategory::BACKEND, 'settings-form', '', 'filterSetScreenOption', 10, 3 );
		// add actions
		$this->getComponent ( 'actions-filters-helper' )->addActionWhenNeeded ( 'current_screen', \KocujIL\V12a\Enums\ProjectCategory::BACKEND, 'settings-form', '', 'actionAddFields', 10000 );
		$this->getComponent ( 'actions-filters-helper' )->addActionWhenNeeded ( 'current_screen', \KocujIL\V12a\Enums\ProjectCategory::BACKEND, 'settings-form', '', 'actionController', 999 );
		$this->getComponent ( 'actions-filters-helper' )->addActionWhenNeeded ( 'current_screen', \KocujIL\V12a\Enums\ProjectCategory::BACKEND, 'settings-form', '', 'actionFormHeader', 999 );
		$this->getComponent ( 'actions-filters-helper' )->addActionWhenNeeded ( 'admin_print_footer_scripts', \KocujIL\V12a\Enums\ProjectCategory::BACKEND, 'settings-form', '', 'actionPrintFooterScripts', \KocujIL\V12a\Classes\Helper::getInstance ()->calculateMaxPriority ( 'admin_print_footer_scripts' ) );
	}
}
