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
namespace KocujIL\V12a\Classes\Project\Components\Backend\EditorVisualButtons;

// security
if ((! defined ( 'ABSPATH' )) || ((isset ( $_SERVER ['SCRIPT_FILENAME'] )) && (basename ( $_SERVER ['SCRIPT_FILENAME'] ) === basename ( __FILE__ )))) {
	header ( 'HTTP/1.1 404 Not Found' );
	die ();
}

/**
 * Visual editor buttons (component initialization) class
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
				\KocujIL\V12a\Enums\Project\Components\Backend\EditorVisualButtons\ExceptionCode::BUTTON_ID_EXISTS => 'Button identifier already exists',
				\KocujIL\V12a\Enums\Project\Components\Backend\EditorVisualButtons\ExceptionCode::BUTTON_ID_DOES_NOT_EXIST => 'Button identifier does not exist' 
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
		$this->getComponent ( 'actions-filters-helper' )->addFilterWhenNeeded ( 'mce_external_plugins', \KocujIL\V12a\Enums\ProjectCategory::BACKEND, 'editor-visual-buttons', '', 'filterMceExternalPlugins', \KocujIL\V12a\Classes\Helper::getInstance ()->calculateMaxPriority ( 'mce_external_plugins' ) );
		$this->getComponent ( 'actions-filters-helper' )->addFilterWhenNeeded ( 'mce_external_languages', \KocujIL\V12a\Enums\ProjectCategory::BACKEND, 'editor-visual-buttons', '', 'filterMceExternalLanguages', \KocujIL\V12a\Classes\Helper::getInstance ()->calculateMaxPriority ( 'mce_external_languages' ) );
		$this->getComponent ( 'actions-filters-helper' )->addFilterWhenNeeded ( 'mce_buttons', \KocujIL\V12a\Enums\ProjectCategory::BACKEND, 'editor-visual-buttons', '', 'filterMceButtons', \KocujIL\V12a\Classes\Helper::getInstance ()->calculateMaxPriority ( 'mce_buttons' ) );
	}
}
