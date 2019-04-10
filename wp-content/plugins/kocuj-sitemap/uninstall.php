<?php

/**
 * uninstall.php
 *
 * @author Dominik Kocuj
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2 or later
 * @copyright Copyright (c) 2013-2018 kocuj.pl
 * @package kocuj_sitemap
 */

// set namespace
namespace KocujSitemapPlugin;

// set namespaces aliases
use KocujIL\V12a as KocujIL;

// security
if ((! defined('ABSPATH')) || ((isset($_SERVER['SCRIPT_FILENAME'])) && (basename($_SERVER['SCRIPT_FILENAME']) === basename(__FILE__)))) {
    header('HTTP/1.1 404 Not Found');
    die();
}

// initialize plugin
include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'kocuj-sitemap.php';
\KocujSitemapPlugin\Classes\Base::getInstance()->init();
// purge cache
try {
    \KocujSitemapPlugin\Classes\Cache::getInstance()->purgeCache();
} catch (\Exception $e) {}
// uninstall plugin
\KocujSitemapPlugin\Classes\Base::getInstance()->getKocujILObj()
    ->get('plugin-uninstall', KocujIL\Enums\ProjectCategory::BACKEND)
    ->uninstall();
