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
namespace KocujIL\V12a\Classes\Project\Components\Backend\UpdateMessage;

// security
if ((! defined ( 'ABSPATH' )) || ((isset ( $_SERVER ['SCRIPT_FILENAME'] )) && (basename ( $_SERVER ['SCRIPT_FILENAME'] ) === basename ( __FILE__ )))) {
	header ( 'HTTP/1.1 404 Not Found' );
	die ();
}

/**
 * Update message class
 *
 * @access public
 */
class Component extends \KocujIL\V12a\Classes\ComponentObject {
	
	/**
	 * Update messages
	 *
	 * @access private
	 * @var array
	 */
	private $updateMessage = array ();
	
	/**
	 * Dividing string for multiple messages for one version update
	 *
	 * @access private
	 * @var string
	 */
	private $divideString = '<br /><br /><hr /><br />';
	
	/**
	 * Message will be displayed (true) or not (false)
	 *
	 * @access private
	 * @var bool
	 */
	private $messageDisplay = array ();
	
	/**
	 * Top message will be displayed (true) or not (false)
	 *
	 * @access private
	 * @var bool
	 */
	private $topMessageDisplay = array ();
	
	/**
	 * Get option name for version for last update message
	 *
	 * @access public
	 * @return string Option name for version for last update message
	 */
	public static function getOptionNameLastUpdateMessageVersion() {
		// exit
		return 'last_update_msg_version';
	}
	
	/**
	 * Get version for last update message from database
	 *
	 * @access public
	 * @return string Version for last update message from database
	 */
	public function getLastUpdateMessageVersionOptionValue() {
		// exit
		return $this->getComponent ( 'meta' )->get ( self::getOptionNameLastUpdateMessageVersion () );
	}
	
	/**
	 * Set dividing string for multiple message for one version update
	 *
	 * @access public
	 * @param string $divideString
	 *        	Dividing string
	 * @return void
	 */
	public function setDivideString($divideString) {
		// set dividing string
		$this->divideString = $divideString;
	}
	
	/**
	 * Add message for update from the selected version
	 *
	 * @access public
	 * @param string $fromVersion
	 *        	Version from which update will show message; it can be only fragment of version number, but then it must be ended with dot character ("."), for example, "1.", "1.0.", etc.
	 * @param string $message
	 *        	Message to display
	 * @param int $useTopMessage
	 *        	Use top message with link to message to display or just show message; must be one of the following constants from \KocujIL\V12a\Enums\Project\Components\Backend\UpdateMessage\UseTopMessage: NO (when display just show message) or YES (when display top message with link to message to display) - default: \KocujIL\V12a\Enums\Project\Components\Backend\UpdateMessage\UseTopMessage::NO
	 * @return void
	 */
	public function addUpdateMessage($fromVersion, $message, $useTopMessage = \KocujIL\V12a\Enums\Project\Components\Backend\UpdateMessage\UseTopMessage::NO) {
		// set update message
		if (isset ( $this->updateMessage [$fromVersion] )) {
			$this->updateMessage [$fromVersion] ['message'] .= $this->divideString . $message;
		} else {
			$this->updateMessage [$fromVersion] = array (
					'message' => $message,
					'usetopmessage' => $useTopMessage 
			);
			uasort ( $this->updateMessage, function ($a, $b) {
				return - strcasecmp ( $a ['message'], $b ['message'] );
			} );
		}
	}
	
	/**
	 * Get messages for update data
	 *
	 * @access public
	 * @return array Messages for update data; each message for update data has the following fields: "message" (string type; update message), "usetopmessage" (int type; if set to \KocujIL\V12a\Enums\Project\Components\Backend\UpdateMessage\UseTopMessage::YES, top message will be displayed with link to update message)
	 */
	public function getMessagesForUpdate() {
		// exit
		return $this->updateMessage;
	}
	
