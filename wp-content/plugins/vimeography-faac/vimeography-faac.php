<?php
/*
Plugin Name: Vimeography Theme: FAAC
Plugin URI: designfwd.com
Theme Name: FAAC
Theme URI: designfwd.com
Version: 1.0
Description: a vimeography theme for the FAAC website. Based largely on the Strips theme.
Author: FWD
Author URI: designfwd.com
Copyright: FWD
*/

if ( ! class_exists('Vimeography_Themes_FAAC') ) {
  class Vimeography_Themes_FAAC {
    /**
     * The current version of this theme
     *
     * @var string
     */
    public $version = '1.0';

    /**
     * Include this theme in the Vimeography theme loader.
     */
    public function __construct() {
      add_action('plugins_loaded', array($this, 'load_theme'));
    }

    /**
     * Set any values sent to the theme.
     * @param [type] $name  [description]
     * @param [type] $value [description]
     */
    public function __set($name, $value) {
      $this->$name = $value;
    }

    /**
     * Has to be public so the wp actions can reach it.
     * @return [type] [description]
     */
    public function load_theme() {
      do_action('vimeography/load-theme', __FILE__);
    }

    public static function load_scripts() {
      wp_deregister_script('fitvids');
      wp_deregister_script('fancybox');

      wp_dequeue_script('fitvids');
      wp_dequeue_script('fancybox');

      // Register our common scripts
      wp_register_script('froogaloop', VIMEOGRAPHY_ASSETS_URL.'js/plugins/froogaloop2.min.js');
      wp_register_script('fitvids.', VIMEOGRAPHY_ASSETS_URL.'js/plugins/jquery.fitvids.js', array('jquery'));
      wp_register_script('spin', VIMEOGRAPHY_ASSETS_URL.'js/plugins/spin.min.js', array('jquery'));
      wp_register_script('jquery-spin', VIMEOGRAPHY_ASSETS_URL.'js/plugins/jquery.spin.js', array('jquery', 'spin'));
      wp_register_script('lazyload', VIMEOGRAPHY_ASSETS_URL.'js/plugins/jquery.lazyload.min.js', array('jquery'));
      wp_register_script('vimeography-utilities', VIMEOGRAPHY_ASSETS_URL.'js/utilities.js', array('jquery'));
      wp_register_script('vimeography-pagination', VIMEOGRAPHY_ASSETS_URL.'js/pagination.js', array('jquery'));
      wp_register_script('vimeography-froogaloop', VIMEOGRAPHY_ASSETS_URL.'js/plugins/froogaloop2.min.js', array('jquery', 'vimeography-utilities'));

      // Register our custom scripts
      wp_register_script('fancybox', '//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js', array('jquery'));
      wp_register_script('fancybox-media', '//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-media.js', array('fancybox'));
      wp_register_style('vimeography-common', VIMEOGRAPHY_ASSETS_URL.'css/vimeography-common.css');
      wp_register_style('fancybox', '//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css');
      wp_register_style('faac', plugins_url('assets/css/faac.css', __FILE__));

      wp_enqueue_script('froogaloop');
      wp_enqueue_script('fitvids');
      wp_enqueue_script('fancybox');
      wp_enqueue_script('fancybox-media');
      wp_enqueue_script('spin');
      wp_enqueue_script('jquery-spin');
      wp_enqueue_script('lazyload');
      wp_enqueue_script('vimeography-utilities');
      wp_enqueue_script('vimeography-pagination');
      wp_enqueue_script('vimeography-froogaloop');
      wp_enqueue_style('vimeography-common');
      wp_enqueue_style('fancybox');
      wp_enqueue_style('faac');
    }

    public function videos() {
      // optional helpers
      require_once(VIMEOGRAPHY_PATH .'lib/helpers.php');
      $helpers = new Vimeography_Helpers;

      $items = array();

      foreach ($this->data as $video) {
        $video->short_description = $helpers->truncate($video->description, 80);
        $items[] = $video;
      }

      $items = $helpers->apply_common_formatting($items);
      return $items;
    }

    public function total_pages() {
      return ceil($this->total / $this->per_page);
    }

    public function blank_image() {
      return VIMEOGRAPHY_ASSETS_URL.'img/blank.png';
    }
  }
}

function vimeography_themes_faac() {
  if ( ! class_exists( 'Vimeography', false ) ) {
    return;
  }

  new Vimeography_Themes_FAAC;
}

// Get this theme loaded at a lower priority than the Dev Bundle
add_action( 'plugins_loaded', 'vimeography_themes_faac', 5 );
