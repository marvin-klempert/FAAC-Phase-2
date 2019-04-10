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
namespace KocujIL\V12a\Classes\Project\Components\Backend\License;

// security
if ((! defined ( 'ABSPATH' )) || ((isset ( $_SERVER ['SCRIPT_FILENAME'] )) && (basename ( $_SERVER ['SCRIPT_FILENAME'] ) === basename ( __FILE__ )))) {
	header ( 'HTTP/1.1 404 Not Found' );
	die ();
}

/**
 * License class
 *
 * @access public
 */
class Component extends \KocujIL\V12a\Classes\ComponentObject {
	
	/**
	 * License is set to be displayed (true) or license will not be displayed (false)
	 *
	 * @access private
	 * @var bool
	 */
	private $licenseDisplay = false;
	
	/**
	 * Get license filename
	 *
	 * @access public
	 * @return string License filename; if license file does not exist, it returns empty string
	 */
	public function getLicenseFilename() {
		// get license filename
		$language = get_locale ();
		if ((isset ( $language [0] ) /* strlen($language) > 0 */ ) && (is_file ( $this->getComponent ( 'dirs' )->getProjectDir () . DIRECTORY_SEPARATOR . 'license-' . $language . '.txt' ))) {
			$licenseFilename = 'license-' . $language . '.txt';
		} else {
			$licenseFilename = 'license.txt';
			if (! is_file ( $this->getComponent ( 'dirs' )->getProjectDir () . DIRECTORY_SEPARATOR . $licenseFilename )) {
				throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\Backend\License\ExceptionCode::LICENSE_FILE_DOES_NOT_EXIST, __FILE__, __LINE__ );
			}
		}
		// exit
		return $licenseFilename;
	}
	
	/**
	 * Get license script
	 *
	 * @access private
	 * @return string License script
	 */
	private function getLicenseScript() {
		// optionally add window
		$value = $this->getComponent ( 'window', \KocujIL\V12a\Enums\ProjectCategory::ALL )->checkWindow ( 'license' );
		if (! $value) {
			$this->getComponent ( 'window', \KocujIL\V12a\Enums\ProjectCategory::ALL )->addWindow ( 'license', $this->getStrings ( 'license', \KocujIL\V12a\Enums\ProjectCategory::BACKEND )->getString ( 'GET_LICENSE_SCRIPT_LICENSE_TITLE' ), 400, 400, \KocujIL\V12a\Enums\Project\Components\All\Window\Type::AJAX, array (
					'url' => admin_url ( 'admin-ajax.php' ),
					'ajaxdata' => array (
							'action' => $this->getComponent ( 'project-helper' )->getPrefix () . '__license_display',
							'security' => wp_create_nonce ( \KocujIL\V12a\Classes\Helper::getInstance ()->getPrefix () . '__license' ) 
					),
					'contentcss' => array (
							'font-family' => '"Courier New", Courier, monospace',
							'text-align' => 'center' 
					) 
			) );
		}
		// exit
		return $this->getComponent ( 'window', \KocujIL\V12a\Enums\ProjectCategory::ALL )->getWindowJsCode ( 'license' );
	}
	
	/**
	 * Get license link or just name if license file does not exist
	 *
	 * @access public
	 * @return string License link or just name if license file does not exist
	 */
	public function getLicenseLink() {
		// get license link or name
		$licenseFilename = $this->getLicenseFilename ();
		if (isset ( $licenseFilename [0] ) /* strlen($licenseFilename) > 0 */ ) {
			// set license to display
			$this->licenseDisplay = true;
			// set HTML identifier
			$id = $this->getComponent ( 'project-helper' )->getPrefix () . '__licenselink_' . $this->getProjectObj ()->getMainSettingInternalName () . '_' . rand ( 111111, 999999 );
			// exit
			return \KocujIL\V12a\Classes\HtmlHelper::getInstance ()->getLink ( '#', $this->getProjectObj ()->getMainSettingLicenseName (), array (
					'id' => $id,
					'styleclassfilter' => array (
							'projectobj' => $this->getProjectObj (),
							'filter' => 'license_link' 
					) 
			) ) . '<script type="text/javascript">' . PHP_EOL . '/* <![CDATA[ */' . PHP_EOL . '(function($) {' . PHP_EOL . '$(document).ready(function() {' . PHP_EOL . '$(\'' . esc_js ( '#' . $id ) . '\').attr(\'href\', \'javascript:void(0);\');' . PHP_EOL . '$(\'' . esc_js ( '#' . $id ) . '\').click(function(event) {' . PHP_EOL . 'event.preventDefault();' . PHP_EOL . $this->getLicenseScript () . PHP_EOL . '});' . PHP_EOL . '});' . PHP_EOL . '}(jQuery));' . PHP_EOL . '/* ]]> */' . PHP_EOL . '</script>' . PHP_EOL;
		} else {
			// exit
			return $this->getProjectObj ()->getMainSettingLicenseName ();
		}
	}
}
