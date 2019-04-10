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
namespace KocujIL\V12a\Classes\Project\Components\Core\Meta;

// security
if ((! defined ( 'ABSPATH' )) || ((isset ( $_SERVER ['SCRIPT_FILENAME'] )) && (basename ( $_SERVER ['SCRIPT_FILENAME'] ) === basename ( __FILE__ )))) {
	header ( 'HTTP/1.1 404 Not Found' );
	die ();
}

/**
 * Meta class
 *
 * @access public
 */
class Component extends \KocujIL\V12a\Classes\ComponentObject {
	
	/**
	 * Meta data
	 *
	 * @access private
	 * @var array
	 */
	private $data = array ();
	
	/**
	 * Clear meta data (true) or not (false)
	 *
	 * @access private
	 * @var bool
	 */
	private $clear = false;
	
	/**
	 * Constructor
	 *
	 * @access public
	 * @param object $projectObj
	 *        	\KocujIL\V12a\Classes\Project object for current project
	 * @return void
	 */
	public function __construct($projectObj) {
		// execute parent constructor
		parent::__construct ( $projectObj );
		// get meta data
		$types = $this->getMetaTypes ();
		foreach ( $types as $type ) {
			$this->data [$type] = array ();
			$value = \KocujIL\V12a\Classes\DbDataHelper::getInstance ()->getOption ( $this->getName ( $type ), false, $this->changeMetaTypeToArea ( $type ) );
			if ($value !== false) {
				$this->data [$type] = maybe_unserialize ( $value );
			}
		}
	}
	
	/**
	 * Destructor
	 *
	 * @access public
	 * @return void
	 */
	public function __destruct() {
		// update or clear meta data
		$types = $this->getMetaTypes ();
		foreach ( $types as $type ) {
			if ((isset ( $this->clear [$type] )) && ($this->clear [$type])) {
				$this->forceRealClearDataNow ( $type );
			} else {
				$this->forceRealUpdateNow ( $type );
			}
		}
	}
	
	/**
	 * Get list of meta types
	 *
	 * @access private
	 * @param string $name
	 *        	Meta name
	 * @return array Meta types list
	 */
	private function getMetaTypes() {
		// exit
		return array (
				\KocujIL\V12a\Enums\Project\Components\Core\Meta\Type::AUTO,
				\KocujIL\V12a\Enums\Project\Components\Core\Meta\Type::SITE 
		);
	}
	
	/**
	 * Change meta type to area
	 *
	 * @access private
	 * @param int $type
	 *        	Meta type; must be one of the following constants from \KocujIL\V12a\Enums\Project\Components\Core\Meta\Type: AUTO (for automatic meta type) or SITE (for site meta type)
	 * @return int Area
	 */
	private function changeMetaTypeToArea($type) {
		// initialize
		$types = array (
				\KocujIL\V12a\Enums\Project\Components\Core\Meta\Type::AUTO => \KocujIL\V12a\Enums\Area::AUTO,
				\KocujIL\V12a\Enums\Project\Components\Core\Meta\Type::SITE => \KocujIL\V12a\Enums\Area::SITE 
		);
		// exit
		return $types [$type];
	}
	
	/**
	 * Get meta option name
	 *
	 * @access public
	 * @param int $type
	 *        	Meta type; must be one of the following constants from \KocujIL\V12a\Enums\Project\Components\Core\Meta\Type: AUTO (for automatic meta type) or SITE (for site meta type) - default: \KocujIL\V12a\Enums\Project\Components\Core\Meta\Type::AUTO
	 * @return string Meta option name
	 */
	public function getName($type = \KocujIL\V12a\Enums\Project\Components\Core\Meta\Type::AUTO) {
		// exit
		return $this->getProjectObj ()->getMainSettingInternalName () . '__' . ($type === \KocujIL\V12a\Enums\Project\Components\Core\Meta\Type::AUTO ? 'meta' : 'meta_site');
	}
	
