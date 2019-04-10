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
namespace KocujIL\V12a\Classes\Project\Components\Backend\SettingsMenu;

// security
if ((! defined ( 'ABSPATH' )) || ((isset ( $_SERVER ['SCRIPT_FILENAME'] )) && (basename ( $_SERVER ['SCRIPT_FILENAME'] ) === basename ( __FILE__ )))) {
	header ( 'HTTP/1.1 404 Not Found' );
	die ();
}

/**
 * Settings menu (component initialization) class
 *
 * @access public
 */
class Init extends \KocujIL\V12a\Classes\ComponentInitObject {
	
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
				\KocujIL\V12a\Enums\Project\Components\Backend\SettingsMenu\ExceptionCode::SETTINGS_MENU_ID_EXISTS => 'Settings menu identifier already exists',
				\KocujIL\V12a\Enums\Project\Components\Backend\SettingsMenu\ExceptionCode::SETTINGS_MENU_ID_DOES_NOT_EXIST => 'Settings menu identifier does not exist',
				\KocujIL\V12a\Enums\Project\Components\Backend\SettingsMenu\ExceptionCode::SETTINGS_MENU_INCORRECTLY_PLACED => 'Settings menu incorrectly placed for this type of project' 
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
		$this->getComponent ( 'actions-filters-helper' )->addActionWhenNeeded ( (((is_network_admin ())) ? 'network_' : '') . 'admin_menu', \KocujIL\V12a\Enums\ProjectCategory::BACKEND, 'settings-menu', '', 'actionAdminMenu' );
		// add filters
		if ($this->getProjectObj ()->getMainSettingType () === \KocujIL\V12a\Enums\ProjectType::PLUGIN) {
			$this->getComponent ( 'actions-filters-helper' )->addFilterWhenNeeded ( (((is_network_admin ())) ? 'network_admin_' : '') . 'plugin_action_links', \KocujIL\V12a\Enums\ProjectCategory::BACKEND, 'settings-menu', '', 'filterPluginActionLinks', 10, 2 );
		}
	}
}