	/**
	 * Get message or top message for update from the selected version
	 *
	 * @access private
	 * @param bool $isMessage
	 *        	Message will be returned (true) or top message (false)
	 * @param string $fromVersion
	 *        	Version from which update will show message
	 * @return bool|int|string Message text or check top message for the selected version or false if not exists
	 */
	private function getMessageOrTopMessage($isMessage, $fromVersion) {
		// initialize
		$output = '';
		// get message for version
		if (! empty ( $this->updateMessage )) {
			$index = ($isMessage) ? 'message' : 'usetopmessage';
			foreach ( $this->updateMessage as $key => $val ) {
				$addText = '';
				$keyLength = strlen ( $key );
				if ($key [$keyLength - 1] !== '.') {
					if ($key === $fromVersion) {
						if ($isMessage) {
							$addText = $val [$index];
						} else {
							return $val [$index];
						}
					}
				} else {
					if ($key === substr ( $fromVersion, 0, $keyLength )) {
						if ($isMessage) {
							$addText = $val [$index];
						} else {
							return $val [$index];
						}
					}
				}
				if (isset ( $addText [0] ) /* strlen($addText) > 0 */ ) {
					if (isset ( $output [0] ) /* strlen($output) > 0 */ ) {
						$output .= $this->divideString;
					}
					$output .= $addText;
				}
			}
		}
		// exit
		return (isset ( $output [0] ) /* strlen($output) > 0 */ ) ? $output : false;
	}
	
	/**
	 * Check if message for update from the selected version exists
	 *
	 * @access public
	 * @param string $fromVersion
	 *        	Version from which update will show message
	 * @return bool Message for update from the selected version exists (true) or not (false)
	 */
	public function checkMessage($fromVersion) {
		// get message
		$message = $this->getMessageOrTopMessage ( true, $fromVersion );
		// exit
		return (isset ( $message [0] ) /* strlen($message) > 0 */ );
	}
	
	/**
	 * Get message for update from the selected version
	 *
	 * @access public
	 * @param string $fromVersion
	 *        	Version from which update will show message
	 * @return bool|string Message for the selected version or false if not exists
	 */
	public function getMessage($fromVersion) {
		// exit
		return $this->getMessageOrTopMessage ( true, $fromVersion );
	}
	
	/**
	 * Check top message for update from the selected version
	 *
	 * @access public
	 * @param string $fromVersion
	 *        	Version from which update will show message
	 * @return bool Top message for the selected version exists (true) or not (false)
	 */
	public function checkTopMessage($fromVersion) {
		// exit
		return ($this->getMessageOrTopMessage ( false, $fromVersion ) === \KocujIL\V12a\Enums\Project\Components\Backend\UpdateMessage\UseTopMessage::YES);
	}
	
	/**
	 * Remove message for update
	 *
	 * @access public
	 * @param string $fromVersion
	 *        	Version from which update will show message
	 * @return void
	 */
	public function removeMessageForUpdate($fromVersion) {
		// check if this message for update identifier exists
		if (! isset ( $this->updateMessage [$fromVersion] )) {
			throw new \KocujIL\V12a\Classes\Exception ( $this, \KocujIL\V12a\Enums\Project\Components\Backend\UpdateMessage\ExceptionCode::UPDATE_MESSAGE_ID_DOES_NOT_EXIST, __FILE__, __LINE__, $fromVersion );
		}
		// remove message for update
		unset ( $this->updateMessage [$fromVersion] );
	}
	
