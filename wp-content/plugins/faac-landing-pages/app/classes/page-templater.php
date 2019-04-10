<?php

class PageTemplater {

  // Unique identifier
  protected $plugin_slug;

  // Reference to an instance of this class
  private static $instance;

  // The array of templates that this plugin tracks
  protected $templates;

  // Returns an instance of this class
  public static function get_instance() {

    if( self::$instance == null ) {
      self::$instance = new PageTemplater();
    }

    return self::$instance;
  }

  // Initializes the plugin by setting fulters and admin functions
  private function __construct() {

    $this->templates = array();

    // Adds filter to the attributes metabox to inject tempaltes into cache
    add_filter(
      'theme_page_templates', array( $this, 'add_new_template' )
    );

    // Adds a filter to the save post to inject out template into the page cache
    add_filter(
      'wp_insert_post_data', array( $this, 'register_project_templates' )
    );

    // Adds a filter to the template_include to determine if the page has our
    // templates assigned and return its path
    add_filter(
      'template_include', array( $this, 'view_project_template' )
    );

    /**
     * IMPORTANT: The set of templates to import
     */
    $this->templates = array(
      'simcreator-dx.php' => 'Landing Page - SimCreator DX',
    );
  }

  // Adds our template to the page dropdown
  public function add_new_template( $posts_templates ) {
    $posts_templates = array_merge( $posts_templates, $this->templates );
    return $posts_templates;
  }

  public function register_project_templates( $atts ) {

    // Create the key used for the themes cache
    $cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );

    // Retrieves the cache list or creates an empty array
    $templates = wp_get_theme()->get_page_templates();
    if( empty( $templates ) ) {
      $templates = array();
    }

    // Removes the old cache
    wp_cache_delete( $cache_key, 'themes' );

    // Merge our templates to the current list of templates
    $templates = array_merge( $templates, $this->templates );

    // Adds the modified cache to allow EP to pick it up
    wp_cache_add( $cache_key, $templates, 'themes', 1800 );

    return $atts;
  }

  // Checks to see if the template is assigned to the page
  public function view_project_template( $template ) {

    // Get global post
    global $post;

    // Returns the template if $post is empty
    if( !$post ) {
      return $template;
    }

    // Returns default template if no custom one is defined
    if( !isset( $this->templates[get_post_meta(
      $post->ID, '_wp_page_template', true
    )] ) ) {
      return $template;
    }

    $file = plugins_url() . '/faac-landing-pages/page-templates/' . get_post_meta(
      $post->ID, '_wp_page_template', true
    );

    // Checks to make sure the file exists before returning it
    if( file_exists( $file ) ) {
      return $file;
    } else {
      echo $file;
    }

    // Returns the template
    return $template;
  }
}
add_action( 'plugins_loaded', array( 'PageTemplater', 'get_instance' ) );