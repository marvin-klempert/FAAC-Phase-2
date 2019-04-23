<?php
/**
 * 404 Error Page
 *
 * This layout consists of:
 *    Header
 *    Main body
 *    Footer
 *
 * The header contains:
 *    Standard navigation
 *    Hero banner area
 *      The text set for this page is not editable
 *
 * The main body content consists of:
 *    "Not Found" text block
 *    CTA Sections
 *
 * The footer contains:
 *    Universal footer content
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <?php
    // Header meta, scripts, and styles
    fwd_preload( '404', 'css' );
    fwd_preload( '404', 'js' );

    get_partial('meta', 'head');

    wp_enqueue_style( '404' );
    ?>
  </head>

  <body <?php body_class('404'); ?>>
    <?php
    // Body open meta and functions
    get_partial('meta', 'body-open');
    ?>
    <header class="404__header">
      <section class="404__navigation">
        <?php
        // General navigation
        fwd_query_var( 'logo', 'faac_menuLogo', 'option' );
        get_partial('navigation', 'general');
        ?>
      </section>

      <section class="404__banner">
        <?php
        // Basic banner
        fwd_query_var( 'background', 'faac_postHeader', 'option' );
        set_query_var( 'category', '' );
        set_query_var( 'upper', '' );
        set_query_var( 'lower', 'Oops...');
        get_partial('banners', 'basic');
        ?>
      </section>
    </header>

    <article class="404__article">
      <?php
      // General body content
      ?>
      <div class="body-content">
        Sorry, but the page you were trying to view does not exist.
      </div>
    </article>

    <?php
    // Calls-to-action component
    if( get_field('cta_tagline', 'option') ):
      fwd_query_var( 'background', 'cta_background', 'option' );
      fwd_query_var( 'button', 'cta_buttonText', 'option' );
      fwd_query_var( 'link', 'cta_pageLink', 'option' );
      fwd_query_var( 'phone', 'cta_phoneNumber', 'option' );
      fwd_query_var( 'tagline', 'cta_tagline', 'option' );
    ?>
      <section class="404__calls-to-action">
        <?php
        get_partial( 'promotions', 'calls-to-action' );
        ?>
      </section>
    <?php
    endif;
    ?>

    <?php
    // Video promotion component
    if( have_rows('videoPromo_playlist') ):
    ?>
      <section class="404__video-promotion">
        <?php
        get_partial('promotions', 'video');
        ?>
      </section>
    <?php
    endif;

    // Photo promotion component
    if( get_field('photoPromo_background', 'option') ):
    ?>
      <section class="404__photo-promotion">
        <?php
        get_partial('promotions', 'photo');
        ?>
      </section>
    <?php
    endif;

    // Promotional links component
    ?>
    <section class="404__promotion-links">
      <?php
      get_partial('promotions', 'links');
      ?>
    </section>

    <footer class="404__footer">
      <?php
      dynamic_sidebar( 'sidebar-footer' );
      ?>
    </footer>
    <?php
    wp_enqueue_script( '404' );
    get_partial( 'meta', 'foot' );
    ?>
  </body>

</html>