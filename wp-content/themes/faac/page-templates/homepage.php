<?php
/**
 * Template Name: Homepage
 * Description: Layout for the homepage / front page of the website
 *
 * This layout consists of:
 *    Header
 *    Main body
 *    Footer
 *
 * The header contains:
 *    Standard navigation
 *    Hero slider
 *
 * The main body consists of:
 *    Intro content component
 *    Category heading component
 *    Category feature component
 *    Division intro component
 *    - Uses the intro-content component file
 *    Division grid component
 *
 * The footer contains:
 *    Video promotion component
 *    Photo promotion component
 *    Links promotion component
 *    General footer layout
 */
?>
<!doctype html>
<html <?php language_attributes(); ?> >
  <head>
    <?php
    // Header meta, scripts, and styles
    fwd_preload( 'homepage', 'css' );
    fwd_preload( 'homepage', 'js' );

    get_layout( 'header' );

    wp_enqueue_style( 'homepage' );
    ?>
  </head>

  <body <?php body_class( 'homepage' ); ?>>
    <?php
    // Body open meta and functions
    get_layout( 'body-open' );
    ?>
    <header class="homepage__header">
      <section class="homepage__navigation">
        <?php
        // General navigation component
        fwd_query_var( 'logo', 'faac_menuLogo', 'option' );
        get_component( 'navigation', 'general' );
        ?>
      </section>

      <?php
      // Banner slider component
      if( get_field( 'homepage_slider_dynamicSlider') ):
      ?>
        <section class="homepage__banner">
          <?php
          fwd_query_var( 'slider', 'homepage_slider_dynamicSlider');
          get_component( 'banners', 'slider' );
          ?>
        </section>
      <?php
      endif;
      ?>
    </header>

    <main class="homepage__main">
      <?php
      // Intro content component
      if( get_field( 'homepage_intro' ) ):
      ?>
        <section class="homepage__intro">
          <?php
          fwd_query_var( 'content', 'homepage_intro' );
          set_query_var( 'leading', true );
          get_component( 'general', 'centered-content' );
          ?>
        </section>
      <?php
      endif;

      // Category headings component
      if( get_field( 'homepage_categoryHeadings_heading' ) ):
      ?>
        <section class="homepage__category-headings">
          <?php
          fwd_query_var( 'headings', 'homepage_categoryHeadings_heading' );
          get_component( 'options', 'category-headings' );
          ?>
        </section>
      <?php
      endif;

      // Category feature component
      if( get_field( 'homepage_categories_categoryFeature') ):
      ?>
        <section class="homepage__category-feature">
          <?php
          fwd_query_var( 'features', 'homepage_categories_categoryFeature');
          get_component( 'options', 'category-feature' );
          ?>
        </section>
      <?php
      endif;

      // Division Introduction (uses centered-content)
      if( get_field( 'homepage_divisionIntro' ) ):
      ?>
        <section class="homepage__division-intro">
          <?php
          fwd_query_var( 'content', 'homepage_divisionIntro' );
          get_component( 'general', 'centered-content' );
          ?>
        </section>
      <?php
      endif;

      // Division grid component
      if( get_field( 'homepage_divisionGrid_divisionGrid' ) ):
      ?>
        <section class="homepage__division-grid">
          <?php
          fwd_query_var( 'grid', 'homepage_divisionGrid_divisionGrid' );
          get_component( 'general', 'division-logos' );
          ?>
        </section>
      <?php
      endif;
      ?>
    </main>

    <footer class="homepage__footer">
      <?php
      // Video promotion component
      if( have_rows('videoPromo_playlist', 'option') ):
      ?>
        <section class="404__video-promotion">
          <?php
          get_component('promotions', 'video');
          ?>
        </section>
      <?php
      endif;

      // Photo promotion component
      if( get_field('photoPromo_background', 'option') ):
      ?>
        <section class="404__photo-promotion">
          <?php
          get_component('promotions', 'photo');
          ?>
        </section>
      <?php
      endif;

      // Promotional links component
      ?>
      <section class="404__promotion-links">
        <?php
        get_component('promotions', 'links');
        ?>
      </section>

      <?php
      get_layout( 'footer' );
      ?>
    </footer>
    <?php
    wp_enqueue_script( 'homepage' );
    get_component( 'meta', 'foot' );
    ?>
  </body>
</html>