<?php
/**
 * Blog Post Category Page
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
 *
 * The main body content consists of:
 *    Blog archive component
 *    Pagination component
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
    fwd_preload( 'category', 'css' );
    fwd_preload( 'category', 'js' );

    get_layout( 'header' );

    wp_enqueue_style( 'category' );
    ?>
  </head>
  <body <?php body_class('category'); ?>>
    <?php
    // Body open meta and functions
    get_layout( 'body-open' );
    ?>
    <header class="category__header">
      <section class="category__navigation">
        <?php
        // General navigation
        fwd_query_var( 'logo', 'faac_menuLogo', 'option' );
        get_component('navigation', 'general');
        ?>
      </section>

      <section class="category__banner">
        <?php
        // Basic banner
        fwd_query_var( 'background', 'faac_postHeader', 'option' );
        set_query_var( 'category', '' );
        set_query_var( 'upper', '' );
        set_query_var( 'lower', single_term_title( '', false ) . ' News' );
        get_component( 'banners', 'basic' );
        ?>
      </section>

      <section class="category__breadcrumbs">
        <?php
        // Breadcrumbs
        get_component( 'general', 'breadcrumbs' );
        ?>
      </section>
    </header>

    <main class="category__main">
      <section class="category__posts">
        <?php
        // Blog category archive component
        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
        $category = get_queried_object();
        $query = new WP_Query( array(
          'cat' => $category->term_id,
          'paged' => $paged,
          'posts_per_page' => '3',
        ));
        if( $query->have_posts() ):
          set_query_var( 'query', $query );
          get_component( 'blog', 'category-archive' );
        endif;
        ?>
      </section>
      <section class="category__pagination">
        <?php
        // Blog pagination component
        if( $query->have_posts() ):
          // 'query' variable is already set so no need to do it again here
          get_component( 'blog', 'pagination' );
          wp_reset_postdata();
        endif;
        ?>
      </section>
    </main>

    <aside class="category__sidebar">
      <section class="category__recent">
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
      <section class="category__categories">
        <?php
        // Post categories component
        $categories = array(
          1,  // Uncategorized
          7,  // Simulators
          8   // Solutions
        );
        set_query_var( 'excluded-cats', $categories );
        get_component( 'sidebar', 'categories' );
        ?>
      </section>
    </aside>

    <footer class="category__footer">
      <?php
      // Calls-to-action component
      if( get_field('cta_tagline', 'option') ):
        fwd_query_var( 'background', 'cta_background', 'option' );
        fwd_query_var( 'button', 'cta_buttonText', 'option' );
        fwd_query_var( 'link', 'cta_pageLink', 'option' );
        fwd_query_var( 'phone', 'cta_phoneNumber', 'option' );
        fwd_query_var( 'tagline', 'cta_tagline', 'option' );
      ?>
        <section class="category__calls-to-action">
          <?php
          get_component( 'promotions', 'calls-to-action' );
          ?>
        </section>
      <?php
      endif;

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
    wp_enqueue_script( 'category' );
    get_component( 'meta', 'foot' );
    ?>
  </body>
</html>