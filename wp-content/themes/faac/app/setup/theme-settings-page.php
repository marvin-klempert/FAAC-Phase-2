<?php
/**
 * Registers a theme settings page for ACF
 */
if( function_exists('acf_add_options_page') ):
  acf_add_options_page(array(
    'page_title'  => 'Theme Settings',
    'menu_title'  => 'Theme Settings',
    'menu_slug'   => 'theme-settings',
    'capability'  => 'edit_posts',
    'redirect'    => false,
    'position'    => '59.9',
    'icon_url'    => 'dashicons-index-card'
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