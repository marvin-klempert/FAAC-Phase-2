<?php

/**
 * home.class.php
 *
 * @author Dominik Kocuj
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2 or later
 * @copyright Copyright (c) 2013-2018 kocuj.pl
 * @package kocuj_sitemap
 */

// set namespace
namespace KocujSitemapPlugin\Classes\ElementType\Backend;

// set namespaces aliases
use KocujIL\V12a as KocujIL;

// security
if ((! defined('ABSPATH')) || ((isset($_SERVER['SCRIPT_FILENAME'])) && (basename($_SERVER['SCRIPT_FILENAME']) === basename(__FILE__)))) {
    header('HTTP/1.1 404 Not Found');
    die();
}

/**
 * Home type administration panel class
 *
 * @access public
 */
class Home extends \KocujSitemapPlugin\Classes\ElementTypeBackendParent
{

    /**
     * Add link to homepage to sitemap
     *
     * @access public
     * @param string $locale
     *            Language locale - default: empty
     * @return array Output array
     */
    public function getElementArray($locale = '')
    {
        // initialize
        \KocujSitemapPlugin\Classes\Sitemap::getInstance()->setHomeLinkTextPos(- 1);
        $array = array();
        // add link to homepage to sitemap
        $value = \KocujSitemapPlugin\Classes\Options::getInstance()->getOption('LinkToMainSite');
        if ($value === '1') {
            \KocujSitemapPlugin\Classes\MultipleLanguages::getInstance()->doSomething('beforegethomeurl', $locale);
            $url = \KocujSitemapPlugin\Classes\Helpers\Url::getInstance()->removeProtocolLocal(\KocujSitemapPlugin\Classes\MultipleLanguages::getInstance()->getItem('homeurl', $locale, get_home_url()));
            $link = KocujIL\Classes\HtmlHelper::getInstance()->getLinkBegin($url);
            $homeLinkTextPos = strlen($link);
            $link .= '</a>';
            $link = apply_filters('kocujsitemap_element', $link, 0, 'home', $locale);
            $homeLinkTextPos = apply_filters('kocujsitemap_element_home_link_text_position', $homeLinkTextPos, $link, $locale);
            $array = array(
                array(
                    'tp' => 'home',
                    'lk' => $link,
                    'ur' => $url
                )
            );
            \KocujSitemapPlugin\Classes\MultipleLanguages::getInstance()->doSomething('aftergethomeurl', $locale);
            \KocujSitemapPlugin\Classes\Sitemap::getInstance()->setHomeLinkTextPos($homeLinkTextPos);
        }
        // exit
        return $array;
    }

    /**
     * Get administration cache filters
     *
     * @access public
     * @return array Administration cache filters
     */
    public function getAdminCacheFilters()
    {
        // exit
        return array(
            'whitelist_options'
        );
    }
}
