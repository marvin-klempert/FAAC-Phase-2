<?php

/**
 * component.class.php
 *
 * @author Dominik Kocuj
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2 or later
 * @copyright Copyright (c) 2016-2018 kocuj.pl
 * @package kocuj_internal_lib\kocuj_pl_lib
 */

// set namespace
namespace KocujPlLib\V12a\Classes\Project\Components\Core\ProjectHelper;

// set namespaces aliases
use KocujIL\V12a as KocujIL;

// security
if ((! defined ( 'ABSPATH' )) || ((isset ( $_SERVER ['SCRIPT_FILENAME'] )) && (basename ( $_SERVER ['SCRIPT_FILENAME'] ) === basename ( __FILE__ )))) {
	header ( 'HTTP/1.1 404 Not Found' );
	die ();
}

/**
 * Project helper class
 *
 * @access public
 */
class Component extends KocujIL\Classes\Project\Components\Core\ProjectHelper\Component {
	
	/**
	 * Get prefix with project internal name for some names in library
	 *
	 * @access public
	 * @return string Prefix
	 */
	public function getPrefix() {
		// exit
		return \KocujPlLib\V12a\Classes\Helper::getInstance ()->getPrefix () . '_' . $this->getProjectObj ()->getProjectKocujILObj ()->getMainSettingInternalName ();
	}
}
