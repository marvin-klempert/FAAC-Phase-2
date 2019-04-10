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
namespace KocujPlLib\V12a\Classes\Project\Components\Backend\PageAboutAddThanks;

// set namespaces aliases
use KocujIL\V12a as KocujIL;

// security
if ((! defined ( 'ABSPATH' )) || ((isset ( $_SERVER ['SCRIPT_FILENAME'] )) && (basename ( $_SERVER ['SCRIPT_FILENAME'] ) === basename ( __FILE__ )))) {
	header ( 'HTTP/1.1 404 Not Found' );
	die ();
}

/**
 * Adding thanks from page about (component initialization) class
 *
 * @access public
 */
class Init extends KocujIL\Classes\ComponentInitObject {
	
	/**
	 * Required components
	 *
	 * @access protected
	 * @var array
	 */
	protected $requiredComponents = array (
			'' => array (
					KocujIL\Enums\ProjectCategory::BACKEND => array (
							'add-thanks' 
					) 
			),
			'KocujIL' => array (
					KocujIL\Enums\ProjectCategory::ALL => array (
							'window' 
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
		if (((! KocujIL\Classes\Helper::getInstance ()->checkUserIPLocal ()) || (! KocujIL\Classes\Helper::getInstance ()->checkServerIPLocal ())) && ((current_user_can ( 'manage_network_plugins' )) || (current_user_can ( 'activate_plugins' )) || (current_user_can ( 'install_plugins' )))) {
			$this->getComponent ( 'actions-filters-helper' )->addActionWhenNeeded ( $this->getProjectObj ()->getProjectKocujILObj ()->get ( 'project-helper' )->getPrefix () . '__after_page_about', KocujIL\Enums\ProjectCategory::BACKEND, 'page-about-add-thanks', '', 'actionAfterPageAbout' );
			$this->getComponent ( 'actions-filters-helper' )->addActionWhenNeeded ( 'admin_print_footer_scripts', KocujIL\Enums\ProjectCategory::BACKEND, 'page-about-add-thanks', '', 'actionPrintFooterScripts', KocujIL\Classes\Helper::getInstance ()->calculateMaxPriority ( 'admin_print_footer_scripts' ) );
		}
	}
}
