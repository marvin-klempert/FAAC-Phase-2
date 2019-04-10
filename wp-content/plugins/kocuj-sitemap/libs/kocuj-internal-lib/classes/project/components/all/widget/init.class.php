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
namespace KocujIL\V12a\Classes\Project\Components\All\Widget;

// security
if ((! defined ( 'ABSPATH' )) || ((isset ( $_SERVER ['SCRIPT_FILENAME'] )) && (basename ( $_SERVER ['SCRIPT_FILENAME'] ) === basename ( __FILE__ )))) {
	header ( 'HTTP/1.1 404 Not Found' );
	die ();
}

/**
 * Widget (component initialization) class
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
							'settings-form' 
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
				\KocujIL\V12a\Enums\Project\Components\All\Widget\ExceptionCode::WIDGET_EXISTS => 'Widget already exists',
				\KocujIL\V12a\Enums\Project\Components\All\Widget\ExceptionCode::WIDGET_DOES_NOT_EXIST => 'Widget does not exist',
				\KocujIL\V12a\Enums\Project\Components\All\Widget\ExceptionCode::CLASS_DOES_NOT_EXIST => 'Class does not exist',
				\KocujIL\V12a\Enums\Project\Components\All\Widget\ExceptionCode::WRONG_CLASS_PARENT => 'Wrong class parent' 
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
		$this->getComponent ( 'actions-filters-helper' )->addActionWhenNeeded ( 'widgets_init', \KocujIL\V12a\Enums\ProjectCategory::ALL, 'widget', '', 'actionWidgetsInit', 1 );
	}
}
