<?php
/**
 * Template Name: Content - General
 * Description: Layout for general content pages
 *
 * This layout consists of:
 *    Header
 *    Main body
 *    Sidebar
 *    Footer
 *
 * The header contains:
 *    General navigation component
 *    Basic banner component
 *    Breadcrumbs
 *
 * The main body consists of:
 *    General content component
 *
 * The sidebar contains:
 *    Link block component
 *    Documentation links
 *    - uses the link block component
 *
 * The footer contains:
 *    Video playlist component
 *    Category headings component
 *    Category row component
 *    CTA promotions component
 *    Testimonial promotion component
 *    Video promotions component
 *    Photo promotions component
 *    Links promotion component
 *    General footer layout
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <?php
    // Header meta, scripts, and styles
    fwd_preload( 'general', 'css' );
    fwd_preload( 'general', 'js' );

    get_layout( 'header' );

    wp_enqueue_style( 'general' );
    ?>
  </head>
  <body <?php body_class('general'); ?>>
    <?php
    // Body open meta and functions
    get_layout( 'body-open' );
    ?>
    <header class="general__header">
      <section class="general__navigation">
        <?php
        // General navigation
        fwd_query_var( 'logo', 'faac_menuLogo', 'option' );
        get_component('navigation', 'general');
        ?>
      </section>
      <section class="general__banner">
        <?php
        // Basic banner
        set_query_var( 'background', get_field('generalContent_slider_slider_gallery')[0] );
        fwd_query_var( 'category', 'generalContent_slider_slider_category' );
        fwd_query_var( 'upper', 'generalContent_slider_slider_upperText' );
        fwd_query_var( 'lower', 'generalContent_slider_slider_lowerText' );
        get_component( 'banners', 'basic' );
        ?>
      </section>
      <section class="general__breadcrumbs">
        <?php
        // Breadcrumbs
        get_component( 'general', 'breadcrumbs' );
        ?>
      </section>
    </header>
    <main class="general__main">
      <?php
      // Article component
      if( get_field( 'generalContent_introContent_article_body') ):
      ?>
        <section class="general__content">
          <?php
          fwd_query_var( 'headline', 'generalContent_introContent_article_headline');
          fwd_query_var( 'body', 'generalContent_introContent_article_body');

          // Some posts need password protection, provided here
          if( post_password_required() ):
            echo get_the_password_form();
          endif;
          if( !post_password_required() ):
            get_component( 'general', 'article' );
          endif;
          ?>
        </section>
      <?php
      endif;
      ?>
    </main>
    <aside class="general__sidebar">
      <?php
      // Sidebar link block component
      if( get_field( 'generalContent_subPages_linkBlock_list') ):
      ?>
        <section class="general__sub-pages">
          <?php
          fwd_query_var( 'title', 'generalContent_subPages_linkBlock_title' );
          fwd_query_var( 'icon', 'generalContent_subPages_linkBlock_icon' );
          fwd_query_var( 'list', 'generalContent_subPages_linkBlock_list');
          get_component( 'sidebar', 'link-block' );
          ?>
        </section>
      <?php
      endif;

      // Documentation links (uses same link block component)
      if( get_field( 'generalContent_documentationLinks_linkBlock_list') ):
      ?>
        <section class="general__documentation">
          <?php
          fwd_query_var( 'title', 'generalContent_documentationLinks_linkBlock_title' );
          fwd_query_var( 'icon', 'generalContent_documentationLinks_linkBlock_icon' );
          fwd_query_var( 'list', 'generalContent_documentationLinks_linkBlock_list');
          get_component( 'sidebar', 'link-block' );
          ?>
        </section>
      <?php
      endif;
      ?>
    </aside>
    <footer class="general__footer">
      <?php
      // Video playlist
      if( have_rows( 'generalContent_videos_videoPlaylist') ):
        ?>
        <section class="general__video-playlist">
          <?php
          fwd_query_var( 'videos', 'generalContent_videos_videoPlaylist');
          get_component( 'promotions', 'video-playlist' );
          ?>
        </section>
      <?php
      endif;

      // Category headings component
      if( get_field( 'generalContent_headings_heading') ):
      ?>
        <section class="general__category-headings">
          <?php
          fwd_query_var( 'headings', 'generalContent_headings_heading' );
          get_component( 'options', 'category-headings' );
          ?>
        </section>
      <?php
      endif;

      // General row component
      if( get_field( 'generalContent_categories_generalCategoryRow') ):
      ?>
        <section class="general__category-row">
          <?php
          fwd_query_var( 'categories', 'generalContent_categories_generalCategoryRow');
          get_component( 'options', 'general-row' );
          ?>
        </section>
      <?php
      endif;

      // Calls-to-action component
      if( get_field('cta_tagline', 'option') ):
        fwd_query_var( 'background', 'cta_background', 'option' );
        fwd_query_var( 'button', 'cta_buttonText', 'option' );
        fwd_query_var( 'link', 'cta_pageLink', 'option' );
        fwd_query_var( 'phone', 'cta_phoneNumber', 'option' );
        fwd_query_var( 'tagline', 'cta_tagline', 'option' );
      ?>
        <section class="general__calls-to-action">
          <?php
          get_component( 'promotions', 'calls-to-action' );
          ?>
        </section>
      <?php
      endif;

      // Testimonial component
      if( get_field( 'generalContent_testimonial_testimonial_link') ):
      ?>
        <section class="general__testimonial">
          <?php
          fwd_query_var( 'testimonial', 'generalContent_testimonial_testimonial_link');
          get_component( 'promotions', 'testimonial' );
          ?>
        </section>
      <?php
      endif;

      // Video promotion component
      if( have_rows('videoPromo_playlist', 'option') ):
      ?>
        <section class="general__video-playlist">
          <?php
          get_component('promotions', 'video');
          ?>
        </section>
      <?php
      endif;

      // Photo promotion component
      if( get_field('photoPromo_background', 'option') ):
      ?>
        <section class="general__photo-promotion">
          <?php
          get_component('promotions', 'photo');
          ?>
        </section>
      <?php
      endif;

      // Promotional links component
      ?>
      <section class="general__promotion-links">
        <?php
        get_component('promotions', 'links');
        ?>
      </section>
      <?php
      get_layout( 'footer' );
      ?>
    </footer>
    <?php
    wp_enqueue_script( 'general' );
    get_component( 'meta', 'foot' );
    ?>
  </body>
</html>