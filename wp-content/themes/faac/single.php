<?php
/**
 * Single post template
 *
 * This layout consists of:
 *
 * This layout consists of:
 *    Header
 *    Main body
 *    Sidebar
 *    Footer
 *
 * The header contains:
 *    General navigation
 *    Basic banner component
 *    - The text set for this page is not editable
 *    Breadcrumbs
 *    Sector flag component
 *    Division flag component
 *
 * The main body content consists of:
 *    Blog post component
 *
 * The sidebar contains:
 *    Recent news component
 *    Post categories component
 *
 * The footer contains:
 *    CTA promotions components
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
    fwd_preload( 'single', 'css' );
    fwd_preload( 'single', 'js' );

    get_layout( 'header' );

    wp_enqueue_style( 'single' );
    ?>
  </head>
  <body <?php body_class('single'); ?>>
    <?php
    // Body open meta and functions
    get_layout( 'body-open' );
    ?>
    <header class="single__header">
      <section class="single__navigation">
        <?php
        // General navigation
        fwd_query_var( 'logo', 'faac_menuLogo', 'option' );
        get_component('navigation', 'general');
        ?>
      </section>
      <section class="single__banner">
        <?php
        // Basic banner

        // If there is a division set, grab that background
        if( get_query_var( 'division-prefix') ):
          set_query_var( 'background', set_division_background() );
        else:
          fwd_query_var( 'background', 'faac_postHeader', 'option');
        endif;
        set_query_var( 'category', '' );
        set_query_var( 'upper', '' );
        set_query_var( 'lower', 'News' );
        get_component( 'banners', 'basic' );
        ?>
      </section>
      <section class="single__breadcrumbs">
        <?php
        // Breadcrumbs
        get_component( 'general', 'breadcrumbs' );
        ?>
      </section>
      <?php
      // Flag components
      if( get_query_var( 'sector' ) ):
      ?>
        <section class="single__sector-flag">
          <?php
          // Sector flag component
          get_component( 'general', 'sector-flag' );
          ?>
        </section>
      <?php
      endif;
      if( get_query_var( 'category-prefix' ) ):
      ?>
        <section class="single__division-flag">
          <?php
          // Division flag component
          get_component( 'division', 'flag' );
          ?>
        </section>
      <?php
      endif;
      ?>
    </header>
    <main class="single__main">
      <?php
      while( have_posts() ): the_post();
      ?>
        <section class="single__post">
        <?php
        // Blog post component
        get_component( 'blog', 'post' );
        ?>
        </section>
      <?php
      endwhile;
      ?>
    </main>
    <aside class="single__sidebar">
      <section class="single__recent">
        <?php
        // Recent posts component
        $args = array( 'numberposts' => '3', 'tax_query' => array(
          array(
            'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => 'post-format-aside',
            'operator' => 'NOT IN'
          ),
          array(
            'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => 'post-format-image',
            'operator' => 'NOT IN'
          )
        ) );
        set_query_var( 'recent-args', $args );
        get_component( 'sidebar', 'recent-posts' );
        ?>
      </section>
      <section class="single__categories">
        <?php
        // Post categories component
        $categories = array(
          1  // Uncategorized
        );
        set_query_var( 'excluded-cats', $categories );
        get_component( 'sidebar', 'categories' );
        ?>
      </section>
    </aside>
    <footer class="single__footer">
      <?php
      // Calls-to-action component
      if( get_field('cta_tagline', 'option') ):
        fwd_query_var( 'background', 'cta_background', 'option' );
        fwd_query_var( 'button', 'cta_buttonText', 'option' );
        fwd_query_var( 'link', 'cta_pageLink', 'option' );
        fwd_query_var( 'phone', 'cta_phoneNumber', 'option' );
        fwd_query_var( 'tagline', 'cta_tagline', 'option' );
      ?>
        <section class="single__calls-to-action">
          <?php
          get_component( 'promotions', 'calls-to-action' );
          ?>
        </section>
      <?php
      endif;

      // Video promotion component
      if( have_rows('videoPromo_playlist', 'option') ):
      ?>
        <section class="single__video-promotion">
          <?php
          get_component('promotions', 'video');
          ?>
        </section>
      <?php
      endif;

      // Photo promotion component
      if( get_field('photoPromo_background', 'option') ):
      ?>
        <section class="single__photo-promotion">
          <?php
          get_component('promotions', 'photo');
          ?>
        </section>
      <?php
      endif;

      // Promotional links component
      ?>
      <section class="single__promotion-links">
        <?php
        get_component('promotions', 'links');
        ?>
      </section>

      <?php
      get_layout( 'footer' );
      ?>
    </footer>
    <?php
    wp_enqueue_script( 'single' );
    get_component( 'meta', 'foot' );
    ?>
  </body>
</html>