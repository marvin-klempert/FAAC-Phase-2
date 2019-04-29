<?php
/**
 * Template Name: Division - Index
 * Description: Layout for the division index page
 *
 * This layout consists of:
 *    Header
 *    Main body
 *    Footer
 *
 * The header contains:
 *    General navigation component
 *    Basic banner component
 *    Breadcrumbs component
 *
 * The main body consists of:
 *    Centered content component
 *    Division summary component
 *
 * The footer contains:
 *    Video promotion component
 *    Photo promotion component
 *    Links promotion component
 *    General footer layout
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <?php
    // Header meta, scripts, and styles
    fwd_preload( 'divisionIndex', 'css' );
    fwd_preload( 'divisionIndex', 'js' );

    get_layout( 'header' );
    wp_enqueue_style( 'divisionIndex' );
    ?>
  </head>
  <body <?php body_class( 'division-index' ); ?>>
    <?php
    // Body open meta and functions
    get_layout( 'body-open' );
    ?>
    <header class="division-index__header">
      <section class="division-index__navigation">
        <?php
        // General navigation
        fwd_query_var( 'logo', 'faac_menuLogo', 'option' );
        get_component( 'navigation', 'general' );
        ?>
      </section>
      <section class="division-index__banner">
        <?php
        // Basic banner
        set_query_var( 'background', get_field('divisionIndex_slider_slider_gallery')[0] );
        fwd_query_var( 'category', 'divisionIndex_slider_slider_category' );
        fwd_query_var( 'upper', 'divisionIndex_slider_slider_upperText' );
        fwd_query_var( 'lower', 'divisionIndex_slider_slider_lowerText' );
        get_component( 'banners', 'basic' );
        ?>
      </section>
      <section class="division-index__breadcrumbs">
        <?php
        // Breadcrumbs
        get_component( 'general', 'breadcrumbs' );
        ?>
      </section>
    </header>
    <main class="division-index__main">
      <?php
      // Intro content (uses the centered-content component)
      if( get_field( 'divisionIndex_intro_centeredContent_headline') ):
      ?>
        <section class="division-index__intro">
          <?php
          fwd_query_var( 'content', 'divisionIndex_intro' );
          get_component( 'general', 'centered-content' );
          ?>
        </section>
      <?php
      endif;

      // Division summary component
      if( get_field('divisionIndex_divisions_divisionSummary') ):
      ?>
        <section class="division-index__summaries">
          <?php
          fwd_query_var( 'divisions', 'divisionIndex_divisions_divisionSummary' );
          get_component( 'division', 'summaries' );
          ?>
        </section>
      <?php
      endif;
      ?>
    </main>
    <footer class="division-index__footer">
      <?php
      // Video promotion component
      if( have_rows('videoPromo_playlist', 'option') ):
      ?>
        <section class="category__video-promotion">
          <?php
          get_component('promotions', 'video');
          ?>
        </section>
      <?php
      endif;

      // Photo promotion component
      if( get_field('photoPromo_background', 'option') ):
      ?>
        <section class="category__photo-promotion">
          <?php
          get_component('promotions', 'photo');
          ?>
        </section>
      <?php
      endif;

      // Promotional links component
      ?>
      <section class="category__promotion-links">
        <?php
        get_component('promotions', 'links');
        ?>
      </section>

      <?php
      get_layout( 'footer' );
      ?>
    </footer>
    <?php
    wp_enqueue_script( 'divisionIndex' );
    get_component( 'meta', 'foot' );
    ?>
  </body>
</html>