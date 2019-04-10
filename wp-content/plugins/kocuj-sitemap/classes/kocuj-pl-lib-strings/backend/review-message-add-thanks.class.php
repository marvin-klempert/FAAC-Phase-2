<?php

/**
 * review-message-add-thanks.class.php
 *
 * @author Dominik Kocuj
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2 or later
 * @copyright Copyright (c) 2013-2018 kocuj.pl
 * @package kocuj_sitemap
 */

// set namespace
namespace KocujSitemapPlugin\Classes\KocujPlLibStrings\Backend;

// security
if ((! defined('ABSPATH')) || ((isset($_SERVER['SCRIPT_FILENAME'])) && (basename($_SERVER['SCRIPT_FILENAME']) === basename(__FILE__)))) {
    header('HTTP/1.1 404 Not Found');
    die();
}

/**
 * \KocujPlLib\V12a\Classes\Project\Components\Backend\ReviewMessageAddThanks classes strings
 *
 * @access public
 */
class ReviewMessageAddThanks implements \KocujIL\V12a\Interfaces\Strings
{

    /**
     * Singleton instance
     *
     * @access private
     * @var object
     */
    private static $instance = NULL;

    /**
     * Constructor
     *
     * @access private
     * @return void
     */
    private function __construct()
    {}

    /**
     * Disable cloning of object
     *
     * @access private
     * @return void
     */
    private function __clone()
    {}

    /**
     * Get singleton instance
     *
     * @access public
     * @return object Singleton instance
     */
    public static function getInstance()
    {
        // optionally create new instance
        if (! self::$instance) {
            self::$instance = new self();
        }
        // exit
        return self::$instance;
    }

    /**
     * Get string
     *
     * @access public
     * @param string $id
     *            String id
     * @return string Output string
     */
    public function getString($id)
    {
        // get string
        $texts = array(
            'FILTER_REVIEW_MESSAGE_ELEMENTS_BEFORE_ADD_THANKS' => __('Send your website address to author', 'kocuj-sitemap')
        );
        // exit
        return (isset($texts[$id])) ? $texts[$id] : '';
    }
}