	/**
	 * Action for preparing update message
	 *
	 * @access public
	 * @return void
	 */
	public function actionAdminInit() {
		// optionally show message or message about this update
		if ((current_user_can ( 'manage_network' )) || (current_user_can ( 'manage_options' ))) {
			$oldVersion = $this->getComponent ( 'version', \KocujIL\V12a\Enums\ProjectCategory::ALL )->getOldVersionOptionValue ();
			if ($oldVersion !== false) {
				$lastMsgVersion = $this->getLastUpdateMessageVersionOptionValue ();
				if (($lastMsgVersion !== $this->getComponent ( 'version', \KocujIL\V12a\Enums\ProjectCategory::ALL )->getCurrentVersion ()) && ($this->checkMessage ( $oldVersion ))) {
					// set security nonce
					$nonce = wp_create_nonce ( \KocujIL\V12a\Classes\Helper::getInstance ()->getPrefix () . '__version_info' );
					// load scripts
					$this->getComponent ( 'js-ajax', \KocujIL\V12a\Enums\ProjectCategory::ALL )->addAjaxJs ();
					\KocujIL\V12a\Classes\JsHelper::getInstance ()->addLibScript ( 'backend-update-message', 'project/components/backend/update-message', 'update-message', array (
							'helper' 
					), array (
							\KocujIL\V12a\Classes\Helper::getInstance ()->getPrefix () . '-all-js-ajax',
							\KocujIL\V12a\Classes\Helper::getInstance ()->getPrefix () . '-all-window' 
					), 'kocujILV12aBackendUpdateMessageVals', array (
							'prefix' => \KocujIL\V12a\Classes\Helper::getInstance ()->getPrefix (),
							'security' => $nonce 
					) );
					// add window
					$this->getComponent ( 'window', \KocujIL\V12a\Enums\ProjectCategory::ALL )->addWindow ( 'update_message', sprintf ( $this->getStrings ( 'update-message', \KocujIL\V12a\Enums\ProjectCategory::BACKEND )->getString ( 'ACTION_ADMIN_INIT_WINDOW_TITLE' ), $this->getComponent ( 'version', \KocujIL\V12a\Enums\ProjectCategory::ALL )->getCurrentVersion () ), 400, 400, \KocujIL\V12a\Enums\Project\Components\All\Window\Type::AJAX, array (
							'url' => admin_url ( 'admin-ajax.php' ),
							'ajaxdata' => array (
									'action' => $this->getComponent ( 'project-helper' )->getPrefix () . '__update_message_display',
									'security' => $nonce,
									'projectVersionFrom' => $oldVersion,
									'projectVersionTo' => $this->getComponent ( 'version', \KocujIL\V12a\Enums\ProjectCategory::ALL )->getCurrentVersion () 
							) 
					) );
					// check if display top message
					$isTopMessage = $this->checkTopMessage ( $oldVersion );
					// set message to display
					$this->messageDisplay = true;
					$this->topMessageDisplay = $isTopMessage;
					// optionally show top message
					if ($isTopMessage) {
						if ($this->getProjectObj ()->getMainSettingType () === \KocujIL\V12a\Enums\ProjectType::PLUGIN) {
							$message = $this->getStrings ( 'update-message', \KocujIL\V12a\Enums\ProjectCategory::BACKEND )->getString ( 'ACTION_ADMIN_INIT_TOP_MESSAGE_PLUGIN' );
						} else {
							$message = $this->getStrings ( 'update-message', \KocujIL\V12a\Enums\ProjectCategory::BACKEND )->getString ( 'ACTION_ADMIN_INIT_TOP_MESSAGE_THEME' );
						}
						$this->getComponent ( 'message', \KocujIL\V12a\Enums\ProjectCategory::BACKEND )->addMessageForAllPages ( 'update_message', sprintf ( $message, $this->getProjectObj ()->getMainSettingTitleOriginal (), \KocujIL\V12a\Classes\HtmlHelper::getInstance ()->getLinkBegin ( '#', array (
								'id' => $this->getComponent ( 'project-helper' )->getPrefix () . '__update_message_link' 
						) ), \KocujIL\V12a\Classes\HtmlHelper::getInstance ()->getLinkEnd () ), \KocujIL\V12a\Enums\Project\Components\Backend\Message\Type::INFORMATION, \KocujIL\V12a\Enums\Project\Components\Backend\Message\Closable::CLOSABLE_TEMPORARY );
					}
				} else {
					// add information that message has been displayed
					$this->getComponent ( 'meta' )->addOrUpdate ( self::getOptionNameLastUpdateMessageVersion (), $this->getComponent ( 'version', \KocujIL\V12a\Enums\ProjectCategory::ALL )->getCurrentVersion () );
				}
			}
		}
	}
	
	/**
	 * Action for displaying update message
	 *
	 * @access public
	 * @return void
	 */
	public function actionPrintFooterScripts() {
		// initialize message script
		if (! empty ( $this->messageDisplay )) {
			?>
<script type="text/javascript">
				/* <![CDATA[ */
					(function($) {
						$(document).ready(function() {
							kocujILV12aBackendUpdateMessage.addProject('<?php echo esc_js($this->getProjectObj()->getMainSettingInternalName()); ?>');
							<?php if ($this->topMessageDisplay) : ?>
								$('#<?php echo esc_js($this->getComponent('project-helper')->getPrefix().'__update_message_link'); ?>').click(function() {
									<?php echo $this->getComponent('window', \KocujIL\V12a\Enums\ProjectCategory::ALL)->getWindowJsCode('update_message'); ?>
								});
								$('#<?php echo esc_js($this->getComponent('project-helper')->getPrefix().'__message_update_message'); ?> .notice-dismiss').click(function() {
									kocujILV12aBackendUpdateMessage.sendCloseEvent('<?php echo esc_js($this->getProjectObj()->getMainSettingInternalName()); ?>');
								});
							<?php else : ?>
								<?php echo $this->getComponent('window', \KocujIL\V12a\Enums\ProjectCategory::ALL)->getWindowJsCode('update_message'); ?>
							<?php endif; ?>
						});
					}(jQuery));
				/* ]]> */
				</script>
<?php
		}
	}
}
