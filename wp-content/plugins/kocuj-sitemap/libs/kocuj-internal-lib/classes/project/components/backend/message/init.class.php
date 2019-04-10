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
namespace KocujIL\V12a\Classes\Project\Components\Backend\Message;

// security
if ((! defined ( 'ABSPATH' )) || ((isset ( $_SERVER ['SCRIPT_FILENAME'] )) && (basename ( $_SERVER ['SCRIPT_FILENAME'] ) === basename ( __FILE__ )))) {
	header ( 'HTTP/1.1 404 Not Found' );
	die ();
}

/**
 * Message (component initialization) class
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
							'js-ajax' 
					),
					\KocujIL\V12a\Enums\ProjectCategory::BACKEND => array (
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
				\KocujIL\V12a\Enums\Project\Components\Backend\Message\ExceptionCode::MESSAGE_ID_EXISTS => 'Message identifier already exists',
				\KocujIL\V12a\Enums\Project\Components\Backend\Message\ExceptionCode::MESSAGE_DOES_NOT_EXIST => 'Message does not exist' 
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
		$this->getComponent ( 'actions-filters-helper' )->addActionWhenNeeded ( 'admin_head', \KocujIL\V12a\Enums\ProjectCategory::BACKEND, 'message', '', 'actionAdminHead', 999 );
		$this->getComponent ( 'actions-filters-helper' )->addActionWhenNeeded ( 'admin_notices', \KocujIL\V12a\Enums\ProjectCategory::BACKEND, 'message', '', 'actionAdminNotices' );
		if (is_multisite ()) {
			$this->getComponent ( 'actions-filters-helper' )->addActionWhenNeeded ( 'network_admin_notices', \KocujIL\V12a\Enums\ProjectCategory::BACKEND, 'message', '', 'actionAdminNotices' );
		}
		$this->getComponent ( 'actions-filters-helper' )->addActionWhenNeeded ( 'admin_print_footer_scripts', \KocujIL\V12a\Enums\ProjectCategory::BACKEND, 'message', '', 'actionPrintFooterScripts', \KocujIL\V12a\Classes\Helper::getInstance ()->calculateMaxPriority ( 'admin_print_footer_scripts' ) );
		// add actions for AJAX
		$this->getComponent ( 'actions-filters-helper' )->addActionWhenNeeded ( 'wp_ajax_' . $this->getComponent ( 'project-helper' )->getPrefix () . '__message_close', \KocujIL\V12a\Enums\ProjectCategory::BACKEND, 'message', 'ajax', 'actionAjaxClose' );
	}
}
