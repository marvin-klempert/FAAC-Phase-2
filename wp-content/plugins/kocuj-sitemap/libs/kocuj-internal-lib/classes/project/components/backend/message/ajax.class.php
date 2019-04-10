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
namespace KocujIL\V12a\Classes\Project\Components\Backend\Message;

// security
if ((! defined ( 'ABSPATH' )) || ((isset ( $_SERVER ['SCRIPT_FILENAME'] )) && (basename ( $_SERVER ['SCRIPT_FILENAME'] ) === basename ( __FILE__ )))) {
	header ( 'HTTP/1.1 404 Not Found' );
	die ();
}

/**
 * Message AJAX class
 *
 * @access public
 */
class Ajax extends \KocujIL\V12a\Classes\ComponentObject {
	
	/**
	 * Action for closing message window
	 *
	 * @access public
	 * @return void
	 */
	public function actionAjaxClose() {
		// check AJAX nonce
		check_ajax_referer ( \KocujIL\V12a\Classes\Helper::getInstance ()->getPrefix () . '__message', 'security' );
		// get message
		if (! isset ( $_POST ['messageId'] )) {
			wp_die ();
		}
		$id = $_POST ['messageId'];
		$transientId = 'kocuj_il_' . \KocujIL\V12a\Classes\Version::getInstance ()->getVersionInternal () . '_messages_close';
		$messages = \KocujIL\V12a\Classes\DbDataHelper::getInstance ()->getTransient ( $transientId );
		if ($messages === false) {
			wp_die ();
		}
		$messages = maybe_unserialize ( $messages );
		if (! isset ( $messages [$id] )) {
			wp_die ();
		}
		$message = $messages [$id];
		// check user permissions
		if ((isset ( $message ['permissions'] )) && (! \KocujIL\V12a\Classes\Helper::getInstance ()->checkCurrentPermissions ( $message ['permissions'] ))) {
			wp_die ();
		}
		// optionally execute message closing callback
		if (isset ( $message ['closecallback'] )) {
			call_user_func_array ( $message ['closecallback'], array (
					$id 
			) );
		}
		// close message
		$this->getComponent ( 'meta' )->addOrUpdate ( Component::getOptionNameMessageClosed () . '__' . $id, '1' );
		// delete message from transient
		\KocujIL\V12a\Classes\DbDataHelper::getInstance ()->unmergeTransientArray ( $transientId, $id, 3600 );
		// close connection
		wp_die ();
	}
}
