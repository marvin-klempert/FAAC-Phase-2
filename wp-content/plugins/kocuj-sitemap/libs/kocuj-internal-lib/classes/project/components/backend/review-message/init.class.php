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
namespace KocujIL\V12a\Classes\Project\Components\Backend\ReviewMessage;

// security
if ((! defined ( 'ABSPATH' )) || ((isset ( $_SERVER ['SCRIPT_FILENAME'] )) && (basename ( $_SERVER ['SCRIPT_FILENAME'] ) === basename ( __FILE__ )))) {
	header ( 'HTTP/1.1 404 Not Found' );
	die ();
}

/**
 * Review message (component initialization) class
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
							'installation-date',
							'message' 
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
	 * Initialize actions and filters
	 *
	 * @access public
	 * @return void
	 */
	public function actionsAndFilters() {
		// add actions
		if ((current_user_can ( 'manage_network' )) || (current_user_can ( 'manage_options' ))) {
			$this->getComponent ( 'actions-filters-helper' )->addActionWhenNeeded ( 'admin_head', \KocujIL\V12a\Enums\ProjectCategory::BACKEND, 'review-message', '', 'actionAdminHead', 1 );
			$this->getComponent ( 'actions-filters-helper' )->addActionWhenNeeded ( 'admin_print_footer_scripts', \KocujIL\V12a\Enums\ProjectCategory::BACKEND, 'review-message', '', 'actionPrintFooterScripts', \KocujIL\V12a\Classes\Helper::getInstance ()->calculateMaxPriority ( 'admin_print_footer_scripts' ) );
		}
	}
}