	/**
	 * Add or update meta
	 *
	 * @access public
	 * @param string $name
	 *        	Meta name
	 * @param array|bool|float|int|string $value
	 *        	Meta value
	 * @param int $type
	 *        	Meta type; must be one of the following constants from \KocujIL\V12a\Enums\Project\Components\Core\Meta\Type: AUTO (for automatic meta type) or SITE (for site meta type) - default: \KocujIL\V12a\Enums\Project\Components\Core\Meta\Type::AUTO
	 * @return void
	 */
	public function addOrUpdate($name, $value, $type = \KocujIL\V12a\Enums\Project\Components\Core\Meta\Type::AUTO) {
		// set meta to not clear
		$this->clear [$type] = false;
		// add or update meta
		$this->data [$type] [$name] = $value;
	}
	
	/**
	 * Delete meta
	 *
	 * @access public
	 * @param string $name
	 *        	Meta name
	 * @param int $type
	 *        	Meta type; must be one of the following constants from \KocujIL\V12a\Enums\Project\Components\Core\Meta\Type: AUTO (for automatic meta type) or SITE (for site meta type) - default: \KocujIL\V12a\Enums\Project\Components\Core\Meta\Type::AUTO
	 * @return void
	 */
	public function delete($name, $type = \KocujIL\V12a\Enums\Project\Components\Core\Meta\Type::AUTO) {
		// delete meta
		if (isset ( $this->data [$type] [$name] )) {
			unset ( $this->data [$type] [$name] );
		}
	}
	
	/**
	 * Get meta value
	 *
	 * @access public
	 * @param string $name
	 *        	Meta name
	 * @param array|bool|float|int|string $defaultValue
	 *        	Default meta value - default: false
	 * @param int $type
	 *        	Meta type; must be one of the following constants from \KocujIL\V12a\Enums\Project\Components\Core\Meta\Type: AUTO (for automatic meta type) or SITE (for site meta type) - default: \KocujIL\V12a\Enums\Project\Components\Core\Meta\Type::AUTO
	 * @return array|bool|float|int|string Meta value
	 */
	public function get($name, $defaultValue = false, $type = \KocujIL\V12a\Enums\Project\Components\Core\Meta\Type::AUTO) {
		// exit
		return (isset ( $this->data [$type] [$name] )) ? $this->data [$type] [$name] : $defaultValue;
	}
	
	/**
	 * Clear meta
	 *
	 * @access public
	 * @param int $type
	 *        	Meta type; must be one of the following constants from \KocujIL\V12a\Enums\Project\Components\Core\Meta\Type: AUTO (for automatic meta type) or SITE (for site meta type) - default: \KocujIL\V12a\Enums\Project\Components\Core\Meta\Type::AUTO
	 * @return void
	 */
	public function clear($type = \KocujIL\V12a\Enums\Project\Components\Core\Meta\Type::AUTO) {
		// set meta to clear
		$this->clear [$type] = true;
		// clear meta in memory
		$this->data [$type] = array ();
	}
	
	/**
	 * Force real update of the entire meta data now
	 *
	 * @access public
	 * @param int $type
	 *        	Meta type; must be one of the following constants from \KocujIL\V12a\Enums\Project\Components\Core\Meta\Type: AUTO (for automatic meta type) or SITE (for site meta type) - default: \KocujIL\V12a\Enums\Project\Components\Core\Meta\Type::AUTO
	 * @return void
	 */
	public function forceRealUpdateNow($type = \KocujIL\V12a\Enums\Project\Components\Core\Meta\Type::AUTO) {
		// update meta data
		\KocujIL\V12a\Classes\DbDataHelper::getInstance ()->addOrUpdateOption ( $this->getName ( $type ), $this->data [$type], false, $this->changeMetaTypeToArea ( $type ) );
	}
	
	/**
	 * Force real clear entire meta data now
	 *
	 * @access public
	 * @param int $type
	 *        	Meta type; must be one of the following constants from \KocujIL\V12a\Enums\Project\Components\Core\Meta\Type: AUTO (for automatic meta type) or SITE (for site meta type) - default: \KocujIL\V12a\Enums\Project\Components\Core\Meta\Type::AUTO
	 * @return void
	 */
	public function forceRealClearDataNow($type = \KocujIL\V12a\Enums\Project\Components\Core\Meta\Type::AUTO) {
		// clear meta data
		$this->clear ( $type );
		\KocujIL\V12a\Classes\DbDataHelper::getInstance ()->deleteOption ( $this->getName ( $type ), $this->changeMetaTypeToArea ( $type ) );
	}
}
