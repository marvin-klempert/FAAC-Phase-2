<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

/**
 * Generate breadcrumbs
 * @author CodexWorld
 * @authorURL www.codexworld.com
 */
function get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        the_category(' &bull; ');
            if (is_single()) {
                echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
                the_title();
            }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}

/**
 * Registers ACF widgets
 */
add_filter( 'acfw_include_widgets', 'add_include_widgets' );
function add_include_widgets(){
  $acfw_widgets = array(
    array(
      'title' => 'Copyright Footer',
      'description' => 'Necessary copyright info and links',
      'slug' => 'copyright-footer',
      'id' => 'Copyright_Footer',
    ),
    array(
      'title' => 'Contact Info Blocks',
      'description' => 'Contact info from social media, physical address, etc.',
      'slug' => 'contact-info-blocks',
      'id' => 'Contact_Info_Blocks',
    ),
    array(
      'title' => 'Division Logo Grid',
      'description' => 'A grid of linked division logos',
      'slug' => 'division-logo-grid',
      'id' => 'Division_Logo_Grid',
    ),
    array(
      'title' => 'Masthead and Buttons',
      'description' => 'Shows a footer logo with link buttons',
      'slug' => 'masthead-buttons',
      'id' => 'Masthead_Buttons',
    ),
    array(
      'title' => 'Newsletter Signup',
      'description' => 'A simple newsletter signup form',
      'slug' => 'newsletter-signup',
      'id' => 'Newsletter_Signup',
    ),
  );
  return $acfw_widgets;
}
add_filter( 'acfw_custom_template_dir', 'my_acfw_custom_directory' );
function my_acfw_custom_directory( $template_dir ){
  $template_dir = get_stylesheet_directory() . '/widgets/';
  return $template_dir;
}

add_filter('wp_mail_from', 'change_default_email');
add_filter('wp_mail_from_name', 'change_default_email_from_name');
 
function change_default_email($default_email) {
return 'noreply@faac.com';
}
function change_default_email_from_name($default_name) {
return 'FAAC Incorporated';
}

/*
 * Yoast SEO Disable Automatic Redirects for
 * Posts And Pages
 * Credit: Yoast Development Team
 * Last Tested: May 09 2017 using Yoast SEO Premium 4.7.1 on WordPress 4.7.4
 */

add_filter('wpseo_premium_post_redirect_slug_change', '__return_true' );

/*
 * Yoast SEO Disable Automatic Redirects for
 * Taxonomies (Category, Tags, Etc)
 * Credit: Yoast Development Team
 * Last Tested: May 09 2017 using Yoast SEO Premium 4.7.1 on WordPress 4.7.4
 */

add_filter('wpseo_premium_term_redirect_slug_change', '__return_true' );