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
namespace KocujIL\V12a\Classes\Project\Components\Backend\PageUninstall;

// security
if ((! defined ( 'ABSPATH' )) || ((isset ( $_SERVER ['SCRIPT_FILENAME'] )) && (basename ( $_SERVER ['SCRIPT_FILENAME'] ) === basename ( __FILE__ )))) {
	header ( 'HTTP/1.1 404 Not Found' );
	die ();
}

/**
 * Uninstall page class
 *
 * @access public
 */
class Component extends \KocujIL\V12a\Classes\ComponentObject {
	
	/**
	 * Options container id
	 *
	 * @access private
	 * @var string
	 */
	private $optionsContainerId = '';
	
	/**
	 * Option identifier
	 *
	 * @access private
	 * @var string
	 */
	private $optionId = '';
	
	/**
	 * Get form id
	 *
	 * @access public
	 * @param object $componentObj
	 *        	Component object
	 * @return string Form id
	 */
	public static function getFormId($componentObj) {
		// exit
		return $componentObj->getComponent ( 'project-helper' )->getPrefix () . '__uninstall__' . $componentObj->getOptionsContainerId ();
	}
	
	/**
	 * Set options container identifier
	 *
	 * @access public
	 * @param string $optionsContainerId
	 *        	Options container identifier
	 * @param string $optionId
	 *        	Option identifier
	 * @return void
	 */
	public function setOption($optionsContainerId, $optionId) {
		// optionally remove old uninstall option
		if ((isset ( $this->optionsContainerId [0] ) /* strlen($this->optionsContainerId) > 0 */ ) && (isset ( $this->optionId [0] ) /* strlen($this->optionId) > 0 */ )) {
			$this->getComponent ( 'options', \KocujIL\V12a\Enums\ProjectCategory::ALL )->removeDefinition ( $this->optionsContainerId, $this->optionId );
			$def = $this->getComponent ( 'options', \KocujIL\V12a\Enums\ProjectCategory::ALL )->getDefinitions ( $this->optionsContainerId );
			if (count ( $def ) === 0) {
				$this->getComponent ( 'options', \KocujIL\V12a\Enums\ProjectCategory::ALL )->removeContainer ( $this->optionsContainerId );
			}
		}
		// set values
		$this->optionsContainerId = $optionsContainerId;
		$this->optionId = $optionId;
		// set uninstall option
		$containerExists = $this->getComponent ( 'options', \KocujIL\V12a\Enums\ProjectCategory::ALL )->checkContainer ( $optionsContainerId );
		if (! $containerExists) {
			$this->getComponent ( 'options', \KocujIL\V12a\Enums\ProjectCategory::ALL )->addContainer ( $optionsContainerId, \KocujIL\V12a\Enums\OptionAutoload::NO, \KocujIL\V12a\Enums\Project\Components\All\Options\ContainerType::NETWORK );
		}
		$this->getComponent ( 'options', \KocujIL\V12a\Enums\ProjectCategory::ALL )->addDefinition ( $optionsContainerId, $optionId, 'checkbox', '1', sprintf ( $this->getStrings ( 'page-uninstall', \KocujIL\V12a\Enums\ProjectCategory::BACKEND )->getString ( 'SET_OPTION_CHECKBOX_LABEL' ), $this->getProjectObj ()->getMainSettingTitleOriginal () ) );
		// set uninstall form
		$formId = self::getFormId ( $this );
		if ($this->getComponent ( 'settings-form', \KocujIL\V12a\Enums\ProjectCategory::BACKEND )->checkForm ( $formId )) {
			$this->getComponent ( 'settings-form', \KocujIL\V12a\Enums\ProjectCategory::BACKEND )->removeForm ( $formId );
		}
		$this->getComponent ( 'settings-form', \KocujIL\V12a\Enums\ProjectCategory::BACKEND )->addForm ( $formId, $optionsContainerId, array (
				'uninstall' 
		), array (
				'issubmit' => true,
				'submitlabel' => $this->getStrings ( 'page-uninstall', \KocujIL\V12a\Enums\ProjectCategory::BACKEND )->getString ( 'SET_OPTION_UNINSTALL_LABEL' ),
				'submittooltip' => $this->getStrings ( 'page-uninstall', \KocujIL\V12a\Enums\ProjectCategory::BACKEND )->getString ( 'SET_OPTION_UNINSTALL_TOOLTIP' ) 
		) );
		// get form identifier
		$formId = self::getFormId ( $this );
		// add tabs to form
		$this->getComponent ( 'settings-form', \KocujIL\V12a\Enums\ProjectCategory::BACKEND )->addTab ( $formId, 'uninstall' );
		// add fields to form
		$this->getComponent ( 'settings-form', \KocujIL\V12a\Enums\ProjectCategory::BACKEND )->addHtmlToTab ( $formId, 'uninstall', sprintf ( $this->getStrings ( 'page-uninstall', \KocujIL\V12a\Enums\ProjectCategory::BACKEND )->getString ( 'SHOW_PAGE_TEXT' ), $this->getProjectObj ()->getMainSettingTitleOriginal () ) );
		/* translators: %s: Name of this plugin ("Kocuj Sitemap") */
		$this->getComponent ( 'settings-form', \KocujIL\V12a\Enums\ProjectCategory::BACKEND )->addOptionFieldToTab ( $formId, 'uninstall', 'checkbox', $this->optionId, sprintf ( $this->getStrings ( 'page-uninstall', \KocujIL\V12a\Enums\ProjectCategory::BACKEND )->getString ( 'SHOW_PAGE_CHECKBOX_TOOLTIP' ), $this->getProjectObj ()->getMainSettingTitleOriginal () ) );
	}
	
	/**
	 * Get options container identifier
	 *
	 * @access public
	 * @return string Options container identifier
	 */
	public function getOptionsContainerId() {
		// exit
		return $this->optionsContainerId;
	}
	
	/**
	 * Get option identifier
	 *
	 * @access public
	 * @return string Option identifier
	 */
	public function getOptionId() {
		// exit
		return $this->optionId;
	}
	
	/**
	 * Show page with uninstalling settings
	 *
	 * @access public
	 * @return void
	 */
	public function showPage() {
		// show form
		$this->getComponent ( 'settings-form', \KocujIL\V12a\Enums\ProjectCategory::BACKEND )->showForm ();
	}
}
