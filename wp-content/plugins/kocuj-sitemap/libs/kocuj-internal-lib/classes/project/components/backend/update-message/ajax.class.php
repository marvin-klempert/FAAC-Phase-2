<?php

/**
 * ajax.class.php
 *
 * @author Dominik Kocuj
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2 or later
 * @copyright Copyright (c) 2016-2018 kocuj.pl
 * @package kocuj_internal_lib
 */

// set namespace
namespace KocujIL\V12a\Classes\Project\Components\Backend\UpdateMessage;

// security
if ((! defined ( 'ABSPATH' )) || ((isset ( $_SERVER ['SCRIPT_FILENAME'] )) && (basename ( $_SERVER ['SCRIPT_FILENAME'] ) === basename ( __FILE__ )))) {
	header ( 'HTTP/1.1 404 Not Found' );
	die ();
}

/**
 * Update message AJAX class
 *
 * @access public
 */
class Ajax extends \KocujIL\V12a\Classes\ComponentObject {
	
	/**
	 * Action for displaying update message
	 *
	 * @access public
	 * @return void
	 */
	public function actionAjaxDisplay() {
		// check AJAX nonce
		check_ajax_referer ( \KocujIL\V12a\Classes\Helper::getInstance ()->getPrefix () . '__version_info', 'security' );
		// check versions of project
		if ((! isset ( $_POST ['projectVersionFrom'] )) || (! isset ( $_POST ['projectVersionTo'] ))) {
			wp_die ();
		}
		// get information
		$information = $this->getComponent ( 'update-message', \KocujIL\V12a\Enums\ProjectCategory::BACKEND )->getMessage ( $_POST ['projectVersionFrom'] );
		// show information
		if ($information !== false) {
			echo str_replace ( '%2$s', $_POST ['projectVersionTo'], str_replace ( '%1$s', $_POST ['projectVersionFrom'], $information ) );
		}
		// close message
		$this->actionAjaxClose ();
	}
	
	/**
	 * Action for close update message
	 *
	 * @access public
	 * @return void
	 */
	public function actionAjaxClose() {
		// check AJAX nonce
		check_ajax_referer ( \KocujIL\V12a\Classes\Helper::getInstance ()->getPrefix () . '__version_info', 'security' );
		// close message
		$this->getComponent ( 'meta' )->addOrUpdate ( Component::getOptionNameLastUpdateMessageVersion (), $this->getComponent ( 'version', \KocujIL\V12a\Enums\ProjectCategory::ALL )->getCurrentVersion () );
		// close connection
		wp_die ();
	}
}
