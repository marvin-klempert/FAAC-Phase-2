<?php
/**
 * Template Name: Content - News
 * Description: Template for news content pages
 *
 * This layout consists of:
 *    Header
 *    Main body
 *    Sidebar
 *    Footer
 *
 * The header contains:
 *    Standard navigation
 *    Hero banner
 *    Breadcrumbs
 *
 * The main body consists of:
 *    Blog archive component
 *    Blog pagination component
 *
 * The sidebar contains:
 *    Recent post sidebar component
 *    Categories sidebar component
 *
 * The footer contains:
 *    Category headings component
 *    Category row component
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
    fwd_preload( 'news', 'css' );
    fwd_preload( 'news', 'js' );

    get_layout( 'header' );

    wp_enqueue_style( 'news' );
    ?>
  </head>
  <body <?php body_class('news'); ?>>
    <?php
    // Body open meta and functions
    get_layout( 'body-open' );
    ?>
    <header class="news__header">
      <section class="general__navigation">
        <?php
        // General navigation
        fwd_query_var( 'logo', 'faac_menuLogo', 'option' );
        get_component( 'navigation', 'general' );
        ?>
      </section>
      <section class="general__banner">
        <?php
        //  Basic banner component
        set_query_var( 'background', get_field('newsContent_slider_slider_gallery')[0] );
        fwd_query_var( 'category', 'newsContent_slider_slider_category' );
        fwd_query_var( 'upper', 'newsContent_slider_slider_upperText' );
        fwd_query_var( 'lower', 'newsContent_slider_slider_lowerText' );
        get_component( 'banners', 'basic' );
        ?>
      </section>
      <section class="news__breadcrumbs">
        <?php
        // Breadcrumbs
        get_component( 'general', 'breadcrumbs' );
        ?>
      </section>
    </header>

    <main class="news__main">
      <section class="news__posts">
        <?php
        // Blog archive component
        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
        $category = get_queried_object();
        $query = new WP_Query( array(
          'paged' => $paged,
          'posts_per_page' => '7',
        ));
        if( $query->have_posts() ):
          set_query_var( 'query', $query );
          get_component( 'blog', 'archive' );
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

    <aside class="news__sidebar">
      <section class="category__recent">
        <?php
        // Recent posts component
        $args = array( 'numberposts' => '12', 'tax_query' => array(
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
      <section class="news__categories">
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

    <footer class="news__footer">
      <?php
      // Category headings component
      if( get_field( 'newsContent_headings_heading') ):
      ?>
        <section class="news__category-headings">
          <?php
          fwd_query_var( 'headings', 'newsContent_headings_heading' );
          get_component( 'options', 'category-headings' );
          ?>
        </section>
      <?php
      endif;

      // General row component
      if( get_field( 'newsContent_categories_generalCategoryRow') ):
      ?>
        <section class="news__category-row">
          <?php
          fwd_query_var( 'categories', 'newsContent_categories_generalCategoryRow');
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
        <section class="news__calls-to-action">
          <?php
          get_component( 'promotions', 'calls-to-action' );
          ?>
        </section>
      <?php
      endif;

      // Testimonial component
      if( get_field( 'newsContent_testimonial_testimonial_link') ):
      ?>
        <section class="news__testimonial">
          <?php
          fwd_query_var( 'testimonial', 'newsContent_testimonial_testimonial_link');
          get_component( 'promotions', 'testimonial' );
          ?>
        </section>
      <?php
      endif;

      // Video promotion component
      if( have_rows('videoPromo_playlist', 'option') ):
      ?>
        <section class="news__video-playlist">
          <?php
          get_component('promotions', 'video');
          ?>
        </section>
      <?php
      endif;

      // Photo promotion component
      if( get_field('photoPromo_background', 'option') ):
      ?>
        <section class="news__photo-promotion">
          <?php
          get_component('promotions', 'photo');
          ?>
        </section>
      <?php
      endif;

      // Promotional links component
      ?>
      <section class="news__promotion-links">
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