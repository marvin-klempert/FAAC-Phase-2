<?php

/**
 * component.class.php
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
 * Widget class
 *
 * @access public
 */
class Component extends \KocujIL\V12a\Classes\ComponentObject {
	
	/**
	 * Widgets
	 *
	 * @access private
	 * @var array
	 */
	private $widgets = array ();
	
	/**
	 * Add widget
	 *
	 * @access public
	 * @param string $class
	 *        	Widget class name
	 * @return void
	 */
	public function addWidget($class) {
		// check if this widget class does not already exists
		if (in_array ( $class, $this->widgets )) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Widget\ExceptionCode::WIDGET_EXISTS, __FILE__, __LINE__, $class );
		}
		// add widget
		$this->widgets [] = $class;
	}
	
	/**
	 * Get widgets data
	 *
	 * @access public
	 * @return array Widgets data; each widget data contains widget class name
	 */
	public function getWidgets() {
		// exit
		return $this->widgets;
	}
	
	/**
	 * Check if widget exists
	 *
	 * @access public
	 * @param string $class
	 *        	Widget class name
	 * @return bool Widget exists (true) or not (false)
	 */
	public function checkWidget($class) {
		// exit
		return in_array ( $class, $this->widgets );
	}
	
	/**
	 * Remove widget
	 *
	 * @access public
	 * @param string $class
	 *        	Widget class name
	 * @return void
	 */
	public function removeWidget($class) {
		// check if this widget class exists
		if (! in_array ( $class, $this->widgets )) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Widget\ExceptionCode::WIDGET_DOES_NOT_EXIST, __FILE__, __LINE__, $class );
		}
		// remove widget
		$pos = array_search ( $class, $this->widgets );
		unset ( $this->widgets [$pos] );
	}
	
	/**
	 * Action for widgets initialization
	 *
	 * @access public
	 * @return void
	 */
	public function actionWidgetsInit() {
		// initialize widgets
		foreach ( $this->widgets as $className ) {
			// check if class exists
			if (! class_exists ( $className )) {
				throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Widget\ExceptionCode::CLASS_DOES_NOT_EXIST, __FILE__, __LINE__, $className );
			}
			// check if class is child of Widget class
			if (! is_subclass_of ( $className, '\\KocujIL\\V12a\\Classes\\Project\\Components\\All\\Widget\\Widget' )) {
				throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Widget\ExceptionCode::WRONG_CLASS_PARENT, __FILE__, __LINE__, $className );
			}
			// register widget
			register_widget ( $className );
		}
	}
}
