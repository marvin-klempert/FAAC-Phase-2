<?php
/**
 * Registers a theme settings page for ACF
 */
if( function_exists('acf_add_options_page') ):

  // Adds the main Theme Settings options page and subpages
  acf_add_options_page(array(
    'page_title'  => 'Theme Settings',
    'menu_title'  => 'Theme Settings',
    'menu_slug'   => 'theme-settings',
    'capability'  => 'edit_posts',
    'icon_url'    => 'dashicons-forms',
    'position'    => 40,
    'redirect'    => true
  ));
    acf_add_options_sub_page(array(
      'page_title'  => 'Theme Defaults',
      'menu_title'  => 'Theme Defaults',
      'parent_slug' => 'theme-settings',
    ));
    acf_add_options_sub_page(array(
      'page_title'  => 'Calls to Action',
      'menu_title'  => 'Calls to Action',
      'parent_slug' => 'theme-settings',
    ));
    acf_add_options_sub_page(array(
      'page_title'  => 'Photo Promotions',
      'menu_title'  => 'Photo Promotions',
      'parent_slug' => 'theme-settings',
    ));
    acf_add_options_sub_page(array(
      'page_title'  => 'Video Promotions',
      'menu_title'  => 'Video Promotions',
      'parent_slug' => 'theme-settings',
    ));
    acf_add_options_sub_page(array(
      'page_title'  => 'Footer Promotions',
      'menu_title'  => 'Footer Promotions',
      'parent_slug' => 'theme-settings',
    ));
    acf_add_options_sub_page(array(
      'page_title'  => 'Sectors',
      'menu_title'  => 'Sectors',
      'parent_slug' => 'theme-settings',
    ));

  // Adds the Divisions settings pages and subpages
  acf_add_options_page(array(
    'page_title'  => 'Division Settings',
    'menu_title'  => 'Division Settings',
    'menu_slug'   => 'division-settings',
    'capability'  => 'edit_posts',
    'icon_url'    => 'dashicons-shield',
    'position'    => 41,
    'redirect'    => true
  ));
    acf_add_options_sub_page(array(
      'page_title'  => 'FAAC Commercial',
      'menu_title'  => 'FAAC Commercial',
      'parent_slug' => 'division-settings',
    ));
    acf_add_options_sub_page(array(
      'page_title'  => 'FAAC Military',
      'menu_title'  => 'FAAC Military',
      'parent_slug' => 'division-settings',
    ));
    acf_add_options_sub_page(array(
      'page_title'  => 'MILO Range',
      'menu_title'  => 'MILO Range',
      'parent_slug' => 'division-settings',
    ));
    acf_add_options_sub_page(array(
      'page_title'  => 'RTI',
      'menu_title'  => 'RTI',
      'parent_slug' => 'division-settings',
    ));

  // Adds the Categories settings pages and subpages
  acf_add_options_page(array(
    'page_title'  => 'Category Settings',
    'menu_title'  => 'Category Settings',
    'menu_slug'   => 'category-settings',
    'capability'  => 'edit_posts',
    'icon_url'    => 'dashicons-shield-alt',
    'position'    => 42,
    'redirect'    => true
  ));
    acf_add_options_sub_page(array(
      'page_title'  => 'Global Settings',
      'menu_title'  => 'Global Settings',
      'parent_slug' => 'category-settings',
    ));
    acf_add_options_sub_page(array(
      'page_title'  => 'Military',
      'menu_title'  => 'Military',
      'parent_slug' => 'category-settings',
    ));
    acf_add_options_sub_page(array(
      'page_title'  => 'Use of Force',
      'menu_title'  => 'Use of Force',
      'parent_slug' => 'category-settings',
    ));
    acf_add_options_sub_page(array(
      'page_title'  => 'Public Safety',
      'menu_title'  => 'Public Safety',
      'parent_slug' => 'category-settings',
    ));
    acf_add_options_sub_page(array(
      'page_title'  => 'Transportation',
      'menu_title'  => 'Transportation',
      'parent_slug' => 'category-settings',
    ));
    acf_add_options_sub_page(array(
      'page_title'  => 'Research',
      'menu_title'  => 'Research',
      'parent_slug' => 'category-settings',
    ));
    acf_add_options_sub_page(array(
      'page_title'  => 'Maritime',
      'menu_title'  => 'Maritime',
      'parent_slug' => 'category-settings',
    ));
else:
  add_action( 'admin_notices', 'fwd_install_acf_notice' );
endif;

/**
 * If ACF is not installed, show an alert
 */
function fwd_install_acf_notice() {
  ?>
  <div class="notice notice-error">
    <p>
      This theme requires Advanced Custom Fields PRO to function properly. If you have not installed it, you can download it from your ACF <a href="https://www.advancedcustomfields.com/my-account/" target="_blank" rel="noopener noreferrer">account dashboard</a>. If you've installed it but have not activated it yet, you can do so from your <a href="<?php echo get_admin_url() . '/plugins.php'; ?> ">Plugins page</a>.
    </p>
  </div>
  <?php
}