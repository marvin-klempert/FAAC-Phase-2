<?php
/*
Plugin Name: FAAC Landing Pages
Plugin URI: http://designfwd.com/
Description: Adds landing page templates
Version: 0.1
Author: FWD Creative, LLC
Author URI: http://designfwd.com/

License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl.html
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * Because FAAC uses an old version of Sage, this plugin is just for scripts and styles. :(
 */
// require 'app/classes/page-templater.php';

// HACK: Instead, we're going to override a local template
function faac_landing_page_swap( $path, $file = '' ) {
    if( 'template-simcreator-dx.php' === $file ) {
        // change path here as required
        return plugin_dir_path( __FILE__ ) . 'page-templates/simcreator-dx.php';
    }
    return $path;
}
add_filter( 'theme_file_path', 'faac_landing_page_swap', 20, 2 );
