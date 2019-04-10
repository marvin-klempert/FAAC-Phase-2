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
namespace KocujIL\V12a\Classes\Project\Components\All\Options;

// security
if ((! defined ( 'ABSPATH' )) || ((isset ( $_SERVER ['SCRIPT_FILENAME'] )) && (basename ( $_SERVER ['SCRIPT_FILENAME'] ) === basename ( __FILE__ )))) {
	header ( 'HTTP/1.1 404 Not Found' );
	die ();
}

/**
 * Options class
 *
 * @access public
 */
class Component extends \KocujIL\V12a\Classes\ComponentObject {
	
	/**
	 * Options types
	 *
	 * @access private
	 * @var array
	 */
	private $types = array ();
	
	/**
	 * Options containers
	 *
	 * @access private
	 * @var array
	 */
	private $containers = array ();
	
	/**
	 * Options definitions
	 *
	 * @access private
	 * @var array
	 */
	private $definitions = array ();
	
	/**
	 * Options
	 *
	 * @access private
	 * @var array
	 */
	private $options = array ();
	
	/**
	 * Flag for data set table creation now
	 *
	 * @access private
	 * @var bool
	 */
	private $dataSetTableCreatedNow = false;
	
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
		// add options types
		$this->addType ( 'text', NULL, NULL, \KocujIL\V12a\Enums\Project\Components\All\Options\TypeLengthSupport::YES );
		$this->addType ( 'integer', array (
				__CLASS__,
				'typeDefaultValueIntegerOrFloat' 
		), array (
				__CLASS__,
				'typeValidationInteger' 
		), \KocujIL\V12a\Enums\Project\Components\All\Options\TypeLengthSupport::YES, \KocujIL\V12a\Enums\Project\Components\All\Options\TypeFormat::NUMBER_INT );
		$this->addType ( 'float', array (
				__CLASS__,
				'typeDefaultValueIntegerOrFloat' 
		), array (
				__CLASS__,
				'typeValidationFloat' 
		), \KocujIL\V12a\Enums\Project\Components\All\Options\TypeLengthSupport::YES, \KocujIL\V12a\Enums\Project\Components\All\Options\TypeFormat::NUMBER_FLOAT );
		$this->addType ( 'checkbox', array (
				__CLASS__,
				'typeDefaultValueCheckbox' 
		), array (
				__CLASS__,
				'typeValidationCheckbox' 
		), \KocujIL\V12a\Enums\Project\Components\All\Options\TypeLengthSupport::NO, \KocujIL\V12a\Enums\Project\Components\All\Options\TypeFormat::NUMBER_INT );
	}
	
	/**
	 * Add options type
	 *
	 * @access public
	 * @param string $optionType
	 *        	Options type
	 * @param array|string $callbackDefaultValue
	 *        	Callback function or method name for default value of option; can be global function or method from any class; if empty, no callback will be used - default: NULL
	 * @param array|string $callbackValidation
	 *        	Callback function or method name for validation of option; can be global function or method from any class; if empty, no callback will be used - default: NULL
	 * @param int $typeLengthSupport
	 *        	Minimum and maximum length is supported or not; must be one of the following constants from \KocujIL\V12a\Enums\Project\Components\All\Options\TypeLengthSupport: NO (when length limits are not supported) or YES (when length limits are supported) - default: \KocujIL\V12a\Enums\Project\Components\All\Options\TypeLengthSupport::NO
	 * @param int $typeFormat
	 *        	Format of value; must be one of the following constants from \KocujIL\V12a\Enums\Project\Components\All\Options\TypeFormat: TEXT (when format is text), NUMBER_INT (when format is int number) or NUMBER_FLOAT (when format is float number) - default: \KocujIL\V12a\Enums\Project\Components\All\Options\TypeFormat::TEXT
	 * @return void
	 */
	public function addType($optionType, $callbackDefaultValue = NULL, $callbackValidation = NULL, $typeLengthSupport = \KocujIL\V12a\Enums\Project\Components\All\Options\TypeLengthSupport::NO, $typeFormat = \KocujIL\V12a\Enums\Project\Components\All\Options\TypeFormat::TEXT) {
		// check if this option type identifier does not already exist
		if (isset ( $this->types [$optionType] )) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::TYPE_ID_EXISTS, __FILE__, __LINE__, $optionType );
		}
		// add option type
		$this->types [$optionType] = array ();
		if ($callbackDefaultValue !== NULL) {
			$this->types [$optionType] ['defaultvalue'] = $callbackDefaultValue;
		}
		if ($callbackValidation !== NULL) {
			$this->types [$optionType] ['validation'] = $callbackValidation;
		}
		if ($typeLengthSupport !== \KocujIL\V12a\Enums\Project\Components\All\Options\TypeLengthSupport::NO) {
			$this->types [$optionType] ['lengthsupport'] = $typeLengthSupport;
		}
		if ($typeFormat !== \KocujIL\V12a\Enums\Project\Components\All\Options\TypeFormat::TEXT) {
			$this->types [$optionType] ['format'] = $typeFormat;
		}
	}
	
	/**
	 * Get options types data
	 *
	 * @access public
	 * @return array Options types data; each options types data has the following fields: "defaultvalue" (array or string type; callback for default value of option), "format" (int type; information about format), "lengthsupport" (int type; information is minimum and maximum length is supported for this options type), "validation" (array or string type; callback for validation of option)
	 */
	public function getTypes() {
		// prepare types
		$types = $this->types;
		foreach ( $types as $key => $val ) {
			if (! isset ( $val ['defaultvalue'] )) {
				$types [$key] ['defaultvalue'] = '';
			}
			if (! isset ( $val ['format'] )) {
				$types [$key] ['format'] = \KocujIL\V12a\Enums\Project\Components\All\Options\TypeFormat::TEXT;
			}
			if (! isset ( $val ['lengthsupport'] )) {
				$types [$key] ['lengthsupport'] = \KocujIL\V12a\Enums\Project\Components\All\Options\TypeLengthSupport::NO;
			}
			if (! isset ( $val ['validation'] )) {
				$types [$key] ['validation'] = '';
			}
		}
		// exit
		return $types;
	}
	
	/**
	 * Check if options type exists
	 *
	 * @access public
	 * @param string $id
	 *        	Options type identifier
	 * @return bool Options type exists (true) or not (false)
	 */
	public function checkType($id) {
		// exit
		return isset ( $this->types [$id] );
	}
	
	/**
	 * Get options type data by id
	 *
	 * @access public
	 * @param string $id
	 *        	Options type identifier
	 * @return array|bool Options type data or false if not exists; options type data have the following fields: "defaultvalue" (array or string type; callback for default value of option), "format" (int type; information about format), "lengthsupport" (int type; information is minimum and maximum length is supported for this options type), "validation" (array or string type; callback for validation of option)
	 */
	public function getType($id) {
		// get types
		$types = $this->getTypes ();
		// exit
		return (isset ( $types [$id] )) ? $types [$id] : false;
	}
	
	/**
	 * Remove type
	 *
	 * @access public
	 * @param string $id
	 *        	Type identifier
	 * @return void
	 */
	public function removeType($id) {
		// check if this type identifier exists
		if (! isset ( $this->types [$id] )) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::TYPE_ID_DOES_NOT_EXIST, __FILE__, __LINE__, $id );
		}
		// remove type
		unset ( $this->types [$id] );
	}
	
	/**
	 * Callback for option default value - integer or float
	 *
	 * @access private
	 * @param object $componentObj
	 *        	Object with this component
	 * @param string $defaultOptionValue
	 *        	Default option value
	 * @param array $additional
	 *        	Additional settings for option; there are the following additional settings which can be used: "global_maxvalue" (int type; maximum value of number), "global_minvalue" (int type; minimal value of number)
	 * @return string Parsed default option value
	 */
	private static function typeDefaultValueIntegerOrFloat($componentObj, $defaultOptionValue, array $additional) {
		// prepare output value
		if ((isset ( $additional ['global_minvalue'] )) && ($defaultOptionValue < $additional ['global_minvalue'])) {
			$defaultOptionValue = $additional ['global_minvalue'];
		} else {
			if ((isset ( $additional ['global_maxvalue'] )) && ($defaultOptionValue > $additional ['global_maxvalue'])) {
				$defaultOptionValue = (isset ( $additional ['global_minvalue'] )) ? ( string ) $additional ['global_minvalue'] : '0';
			}
		}
		// exit
		return $defaultOptionValue;
	}
	
	/**
	 * Option validation callback helper - integer or float
	 *
	 * @access private
	 * @param object $componentObj
	 *        	Object with this component
	 * @param string $containerId
	 *        	Option container identifier
	 * @param string $optionId
	 *        	Option container identifier
	 * @param int $optionArray
	 *        	Option is array or standard; must be one of the following constants from \KocujIL\V12a\Enums\Project\Components\All\Options\OptionArray: NO (when it is standard option) or YES (when it is array option)
	 * @param string $optionValue
	 *        	Option value
	 * @param array $additional
	 *        	Additional settings for option; there are the following additional settings which can be used: "maxvalue" (int type; maximum value of number), "minvalue" (int type; minimal value of number)
	 * @param bool $mustBeInteger
	 *        	Value must be integer (true) or not (false)
	 * @return string Output text if there was an error or empty string if option value has been validated correctly
	 */
	private static function typeValidationHelperIntegerOrFloat($componentObj, $containerId, $optionId, $optionArray, $optionValue, array $additional, $mustBeInteger) {
		// initialize
		$output = '';
		// check if it is numeric and/or integer
		if (is_numeric ( $optionValue )) {
			if ((! $mustBeInteger) || (($mustBeInteger) && ($optionValue == ( int ) $optionValue))) {
				if ((isset ( $additional ['minvalue'] )) && ($optionValue < $additional ['minvalue'])) {
					$output = sprintf ( $componentObj->getStrings ( 'options', \KocujIL\V12a\Enums\ProjectCategory::ALL )->getString ( $optionArray === \KocujIL\V12a\Enums\Project\Components\All\Options\OptionArray::YES ? 'TYPE_VALIDATION_HELPER_INTEGER_OR_FLOAT_ARRAY_ERROR_BELOW_MINIMUM_VALUE' : 'TYPE_VALIDATION_HELPER_INTEGER_OR_FLOAT__ERROR_BELOW_MINIMUM_VALUE' ), $additional ['minvalue'] );
				} else {
					if ((isset ( $additional ['maxvalue'] )) && ($optionValue > $additional ['maxvalue'])) {
						$output = sprintf ( $componentObj->getStrings ( 'options', \KocujIL\V12a\Enums\ProjectCategory::ALL )->getString ( $optionArray === \KocujIL\V12a\Enums\Project\Components\All\Options\OptionArray::YES ? 'TYPE_VALIDATION_HELPER_INTEGER_OR_FLOAT__ARRAY_ERROR_ABOVE_MAXIMUM_VALUE' : 'TYPE_VALIDATION_HELPER_INTEGER_OR_FLOAT__ERROR_ABOVE_MAXIMUM_VALUE' ), $additional ['maxvalue'] );
					}
				}
			} else {
				$output = $componentObj->getStrings ( 'options', \KocujIL\V12a\Enums\ProjectCategory::ALL )->getString ( $optionArray === \KocujIL\V12a\Enums\Project\Components\All\Options\OptionArray::YES ? 'TYPE_VALIDATION_HELPER_INTEGER_OR_FLOAT__ARRAY_ERROR_NO_INTEGER' : 'TYPE_VALIDATION_HELPER_INTEGER_OR_FLOAT__ERROR_NO_INTEGER' );
			}
		} else {
			$output = $componentObj->getStrings ( 'options', \KocujIL\V12a\Enums\ProjectCategory::ALL )->getString ( $optionArray === \KocujIL\V12a\Enums\Project\Components\All\Options\OptionArray::YES ? 'TYPE_VALIDATION_HELPER_INTEGER_OR_FLOAT__ARRAY_ERROR_NO_NUMERIC' : 'TYPE_VALIDATION_HELPER_INTEGER_OR_FLOAT__ERROR_NO_NUMERIC' );
		}
		// exit
		return $output;
	}
	
	/**
	 * Callback for option validation - integer
	 *
	 * @access private
	 * @param object $componentObj
	 *        	Object with this component
	 * @param string $containerId
	 *        	Option container identifier
	 * @param string $optionId
	 *        	Option container identifier
	 * @param int $optionArray
	 *        	Option is array or standard; must be one of the following constants from \KocujIL\V12a\Enums\Project\Components\All\Options\OptionArray: NO (when it is standard option) or YES (when it is array option)
	 * @param string $optionValue
	 *        	Option value
	 * @param array $additional
	 *        	Additional settings for option; there are the following additional settings which can be used: "maxvalue" (int type; maximum value of number), "minvalue" (int type; minimal value of number)
	 * @return string Output text if there was an error or empty string if option value has been validated correctly
	 */
	private static function typeValidationInteger($componentObj, $containerId, $optionId, $optionArray, $optionValue, array $additional) {
		// exit
		return self::typeValidationHelperIntegerOrFloat ( $componentObj, $containerId, $optionId, $optionArray, $optionValue, $additional, true );
	}
	
	/**
	 * Callback for option validation - float
	 *
	 * @access private
	 * @param object $componentObj
	 *        	Object with this component
	 * @param string $containerId
	 *        	Option container identifier
	 * @param string $optionId
	 *        	Option container identifier
	 * @param int $optionArray
	 *        	Option is array or standard; must be one of the following constants from \KocujIL\V12a\Enums\Project\Components\All\Options\OptionArray: NO (when it is standard option) or YES (when it is array option)
	 * @param string $optionValue
	 *        	Option value
	 * @param array $additional
	 *        	Additional settings for option; there are the following additional settings which can be used: "maxvalue" (int type; maximum value of number), "minvalue" (int type; minimal value of number)
	 * @return string Output text if there was an error or empty string if option value has been validated correctly
	 */
	private static function typeValidationFloat($componentObj, $containerId, $optionId, $optionArray, $optionValue, array $additional) {
		// exit
		return self::typeValidationHelperIntegerOrFloat ( $componentObj, $containerId, $optionId, $optionArray, $optionValue, $additional, false );
	}
	
	/**
	 * Callback for option default value - checkbox
	 *
	 * @access private
	 * @param object $componentObj
	 *        	Object with this component
	 * @param string $defaultOptionValue
	 *        	Default option value
	 * @param array $additional
	 *        	Additional settings for option
	 * @return string Parsed default option value
	 */
	private static function typeDefaultValueCheckbox($componentObj, $defaultOptionValue, array $additional) {
		// exit
		return (($defaultOptionValue === '0') || ($defaultOptionValue === '1')) ? $defaultOptionValue : '0';
	}
	
	/**
	 * Callback for option validation - checkbox
	 *
	 * @access private
	 * @param object $componentObj
	 *        	Object with this component
	 * @param string $containerId
	 *        	Option container identifier
	 * @param string $optionId
	 *        	Option container identifier
	 * @param int $optionArray
	 *        	Option is array or standard; must be one of the following constants from \KocujIL\V12a\Enums\Project\Components\All\Options\OptionArray: NO (when it is standard option) or YES (when it is array option)
	 * @param string $optionValue
	 *        	Option value
	 * @param array $additional
	 *        	Additional settings for option
	 * @return string Output text if there was an error or empty string if option value has been validated correctly
	 */
	private static function typeValidationCheckbox($componentObj, $containerId, $optionId, $optionArray, $optionValue, array $additional) {
		// exit
		return (($optionValue === '0') || ($optionValue === '1')) ? '' : $componentObj->getStrings ( 'options', \KocujIL\V12a\Enums\ProjectCategory::ALL )->getString ( $optionArray === \KocujIL\V12a\Enums\Project\Components\All\Options\OptionArray::YES ? 'TYPE_VALIDATION_CHECKBOX_ARRAY_ERROR' : 'TYPE_VALIDATION_CHECKBOX_ERROR' );
	}
	
	/**
	 * Add options container
	 *
	 * @access public
	 * @param string $containerId
	 *        	Options container identifier; it must have maximum 16 characters
	 * @param int $optionAutoload
	 *        	Automatic loading of option or not; this argument is ignored if $containerType is set to \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::WIDGET; must be one of the following constants from \KocujIL\V12a\Enums\OptionAutoload: NO (when option should not be automatically loaded) or YES (when option should be automatically loaded) - default: \KocujIL\V12a\Enums\OptionAutoload::YES
	 * @param int $containerType
	 *        	Options container type; must be one of the following constants from \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType: NETWORK_OR_SITE (for network - in multisite installation - or site - in standard installation - type), SITE (for site type), NETWORK (for network type), WIDGET (for widget type), DATA_SET_SITE (for data set table with options for site type) or DATA_SET_NETWORK (for data set table with options for network type) - default: \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::SITE
	 * @return void
	 */
	public function addContainer($containerId, $optionAutoload = \KocujIL\V12a\Enums\OptionAutoload::YES, $containerType = \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::SITE) {
		// check if this container identifier does not already exist
		if (isset ( $this->containers [$containerId] )) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::CONTAINER_ID_EXISTS, __FILE__, __LINE__, $containerId );
		}
		// correct container identifier length
		if (isset ( $containerId [16] ) /* strlen($containerId) > 16 */ ) {
			$containerId = substr ( $containerId, 0, 16 );
		}
		// add container
		$this->containers [$containerId] = array (
				'dbkey' => $this->getProjectObj ()->getMainSettingInternalName () . '__' . $containerId 
		);
		if ($optionAutoload === \KocujIL\V12a\Enums\OptionAutoload::YES) {
			$this->containers [$containerId] ['autoload'] = $optionAutoload;
		}
		if ($containerType !== \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::SITE) {
			$this->containers [$containerId] ['type'] = $containerType;
		}
		global $wpdb;
		if ($containerType === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_SITE) {
			$this->containers [$containerId] ['tablename'] = $wpdb->prefix . $this->getProjectObj ()->getMainSettingInternalName () . '__' . $containerId;
		}
		if ($containerType === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_NETWORK) {
			$this->containers [$containerId] ['tablename'] = $wpdb->base_prefix . $this->getProjectObj ()->getMainSettingInternalName () . '__' . $containerId;
		}
		// add empty options definitions for container
		$this->definitions [$containerId] = array ();
		// add empty options for container
		$this->options [$containerId] = array (
				'options' => array (),
				'alloptions' => array (),
				'loaded' => false 
		);
		// optionally create additional tables
		if ((($containerType === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_SITE) || ($containerType === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_NETWORK)) && ($wpdb->get_var ( 'SHOW TABLES LIKE "' . $this->containers [$containerId] ['tablename'] . '"' ) !== $this->containers [$containerId] ['tablename'])) {
			// create table in database
			$wpdb->query ( 'CREATE TABLE ' . $this->containers [$containerId] ['tablename'] . ' (
				`option_id` BIGINT(20) NOT NULL AUTO_INCREMENT,
				`option_value` LONGTEXT DEFAULT NULL,
				PRIMARY KEY (`option_id`)
			) ' . $wpdb->get_charset_collate () );
			// set created database flag
			$this->dataSetTableCreatedNow = true;
		}
	}
	
	/**
	 * Get options containers data
	 *
	 * @access public
	 * @return array Options containers data; each options container data has the following fields: "autoload" (bool type; if true, options container will be loaded automatically), "dbkey" (string type; database key for options container), "tablename" (string type; table name in database for data set options), "type" (int type; options container is automatic, for network or for site)
	 */
	public function getContainers() {
		// prepare containers
		$containers = $this->containers;
		foreach ( $containers as $key => $val ) {
			if (! isset ( $val ['autoload'] )) {
				$containers [$key] ['autoload'] = \KocujIL\V12a\Enums\OptionAutoload::NO;
			}
			if (! isset ( $val ['tablename'] )) {
				$containers [$key] ['tablename'] = '';
			}
			if (! isset ( $val ['type'] )) {
				$containers [$key] ['type'] = \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::SITE;
			}
		}
		// exit
		return $containers;
	}
	
	/**
	 * Check if options container exists
	 *
	 * @access public
	 * @param string $id
	 *        	Options container identifier
	 * @return bool Options container exists (true) or not (false)
	 */
	public function checkContainer($id) {
		// exit
		return isset ( $this->containers [$id] );
	}
	
	/**
	 * Get options container data by id
	 *
	 * @access public
	 * @param string $id
	 *        	Options container identifier
	 * @return array|bool Options container data or false if not exists; options container data have the following fields: "autoload" (bool type; if true, options container will be loaded automatically), "dbkey" (string type; database key for options container), "tablename" (string type; table name in database for data set options), "type" (int type; options container is automatic, for network or for site)
	 */
	public function getContainer($id) {
		// get containers
		$containers = $this->getContainers ();
		// exit
		return (isset ( $containers [$id] )) ? $containers [$id] : false;
	}
	
	/**
	 * Remove container
	 *
	 * @access public
	 * @param string $id
	 *        	Container identifier
	 * @return void
	 */
	public function removeContainer($id) {
		// check if this container identifier exists
		if (! isset ( $this->containers [$id] )) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::CONTAINER_ID_DOES_NOT_EXIST, __FILE__, __LINE__, $id );
		}
		// remove container
		unset ( $this->containers [$id], $this->options [$id] );
	}
	
	/**
	 * Load options from database if needed
	 *
	 * @access private
	 * @param string $containerId
	 *        	Options container identifier
	 * @param int $dataSetElementId
	 *        	Data set element identifier - default: 0
	 * @return void
	 */
	private function loadOptionsFromDbIfNeeded($containerId, $dataSetElementId = 0) {
		// load container from database
		if ((isset ( $this->containers [$containerId] ['type'] )) && (($this->containers [$containerId] ['type'] === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_SITE) || ($this->containers [$containerId] ['type'] === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_NETWORK))) {
			if ((! isset ( $this->options [$containerId] ['loaded'] [$dataSetElementId] )) || (! $this->options [$containerId] ['loaded'] [$dataSetElementId])) {
				// load options from database
				global $wpdb;
				$optionsFromDb = $wpdb->get_row ( $wpdb->prepare ( 'SELECT `option_value` FROM ' . $this->containers [$containerId] ['tablename'] . ' WHERE `option_id`=%d', $dataSetElementId ), ARRAY_A );
				if ($optionsFromDb !== NULL) {
					// set options
					$optionsFromDb = $optionsFromDb ['option_value'];
					$this->options [$containerId] ['options'] [$dataSetElementId] = maybe_unserialize ( $optionsFromDb );
					$this->options [$containerId] ['alloptions'] [$dataSetElementId] = $this->options [$containerId] ['options'] [$dataSetElementId];
					// set loaded flag
					$this->options [$containerId] ['loaded'] [$dataSetElementId] = true;
					// change options based on options definitions
					$this->changeOptionsByDefinitions ( $containerId, true, $dataSetElementId );
				}
			}
		} else {
			if (! $this->options [$containerId] ['loaded']) {
				if ((! isset ( $this->containers [$containerId] ['type'] )) || ((isset ( $this->containers [$containerId] ['type'] )) && ($this->containers [$containerId] ['type'] !== \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::WIDGET))) {
					// load options from database
					$optionsFromDb = \KocujIL\V12a\Classes\DbDataHelper::getInstance ()->getOption ( $this->containers [$containerId] ['dbkey'], false, (isset ( $this->containers [$containerId] ['type'] )) ? $this->changeContainerTypeToArea ( $this->containers [$containerId] ['type'] ) : \KocujIL\V12a\Enums\Area::SITE );
					if ($optionsFromDb !== false) {
						// set options
						$this->options [$containerId] ['options'] = maybe_unserialize ( $optionsFromDb );
						$this->options [$containerId] ['alloptions'] = $this->options [$containerId] ['options'];
						// set loaded flag
						$this->options [$containerId] ['loaded'] = true;
						// change options based on options definitions
						$this->changeOptionsByDefinitions ( $containerId, true );
					}
				}
			}
		}
	}
	
	/**
	 * Change options based on options definitions
	 *
	 * @access private
	 * @param string $containerId
	 *        	Options container identifier
	 * @param bool $force
	 *        	Force changing options (true) or not (false)
	 * @param int $dataSetElementId
	 *        	Data set element identifier - default: 0
	 * @return void
	 */
	private function changeOptionsByDefinitions($containerId, $force = false, $dataSetElementId = 0) {
		// initialize
		if ((isset ( $this->containers [$containerId] ['type'] )) && (($this->containers [$containerId] ['type'] === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_SITE) || ($this->containers [$containerId] ['type'] === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_NETWORK))) {
			if ($dataSetElementId < 1) {
				return;
			}
			$optionsData = $this->options [$containerId] ['options'] [$dataSetElementId];
			$allOptionsData = $this->options [$containerId] ['alloptions'] [$dataSetElementId];
		} else {
			$optionsData = $this->options [$containerId] ['options'];
			$allOptionsData = $this->options [$containerId] ['alloptions'];
		}
		// check options and definitions count
		if ((! $force) && (count ( $this->definitions [$containerId] ) === count ( $optionsData ))) {
			return;
		}
		// update options data
		$options = array ();
		foreach ( $this->definitions [$containerId] as $optionId => $definition ) {
			if (isset ( $optionsData [$optionId] )) {
				$options [$optionId] = $optionsData [$optionId];
			} else {
				if (isset ( $allOptionsData [$optionId] )) {
					$options [$optionId] = $allOptionsData [$optionId];
				} else {
					$options [$optionId] = $definition ['defaultvalue'];
				}
			}
		}
		if ((isset ( $this->containers [$containerId] ['type'] )) && (($this->containers [$containerId] ['type'] === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_SITE) || ($this->containers [$containerId] ['type'] === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_NETWORK))) {
			$this->options [$containerId] ['options'] [$dataSetElementId] = $options;
		} else {
			$this->options [$containerId] ['options'] = $options;
		}
	}
	
	/**
	 * Add options container
	 *
	 * @todo disallow option id as "option_id" or "option_value"
	 * @todo add requirement that "global_foreignkeyforcontainer", "global_ordervalue" or "global_unique" can be set only when "global_searchkey" is set
	 * @todo add checking if "global_ordervalue" is only for one option in container
	 * @access public
	 * @param string $containerId
	 *        	Options container identifier
	 * @param string $optionId
	 *        	Option identifier
	 * @param string $type
	 *        	Option type
	 * @param string $defaultValue
	 *        	Option default value
	 * @param string $label
	 *        	Option label
	 * @param int $optionArray
	 *        	Option is array or standard; must be one of the following constants from \KocujIL\V12a\Enums\Project\Components\All\Options\OptionArray: NO (when it is standard option) or YES (when it is array option) - default: \KocujIL\V12a\Enums\Project\Components\All\Options\OptionArray::NO
	 * @param array $arraySettings
	 *        	Array settings if $optionArray is set to \KocujIL\V12a\Enums\Project\Components\All\Options\OptionArray::YES - default: empty
	 * @param array $additional
	 *        	Data set settings for option; each options type can use different data set settings; there are the following data set settings which can be always used: "global_foreignkeyforcontainer" (string type; name of container for which this option is foreign key, so selected value can be only from available values in column "option_id" in the selected container; it works only if "global_searchkey" is set to true), "global_ordervalue" (bool type; if container is for data set and it is set to true, this value will be used for default ordering the elements list), "global_searchkey" (bool type; if container is for data set and it is set to true, there will be an additional column with option value for this definition), "global_unique" (bool type; if container is for data set and it is set to true, this field will be checked if its value is unique in data set; it works only if "global_searchkey" is set to true) - default: empty
	 * @param array $additional
	 *        	Additional settings for option; each options type can use different additional settings; there are the following additional settings which can be always used: "global_maxlength" (int type; maximum size of string; only for options types which have support for option value length), "global_minlength" (int type; minimal size of string; only for options types which have support for option value length) - default: empty
	 * @return void
	 */
	public function addDefinition($containerId, $optionId, $type, $defaultValue, $label, $optionArray = \KocujIL\V12a\Enums\Project\Components\All\Options\OptionArray::NO, array $arraySettings = array(), array $dataSetSettings = array(), array $additional = array()) {
		// check if this container identifier exists
		if (! isset ( $this->containers [$containerId] )) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::CONTAINER_ID_DOES_NOT_EXIST, __FILE__, __LINE__, $containerId );
		}
		// check if this option type exists
		if (! isset ( $this->types [$type] )) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::TYPE_ID_DOES_NOT_EXIST, __FILE__, __LINE__, $type );
		}
		// check if this option definition does not already exist
		if (isset ( $this->definitions [$containerId] [$optionId] )) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::DEFINITION_ID_EXISTS, __FILE__, __LINE__, $optionId );
		}
		// check if it is not an array for widget
		if ((isset ( $this->containers [$containerId] ['type'] )) && ($this->containers [$containerId] ['type'] === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::WIDGET) && ($optionArray === \KocujIL\V12a\Enums\Project\Components\All\Options\OptionArray::YES)) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::CANNOT_USE_ARRAY_OPTION_IN_WIDGET, __FILE__, __LINE__, $optionId );
		}
		// add option definition
		$this->definitions [$containerId] [$optionId] = array (
				'type' => $type,
				'defaultvalue' => (isset ( $this->types [$type] ['defaultvalue'] )) ? call_user_func_array ( $this->types [$type] ['defaultvalue'], array (
						$this,
						$defaultValue,
						$additional 
				) ) : $defaultValue,
				'label' => $label 
		);
		if ($optionArray === \KocujIL\V12a\Enums\Project\Components\All\Options\OptionArray::YES) {
			$this->definitions [$containerId] [$optionId] ['array'] = $optionArray;
			$this->definitions [$containerId] [$optionId] ['arraysettings'] = $arraySettings;
		}
		if (! empty ( $dataSetSettings )) {
			$this->definitions [$containerId] [$optionId] ['datasetsettings'] = $dataSetSettings;
		}
		if (! empty ( $additional )) {
			$this->definitions [$containerId] [$optionId] ['additional'] = $additional;
		}
		// optionally add column to data set table
		if (($this->dataSetTableCreatedNow) && (isset ( $this->definitions [$containerId] [$optionId] ['datasetsettings'] ['global_searchkey'] )) && ($this->definitions [$containerId] [$optionId] ['datasetsettings'] ['global_searchkey'])) {
			$typeData = $this->getType ( $type );
			switch ($typeData ['format']) {
				case \KocujIL\V12a\Enums\Project\Components\All\Options\TypeFormat::NUMBER_INT :
					$columnType = 'INT';
					break;
				case \KocujIL\V12a\Enums\Project\Components\All\Options\TypeFormat::NUMBER_FLOAT :
					$columnType = 'FLOAT';
					break;
				default :
					$columnType = 'TEXT';
					if ($optionArray !== \KocujIL\V12a\Enums\Project\Components\All\Options\OptionArray::YES) {
						if ((isset ( $this->definitions [$containerId] [$optionId] ['additional'] ['global_maxlength'] )) && ($this->definitions [$containerId] [$optionId] ['additional'] ['global_maxlength'] <= 255)) {
							$columnType = 'VARCHAR(' . $this->definitions [$containerId] [$optionId] ['additional'] ['global_maxlength'] . ')';
						}
					}
			}
			global $wpdb;
			$wpdb->query ( 'ALTER TABLE ' . $this->containers [$containerId] ['tablename'] . ' ADD COLUMN `' . $optionId . '` ' . $columnType . ' DEFAULT NULL' );
		}
		// change options based on options definitions
		$this->changeOptionsByDefinitions ( $containerId );
	}
	
	/**
	 * Get options definitions data
	 *
	 * @access public
	 * @param string $containerId
	 *        	Options container identifier
	 * @return array Options definitions data; each option definition data has the following fields: "additional" (array type; additional settings for option), "arraymode" (int type; set if option is standard or array), "arraysettings" (array type; settings for option if it is an array), "datasetsettings" (array type; data set settings for option), "defaultvalue" (string type; option default value), "label" (string type; option label), "type" (string type; option type)
	 */
	public function getDefinitions($containerId) {
		// check if this container identifier exists
		if (! isset ( $this->containers [$containerId] )) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::CONTAINER_ID_DOES_NOT_EXIST, __FILE__, __LINE__, $containerId );
		}
		// prepare definitions
		$definitions = $this->definitions [$containerId];
		foreach ( $definitions as $key => $val ) {
			if (! isset ( $val ['array'] )) {
				$definitions [$key] ['array'] = \KocujIL\V12a\Enums\Project\Components\All\Options\OptionArray::NO;
			}
			if (! isset ( $val ['arraysettings'] )) {
				$definitions [$key] ['arraysettings'] = array ();
			}
			if (! isset ( $val ['datasetsettings'] )) {
				$definitions [$key] ['datasetsettings'] = array ();
			}
			if (! isset ( $val ['additional'] )) {
				$definitions [$key] ['additional'] = array ();
			}
		}
		// exit
		return $definitions;
	}
	
	/**
	 * Check if option definition exists
	 *
	 * @access public
	 * @param string $containerId
	 *        	Options container identifier
	 * @param string $optionId
	 *        	Option definition identifier
	 * @return bool Option definition exists (true) or not (false)
	 */
	public function checkDefinition($containerId, $optionId) {
		// check if this container identifier exists
		if (! isset ( $this->containers [$containerId] )) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::CONTAINER_ID_DOES_NOT_EXIST, __FILE__, __LINE__, $containerId );
		}
		// exit
		return isset ( $this->definitions [$containerId] [$optionId] );
	}
	
	/**
	 * Get option definition data by id
	 *
	 * @access public
	 * @param string $containerId
	 *        	Options container identifier
	 * @param string $optionId
	 *        	Option definition identifier
	 * @return array|bool Option definition data or false if not exists; option definition data have the following fields: "additional" (array type; additional settings for option), "arraymode" (int type; set if option is standard or array), "arraysettings" (array type; settings for option if it is an array), "datasetsettings" (array type; data set settings for option), "defaultvalue" (string type; option default value), "label" (string type; option label), "type" (string type; option type)
	 */
	public function getDefinition($containerId, $optionId) {
		// get definitions
		$definitions = $this->getDefinitions ( $containerId );
		// exit
		return (isset ( $definitions [$optionId] )) ? $definitions [$optionId] : false;
	}
	
	/**
	 * Remove option definition
	 *
	 * @access public
	 * @param string $containerId
	 *        	Options definition identifier
	 * @param string $optionId
	 *        	Option identifier
	 * @return void
	 */
	public function removeDefinition($containerId, $optionId) {
		// check if this container identifier exists
		if (! isset ( $this->containers [$containerId] )) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::CONTAINER_ID_DOES_NOT_EXIST, __FILE__, __LINE__, $containerId );
		}
		// check if this definition identifier exists
		if (! isset ( $this->definitions [$containerId] [$optionId] )) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::DEFINITION_ID_DOES_NOT_EXIST, __FILE__, __LINE__, $optionId );
		}
		// remove option definition
		unset ( $this->definitions [$containerId] [$optionId] );
	}
	
	/**
	 * Set option value and return text with status
	 *
	 * @access public
	 * @param string $containerId
	 *        	Option container identifier
	 * @param string $optionId
	 *        	Option identifier
	 * @param string $optionValue
	 *        	Option value
	 * @param
	 *        	string &$outputText Text with status of changing option value if there was an error
	 * @param int $dataSetElementId
	 *        	Data set element identifier - default: 0
	 * @return bool Options has been set correctly (true) or not (false)
	 */
	public function setOptionWithReturnedText($containerId, $optionId, $optionValue, &$outputText, $dataSetElementId = 0) {
		// initialize
		global $wpdb;
		$outputText = '';
		// check if this container identifier exists
		if (! isset ( $this->containers [$containerId] )) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::CONTAINER_ID_DOES_NOT_EXIST, __FILE__, __LINE__, $containerId );
		}
		// load options
		if ((isset ( $this->containers [$containerId] ['type'] )) && (($this->containers [$containerId] ['type'] === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_SITE) || ($this->containers [$containerId] ['type'] === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_NETWORK))) {
			// load options if needed
			$this->loadOptionsFromDbIfNeeded ( $containerId, $dataSetElementId );
			// change options based on options definitions
			$this->changeOptionsByDefinitions ( $containerId, false, $dataSetElementId );
		} else {
			// load options if needed
			$this->loadOptionsFromDbIfNeeded ( $containerId );
			// change options based on options definitions
			$this->changeOptionsByDefinitions ( $containerId );
		}
		// check if this definition identifier exists
		if (! isset ( $this->definitions [$containerId] [$optionId] )) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::DEFINITION_ID_DOES_NOT_EXIST, __FILE__, __LINE__, $optionId );
		}
		// get option definition type
		$type = $this->definitions [$containerId] [$optionId] ['type'];
		// check if option is an array
		$array = (isset ( $this->definitions [$containerId] [$optionId] ['array'] )) ? $this->definitions [$containerId] [$optionId] ['array'] : \KocujIL\V12a\Enums\Project\Components\All\Options\OptionArray::NO;
		// prepare option values to parse
		$optionValues = $array === \KocujIL\V12a\Enums\Project\Components\All\Options\OptionArray::YES ? $optionValue : array (
				$optionValue 
		);
		// optionally check option value length
		if ((isset ( $this->types [$type] ['lengthsupport'] )) && (isset ( $this->definitions [$containerId] [$optionId] ['additional'] )) && (! empty ( $optionValues ))) {
			if (isset ( $this->definitions [$containerId] [$optionId] ['additional'] ['global_minlength'] )) {
				$length = $this->definitions [$containerId] [$optionId] ['additional'] ['global_minlength'];
				foreach ( $optionValues as $val ) {
					if (strlen ( $val ) < $length) {
						$outputText = sprintf ( $this->getStrings ( 'options', \KocujIL\V12a\Enums\ProjectCategory::ALL )->getString ( $array === \KocujIL\V12a\Enums\Project\Components\All\Options\OptionArray::YES ? 'SET_OPTION_WITH_RETURNED_ARRAY_TEXT_TOO_FEW_CHARACTERS' : 'SET_OPTION_WITH_RETURNED_TEXT_TOO_FEW_CHARACTERS' ), $length );
						return false;
					}
				}
			}
			if (isset ( $this->definitions [$containerId] [$optionId] ['additional'] ['global_maxlength'] )) {
				$length = $this->definitions [$containerId] [$optionId] ['additional'] ['global_maxlength'];
				foreach ( $optionValues as $val ) {
					if (strlen ( $val ) > $length) {
						$outputText = sprintf ( $this->getStrings ( 'options', \KocujIL\V12a\Enums\ProjectCategory::ALL )->getString ( $array === \KocujIL\V12a\Enums\Project\Components\All\Options\OptionArray::YES ? 'SET_OPTION_WITH_RETURNED_ARRAY_TEXT_TOO_MANY_CHARACTERS' : 'SET_OPTION_WITH_RETURNED_TEXT_TOO_MANY_CHARACTERS' ), $length );
						return false;
					}
				}
			}
		}
		// validate option value
		if ((isset ( $this->types [$type] ['validation'] )) && (! empty ( $optionValues ))) {
			$additional = (isset ( $this->definitions [$containerId] [$optionId] ['additional'] )) ? $this->definitions [$containerId] [$optionId] ['additional'] : array ();
			foreach ( $optionValues as $val ) {
				$validationText = call_user_func_array ( $this->types [$type] ['validation'], array (
						$this,
						$containerId,
						$optionId,
						$array,
						$val,
						$additional 
				) );
				if (isset ( $validationText [0] ) /* strlen($validationText) > 0 */ ) {
					$outputText = $validationText;
					return false;
				}
			}
		}
		// optionally check if option value is unique in data set
		if (($array === \KocujIL\V12a\Enums\Project\Components\All\Options\OptionArray::NO) && (isset ( $this->containers [$containerId] ['type'] )) && (($this->containers [$containerId] ['type'] === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_SITE) || ($this->containers [$containerId] ['type'] === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_NETWORK)) && (isset ( $this->definitions [$containerId] [$optionId] ['datasetsettings'] ['global_unique'] )) && ($this->definitions [$containerId] [$optionId] ['datasetsettings'] ['global_unique'])) {
			if ($wpdb->get_row ( $wpdb->prepare ( 'SELECT * FROM ' . $this->containers [$containerId] ['tablename'] . ' WHERE `' . $optionId . '`=%s AND `option_id`<>%d', $optionValue, $dataSetElementId ), ARRAY_A ) !== NULL) {
				$outputText = $this->getStrings ( 'options', \KocujIL\V12a\Enums\ProjectCategory::ALL )->getString ( 'SET_OPTION_WITH_RETURNED_TEXT_NOT_UNIQUE' );
				return false;
			}
		}
		// optionally check if option is form values available in "option_id" in other container
		if (($array === \KocujIL\V12a\Enums\Project\Components\All\Options\OptionArray::NO) && (isset ( $this->containers [$containerId] ['type'] )) && (($this->containers [$containerId] ['type'] === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_SITE) || ($this->containers [$containerId] ['type'] === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_NETWORK)) && (isset ( $this->definitions [$containerId] [$optionId] ['datasetsettings'] ['global_foreignkeyforcontainer'] )) && ($this->definitions [$containerId] [$optionId] ['datasetsettings'] ['global_foreignkeyforcontainer'])) {
			if ($wpdb->get_row ( $wpdb->prepare ( 'SELECT * FROM ' . $this->containers [$this->definitions [$containerId] [$optionId] ['datasetsettings'] ['global_foreignkeyforcontainer']] ['tablename'] . ' WHERE `option_id`=%d', $optionValue ), ARRAY_A ) === NULL) {
				$outputText = $this->getStrings ( 'options', \KocujIL\V12a\Enums\ProjectCategory::ALL )->getString ( 'SET_OPTION_WITH_RETURNED_TEXT_NOT_AVAILABLE' );
				return false;
			}
		}
		// set option
		if ((isset ( $this->containers [$containerId] ['type'] )) && (($this->containers [$containerId] ['type'] === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_SITE) || ($this->containers [$containerId] ['type'] === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_NETWORK))) {
			$this->options [$containerId] ['options'] [$dataSetElementId] [$optionId] = $optionValue;
		} else {
			$this->options [$containerId] ['options'] [$optionId] = $optionValue;
		}
		// exit
		return true;
	}
	
	/**
	 * Set option value
	 *
	 * @access public
	 * @param string $containerId
	 *        	Option container identifier
	 * @param string $optionId
	 *        	Option identifier
	 * @param string $optionValue
	 *        	Option value
	 * @param int $dataSetElementId
	 *        	Data set element identifier - default: 0
	 * @return bool Options has been set correctly (true) or not (false)
	 */
	public function setOption($containerId, $optionId, $optionValue, $dataSetElementId = 0) {
		// initialize
		$text = '';
		// exit
		return $this->setOptionWithReturnedText ( $containerId, $optionId, $optionValue, $text, $dataSetElementId );
	}
	
	/**
	 * Get option value
	 *
	 * @access public
	 * @param string $containerId
	 *        	Option container identifier
	 * @param string $optionId
	 *        	Option identifier
	 * @param int $dataSetElementId
	 *        	Data set element identifier - default: 0
	 * @return string Option value
	 */
	public function getOption($containerId, $optionId, $dataSetElementId = 0) {
		// check if this container identifier exists
		if (! isset ( $this->containers [$containerId] )) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::CONTAINER_ID_DOES_NOT_EXIST, __FILE__, __LINE__, $containerId );
		}
		// load options
		if ((isset ( $this->containers [$containerId] ['type'] )) && (($this->containers [$containerId] ['type'] === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_SITE) || ($this->containers [$containerId] ['type'] === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_NETWORK))) {
			// load options if needed
			$this->loadOptionsFromDbIfNeeded ( $containerId, $dataSetElementId );
			// change options based on options definitions
			$this->changeOptionsByDefinitions ( $containerId, false, $dataSetElementId );
		} else {
			// load options if needed
			$this->loadOptionsFromDbIfNeeded ( $containerId );
			// change options based on options definitions
			$this->changeOptionsByDefinitions ( $containerId );
		}
		// check if this definition identifier exists
		if (! isset ( $this->definitions [$containerId] [$optionId] )) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::DEFINITION_ID_DOES_NOT_EXIST, __FILE__, __LINE__, $optionId );
		}
		// exit
		if ((isset ( $this->containers [$containerId] ['type'] )) && (($this->containers [$containerId] ['type'] === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_SITE) || ($this->containers [$containerId] ['type'] === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_NETWORK))) {
			return $this->options [$containerId] ['options'] [$dataSetElementId] [$optionId];
		} else {
			return $this->options [$containerId] ['options'] [$optionId];
		}
	}
	
	/**
	 * Get all options values
	 *
	 * @access public
	 * @param string $containerId
	 *        	Option container identifier
	 * @return array Options values
	 */
	public function getAllOptions($containerId, $dataSetElementId = 0) {
		// check if this container identifier exists
		if (! isset ( $this->containers [$containerId] )) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::CONTAINER_ID_DOES_NOT_EXIST, __FILE__, __LINE__, $containerId );
		}
		// get all options
		$output = array ();
		if (isset ( $this->definitions [$containerId] )) {
			foreach ( $this->definitions [$containerId] as $optionId => $val ) {
				$output [$optionId] = $this->getOption ( $containerId, $optionId, $dataSetElementId );
			}
		}
		// exit
		return $output;
	}
	
	/**
	 * Add new element for data set
	 *
	 * @access public
	 * @return int New element identifier for data set
	 */
	public function addDataSetElement($containerId) {
		// check if this container identifier exists
		if (! isset ( $this->containers [$containerId] )) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::CONTAINER_ID_DOES_NOT_EXIST, __FILE__, __LINE__, $containerId );
		}
		// check if this container is for data set
		if ((! isset ( $this->containers [$containerId] ['type'] )) || (($this->containers [$containerId] ['type'] !== \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_SITE) && ($this->containers [$containerId] ['type'] !== \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_NETWORK))) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::WRONG_CONTAINER_TYPE_FOR_THIS_METHOD, __FILE__, __LINE__, $containerId );
		}
		// add new data set element
		global $wpdb;
		$wpdb->query ( 'INSERT INTO ' . $this->containers [$containerId] ['tablename'] . ' (`option_value`) VALUES (NULL)' );
		// load options if needed
		$this->loadOptionsFromDbIfNeeded ( $containerId, $wpdb->insert_id );
		// change options based on options definitions
		$this->changeOptionsByDefinitions ( $containerId, false, $wpdb->insert_id );
		// exit
		return $wpdb->insert_id;
	}
	
	/**
	 * Get elements or elements count from data set
	 *
	 * @access private
	 * @param bool $getElements
	 *        	Get element (true) or elements count (false)
	 * @param string $containerId
	 *        	Option container identifier
	 * @param array $searchValues
	 *        	If options are for data set, these are options keys and values by which data will be searched - default: empty
	 * @param string $orderBy
	 *        	Option by which results will be sorted - default: empty
	 * @param int $order
	 *        	Order of sorting; must be one of the following constants from \KocujIL\V12a\Enums\Project\Components\All\Options\Order: ASC (when order is ascendand) or DESC (when order is descendant) - default: \KocujIL\V12a\Enums\Project\Components\All\Options\Order::ASC
	 * @param int $count
	 *        	How many elements should be returned; if it set to 0, all elements will be get - default: 1
	 * @param int $from
	 *        	From which element data should be returned - default: 0
	 * @return array|int Options values for each founded element or elements count
	 */
	private function getDataSetElementsOrCount($getElements, $containerId, array $searchValues = array(), $orderBy = '', $order = \KocujIL\V12a\Enums\Project\Components\All\Options\Order::ASC, $count = 1, $from = 0) {
		// check if this container identifier exists
		if (! isset ( $this->containers [$containerId] )) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::CONTAINER_ID_DOES_NOT_EXIST, __FILE__, __LINE__, $containerId );
		}
		// check if this container is for data set
		if ((! isset ( $this->containers [$containerId] ['type'] )) || (($this->containers [$containerId] ['type'] !== \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_SITE) && ($this->containers [$containerId] ['type'] !== \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_NETWORK))) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::WRONG_CONTAINER_TYPE_FOR_THIS_METHOD, __FILE__, __LINE__, $containerId );
		}
		// load all options
		$output = $getElements ? array () : 0;
		if ((isset ( $this->definitions [$containerId] )) && (! empty ( $this->definitions [$containerId] ))) {
			// prepare query fragments
			global $wpdb;
			$queryAfter = ' WHERE 1=1';
			foreach ( $searchValues as $optionKey => $optionValue ) {
				if ((isset ( $this->definitions [$containerId] [$optionKey] ['datasetsettings'] ['global_searchkey'] )) && ($this->definitions [$containerId] [$optionKey] ['datasetsettings'] ['global_searchkey'])) {
					$queryAfter .= $wpdb->prepare ( ' AND `' . $optionKey . '`=%s', $optionValue );
				} else {
					throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::CANNOT_USE_OPTION_AS_SEARCH_KEY, __FILE__, __LINE__, $optionKey );
				}
			}
			if ($getElements) {
				if (isset ( $orderBy [0] ) /* strlen($orderBy) > 0 */ ) {
					$orderByString = $orderBy;
				} else {
					$def = $this->getDefinitions ( $containerId );
					foreach ( $def as $optionId => $defData ) {
						if ((isset ( $defData ['datasetsettings'] ['global_ordervalue'] )) && ($defData ['datasetsettings'] ['global_ordervalue'])) {
							$orderByString = $optionId;
							break;
						}
					}
				}
				$queryAfter .= ' ORDER BY';
				if (isset ( $orderByString [0] ) /* strlen($orderByString) > 0 */ ) {
					$queryAfter .= ' `' . $orderByString . '` ' . (($order === \KocujIL\V12a\Enums\Project\Components\All\Options\Order::DESC) ? 'DESC' : 'ASC') . ',';
				}
				$queryAfter .= ' `option_id` ASC';
				if ($count !== 0) {
					$queryAfter .= $wpdb->prepare ( ' LIMIT %d,%d', $from, $count );
				}
			}
			// get elements identifiers list or elements count
			if ($getElements) {
				$elementsList = $wpdb->get_results ( 'SELECT `option_id` FROM ' . $this->containers [$containerId] ['tablename'] . $queryAfter, ARRAY_A );
				if ($elementsList !== NULL) {
					foreach ( $elementsList as $elementVal ) {
						if (! isset ( $output [$elementVal ['option_id']] )) {
							$output [$elementVal ['option_id']] = array (
									'ID' => $elementVal ['option_id'] 
							);
						}
						foreach ( $this->definitions [$containerId] as $optionId => $val ) {
							$output [$elementVal ['option_id']] [$optionId] = $this->getOption ( $containerId, $optionId, $elementVal ['option_id'] );
						}
					}
				}
			} else {
				$elementsCount = $wpdb->get_row ( 'SELECT COUNT(*) AS elements_count FROM ' . $this->containers [$containerId] ['tablename'] . ' ' . $queryAfter, ARRAY_A );
				if ($elementsCount !== NULL) {
					$output = $elementsCount ['elements_count'];
				}
			}
		}
		// exit
		return $output;
	}
	
	/**
	 * Get elements from data set
	 *
	 * @access public
	 * @param string $containerId
	 *        	Option container identifier
	 * @param array $searchValues
	 *        	If options are for data set, these are options keys and values by which data will be searched - default: empty
	 * @param string $orderBy
	 *        	Option by which results will be sorted - default: empty
	 * @param int $order
	 *        	Order of sorting; must be one of the following constants from \KocujIL\V12a\Enums\Project\Components\All\Options\Order: ASC (when order is ascendand) or DESC (when order is descendant) - default: \KocujIL\V12a\Enums\Project\Components\All\Options\Order::ASC
	 * @param int $count
	 *        	How many elements should be returned; if it set to 0, all elements will be get - default: 1
	 * @param int $from
	 *        	From which element data should be returned - default: 0
	 * @return array Options values for each founded element
	 */
	public function getDataSetElements($containerId, array $searchValues = array(), $orderBy = '', $order = \KocujIL\V12a\Enums\Project\Components\All\Options\Order::ASC, $count = 1, $from = 0) {
		// exit
		return $this->getDataSetElementsOrCount ( true, $containerId, $searchValues, $orderBy, $order, $count, $from );
	}
	
	/**
	 * Get elements count for data set
	 *
	 * @access public
	 * @param string $containerId
	 *        	Option container identifier
	 * @param array $searchValues
	 *        	If options are for data set, these are options keys and values by which data will be searched - default: empty
	 * @return array Options values for each founded element
	 */
	public function getDataSetElementsCount($containerId, array $searchValues = array()) {
		// exit
		return $this->getDataSetElementsOrCount ( false, $containerId, $searchValues );
	}
	
	/**
	 * Check data set element identifier
	 *
	 * @access public
	 * @param string $containerId
	 *        	Options container identifier
	 * @param int $dataSetElementId
	 *        	Data set element identifier
	 * @return bool Element identifier exists in data set (true) or not (false)
	 */
	public function checkDataSetElementId($containerId, $dataSetElementId) {
		// check if this container identifier exists
		if (! isset ( $this->containers [$containerId] )) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::CONTAINER_ID_DOES_NOT_EXIST, __FILE__, __LINE__, $containerId );
		}
		// check if this container is for data set
		if ((! isset ( $this->containers [$containerId] ['type'] )) || (($this->containers [$containerId] ['type'] !== \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_SITE) && ($this->containers [$containerId] ['type'] !== \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_NETWORK))) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::WRONG_CONTAINER_TYPE_FOR_THIS_METHOD, __FILE__, __LINE__, $containerId );
		}
		// check element identifier
		global $wpdb;
		$row = $wpdb->get_row ( $wpdb->prepare ( 'SELECT `option_id` FROM ' . $this->containers [$containerId] ['tablename'] . ' WHERE `option_id`=%d', $dataSetElementId ), ARRAY_A );
		// exit
		return ($row !== NULL);
	}
	
	/**
	 * Remove data set element identifier
	 *
	 * @todo when removing other elements with foreign key set to current container, do not remove entire cache for this container from memory, but only deleted elements
	 * @access public
	 * @param string $containerId
	 *        	Options container identifier
	 * @param int $dataSetElementId
	 *        	Data set element identifier
	 * @return void
	 */
	public function removeDataSetElement($containerId, $dataSetElementId) {
		// check if this container identifier exists
		if (! isset ( $this->containers [$containerId] )) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::CONTAINER_ID_DOES_NOT_EXIST, __FILE__, __LINE__, $containerId );
		}
		// check if this container is for data set
		if ((! isset ( $this->containers [$containerId] ['type'] )) || (($this->containers [$containerId] ['type'] !== \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_SITE) && ($this->containers [$containerId] ['type'] !== \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_NETWORK))) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::WRONG_CONTAINER_TYPE_FOR_THIS_METHOD, __FILE__, __LINE__, $containerId );
		}
		// initialize
		global $wpdb;
		// start transaction
		\KocujIL\V12a\Classes\DbDataHelper::getInstance ()->databaseTransactionStart ();
		// optionally delete other elements with foreign key set to this container
		foreach ( $this->containers as $key => $val ) {
			$def = $this->getDefinitions ( $key );
			foreach ( $def as $optionId => $defData ) {
				if (isset ( $defData ['datasetsettings'] ['global_foreignkeyforcontainer'] )) {
					$wpdb->query ( $wpdb->prepare ( 'DELETE FROM ' . $this->containers [$key] ['tablename'] . ' WHERE `' . $optionId . '`=%d', $dataSetElementId ) );
					if (isset ( $this->options [$key] )) {
						unset ( $this->options [$key] );
					}
				}
			}
		}
		// delete element
		$wpdb->query ( $wpdb->prepare ( 'DELETE FROM ' . $this->containers [$containerId] ['tablename'] . ' WHERE `option_id`=%d', $dataSetElementId ) );
		if (isset ( $this->options [$containerId] ['options'] [$dataSetElementId] )) {
			unset ( $this->options [$containerId] ['options'] [$dataSetElementId] );
		}
		// end transaction
		\KocujIL\V12a\Classes\DbDataHelper::getInstance ()->databaseTransactionEnd ();
	}
	
	/**
	 * Change container type to area
	 *
	 * @access private
	 * @param int $containerType
	 *        	Options container type; must be one of the following constants from \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType: NETWORK_OR_SITE (for network - in multisite installation - or site - in standard installation - type), SITE (for site type), NETWORK (for network type) or WIDGET (for widget type) - default: \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::SITE
	 * @return int Area type
	 */
	private function changeContainerTypeToArea($containerType) {
		// change container type to area
		$typeToArea = array (
				\KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::SITE => \KocujIL\V12a\Enums\Area::SITE,
				\KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::NETWORK => \KocujIL\V12a\Enums\Area::NETWORK 
		);
		// exit
		return isset ( $typeToArea [$containerType] ) ? $typeToArea [$containerType] : \KocujIL\V12a\Enums\Area::AUTO;
	}
	
	/**
	 * Update container in database; if it is data set, only loaded elements will be updated
	 *
	 * @access public
	 * @param string $containerId
	 *        	Option container identifier
	 * @return void
	 */
	public function updateContainerInDb($containerId) {
		// check if this container identifier exists
		if (! isset ( $this->containers [$containerId] )) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::CONTAINER_ID_DOES_NOT_EXIST, __FILE__, __LINE__, $containerId );
		}
		// check if option type can be used by this method
		if ((isset ( $this->containers [$containerId] ['type'] )) && ($this->containers [$containerId] ['type'] === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::WIDGET)) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::WRONG_CONTAINER_TYPE_FOR_THIS_METHOD, __FILE__, __LINE__, $containerId );
		}
		// load options
		if ((isset ( $this->containers [$containerId] ['type'] )) && (($this->containers [$containerId] ['type'] === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_SITE) || ($this->containers [$containerId] ['type'] === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_NETWORK))) {
			// load options if needed
			$this->loadOptionsFromDbIfNeeded ( $containerId );
			// change options based on options definitions
			$this->changeOptionsByDefinitions ( $containerId );
		}
		// save options to database
		if ((isset ( $this->containers [$containerId] ['type'] )) && (($this->containers [$containerId] ['type'] === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_SITE) || ($this->containers [$containerId] ['type'] === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_NETWORK))) {
			global $wpdb;
			foreach ( $this->options [$containerId] ['options'] as $dataSetElementId => $dataSetElement ) {
				// check if value exists already
				$row = $wpdb->get_row ( $wpdb->prepare ( 'SELECT `option_value` FROM ' . $this->containers [$containerId] ['tablename'] . ' WHERE `option_id`=%d', $dataSetElementId ), ARRAY_A );
				$addString1 = '';
				$addString2 = '';
				// add values for additional columns
				if (! empty ( $dataSetElement )) {
					foreach ( $dataSetElement as $key => $val ) {
						if ((isset ( $this->definitions [$containerId] [$key] ['datasetsettings'] ['global_searchkey'] )) && ($this->definitions [$containerId] [$key] ['datasetsettings'] ['global_searchkey'])) {
							if ($row !== NULL) {
								$addString1 .= $wpdb->prepare ( ', `' . $key . '`=%s', $val );
							} else {
								$addString1 .= ', `' . $key . '`';
								$addString2 .= $wpdb->prepare ( ', %s', $val );
							}
						}
					}
				}
				// insert or update options in data set
				if ($row !== NULL) {
					$wpdb->query ( $wpdb->prepare ( 'UPDATE ' . $this->containers [$containerId] ['tablename'] . ' SET `option_value`=%s' . $addString1 . ' WHERE `option_id`=%d', maybe_serialize ( $dataSetElement ), $dataSetElementId ) );
				} else {
					$wpdb->query ( $wpdb->prepare ( 'INSERT INTO ' . $this->containers [$containerId] ['tablename'] . ' (`option_value`' . $addString1 . ') VALUES (%s' . $addString2 . ')', maybe_serialize ( $dataSetElement ) ) );
				}
			}
		} else {
			\KocujIL\V12a\Classes\DbDataHelper::getInstance ()->addOrUpdateOption ( $this->containers [$containerId] ['dbkey'], $this->options [$containerId] ['options'], (isset ( $this->containers [$containerId] ['autoload'] )) ? $this->containers [$containerId] ['autoload'] : \KocujIL\V12a\Enums\OptionAutoload::NO, (isset ( $this->containers [$containerId] ['type'] )) ? $this->changeContainerTypeToArea ( $this->containers [$containerId] ['type'] ) : \KocujIL\V12a\Enums\Area::SITE );
		}
	}
	
	/**
	 * Update all containers in database
	 *
	 * @access public
	 * @return void
	 */
	public function updateAllContainersInDb() {
		// update all containers in database
		foreach ( $this->containers as $containerId => $containerData ) {
			try {
				$this->updateContainerInDb ( $containerId );
			} catch ( \KocujIL\V12a\Classes\Exception $e ) {
			}
		}
	}
	
	/**
	 * Remove container from database
	 *
	 * @access public
	 * @param string $containerId
	 *        	Option container identifier
	 * @return void
	 */
	public function removeContainerFromDb($containerId) {
		// check if this container identifier exists
		if (! isset ( $this->containers [$containerId] )) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::CONTAINER_ID_DOES_NOT_EXIST, __FILE__, __LINE__, $containerId );
		}
		// check if option type can be used by this method
		if ((isset ( $this->containers [$containerId] ['type'] )) && ($this->containers [$containerId] ['type'] === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::WIDGET)) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::WRONG_CONTAINER_TYPE_FOR_THIS_METHOD, __FILE__, __LINE__, $containerId );
		}
		// delete options from database
		if ((isset ( $this->containers [$containerId] ['type'] )) && (($this->containers [$containerId] ['type'] === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_SITE) || ($this->containers [$containerId] ['type'] === \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::DATA_SET_NETWORK))) {
			global $wpdb;
			$wpdb->query ( 'DROP TABLE ' . $this->containers [$containerId] ['tablename'] );
		} else {
			\KocujIL\V12a\Classes\DbDataHelper::getInstance ()->deleteOption ( $this->containers [$containerId] ['dbkey'], (isset ( $this->containers [$containerId] ['type'] )) ? $this->changeContainerTypeToArea ( $this->containers [$containerId] ['type'] ) : \KocujIL\V12a\Enums\Area::SITE );
		}
	}
	
	/**
	 * Remove all containers from database
	 *
	 * @access public
	 * @return void
	 */
	public function removeAllContainersFromDb() {
		// remove all containers from database
		foreach ( $this->containers as $containerId => $containerData ) {
			try {
				$this->removeContainerFromDb ( $containerId );
			} catch ( \KocujIL\V12a\Classes\Exception $e ) {
			}
		}
	}
	
	/**
	 * Load container for widget
	 *
	 * @access public
	 * @param string $containerId
	 *        	Option container identifier
	 * @param array $options
	 *        	Options
	 * @return void
	 */
	public function loadContainerForWidget($containerId, array $options) {
		// check if this container identifier exists
		if (! isset ( $this->containers [$containerId] )) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::CONTAINER_ID_DOES_NOT_EXIST, __FILE__, __LINE__, $containerId );
		}
		// check if option type can be used by this method
		if ((! isset ( $this->containers [$containerId] ['type'] )) || ((isset ( $this->containers [$containerId] ['type'] )) && ($this->containers [$containerId] ['type'] !== \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::WIDGET))) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\All\Options\ExceptionCode::WRONG_CONTAINER_TYPE_FOR_THIS_METHOD, __FILE__, __LINE__, $containerId );
		}
		// load container for widget
		$this->options [$containerId] = array (
				'options' => $options,
				'alloptions' => $options,
				'loaded' => true 
		);
		// change options based on options definitions
		$this->changeOptionsByDefinitions ( $containerId, true );
	}
}
