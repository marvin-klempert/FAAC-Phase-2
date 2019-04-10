<?php
/**
 * Template Name: Divisions - News (D4)
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>


  <?php // Defines a division class to add to sections
  $division = get_the_terms( get_the_ID(), 'division' );

  $divisionName = $division[0]->name;
    if( $divisionName == 'FAAC Commercial' ){
      $divisionClass = 'faac-commercial';
    } elseif( $divisionName == 'FAAC Military' ){
      $divisionClass = 'faac-military';
    } elseif( $divisionName == 'MILO Range' ){
      $divisionClass = 'milo-range';
    } elseif( $divisionName == 'Realtime Technologies' ){
      $divisionClass = 'rti';
    } else {
      $divisionClass = '';
    }
  ?>


  <?php // Slider area
    if( get_field('divisionNews_slider') != '' ):
      $slider = get_field('divisionNews_slider');
        $slider_gallery = $slider['slider_gallery'];
        $slider_category = $slider['slider_category'];
        $slider_upperText = $slider['slider_upperText'];
        $slider_lowerText = $slider['slider_lowerText'];
  ?>
    <section class="slider slider--division-news <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/10-sliders/100-basic-slider.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Breadcrumbs ?>
  <section class="breadcrumbs breadcrumbs--division-news <?php echo $divisionClass; ?>">
    <div class="breadcrumbs <?php echo $divisionClass; ?>" typeof="BreadcrumbList" vocab="https://schema.org/">
      <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }
      ?>
    </div>
  </section>

  <div class="content-wrapper content-wrapper--division-internal <?php echo $divisionClass; ?>">
    <div class="content-wrapper content-wrapper-container--content-general <?php echo $divisionClass; ?>">

  <section class="posts posts--division-news">
    <div class="body-content body-content__wrapper <?php echo $divisionClass; ?>">
      <?php
      //Protect against arbitrary paged values
      $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

      // the query
      $the_query = new WP_Query( array(
        'paged' => $paged,
        'posts_per_page' => 7,
        'tax_query' => array(
          array(
            'taxonomy' => 'category',
            'field' => 'name',
            'terms' => $divisionName
          )
        )

      ));
      ?>

      <?php if ( $the_query->have_posts() ) :
        // the loop
        while ( $the_query->have_posts() ) : $the_query->the_post();
        ?>

          <div class="posts posts__heading">
            <a class="posts posts__link" href="<?php the_permalink(); ?>" target="_blank">
              <h2 class="posts posts__title">
                <?php the_title(); ?>
              </h2>
            </a>
            <h4 class="posts posts__date">
              Published on <?php the_date('F j, Y'); ?>
            </h4>
            <?php the_post_thumbnail( $postID, 'post-thumbnail', array( 'class' => 'posts posts__image') ); ?>
            <div class="posts posts__content">
              <?php echo wp_trim_excerpt( ); ?>
            </div>
          </div>
        <?php endwhile; ?>
        <div class="posts posts__pagination">
          <?php
            $big = 999999999; // need an unlikely integer

            echo paginate_links( array(
              'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
              'format' => '?paged=%#%',
              'current' => max( 1, get_query_var('paged') ),
              'total' => $the_query->max_num_pages
              )
            );
          ?>
        </div>
        <?php
          // clean up after the query and pagination
          wp_reset_postdata();
        endif;
        ?>
    </div>
  </section>


  <section class="sidebar sidebar--division-news">

    <div class="sidebar sidebar__recent-news">
      <h3 class="sidebar sidebar__title">
        Recent News
      </h3>
      <nav class="sidebar sidebar__links">
        <ul class="sidebar sidebar__list">
        <?php
          $args = array( 'numberposts' => '12', 'tax_query' => array(
              array(
                'taxonomy' => 'category',
                'field' => 'name',
                'terms' => $divisionName
              )
          ) );
          $recent_posts = wp_get_recent_posts( $args );
          foreach( $recent_posts as $recent ): ?>
            <li class="sidebar sidebar__item">
              <a class="sidebar sidebar__link" href="<?php echo get_permalink($recent["ID"]); ?>" target="_blank">
                <?php echo $recent["post_title"]; ?>
              </a>
            </li>
          <?php endforeach;
          wp_reset_query();
        ?>
        </ul>
      </nav>
    </div>

  <?php // Sub Pages Links
      $subPage = get_field('divisionNews_subPages');
        $linkBlock_icon = $subPage['linkBlock_icon'];
        $linkBlock_title = $subPage['linkBlock_title'];
        $linkBlock_list = $subPage['linkBlock_list'];
    if( $linkBlock_title != '' ):
  ?>
    <div class="sidebar sidebar__wrapper <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/20-general/260-link-block-feature.php', false, false ));
      ?>
    </div>
  <?php endif; ?>
  </div>
  </div>


  <?php // Featured Division Links
    if( get_field('divisionNews_features') != '' ):
      $featuredLinks = get_field('divisionNews_features');
        $divisionFeature_headline = $featuredLinks['divisionFeature_headline'];
        $divisionFeature_solution = $featuredLinks['divisionFeature_solution'];
        $divisionFeature_simulator = $featuredLinks['divisionFeature_simulator'];
  ?>
    <section class="division-feature division-feature--division-news <?php echo $divisionClass; ?>">
      <?php
        include( locate_template( 'templates/40-divisions/410-division-feature-block.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php //Call to Action
    $cta_tagline = get_field('cta_tagline', 'option');
    $cta_buttonText = get_field('cta_buttonText', 'option');
    $cta_pageLink = get_field('cta_pageLink', 'option');
    $cta_phoneNumber = get_field('cta_phoneNumber', 'option');
    $cta_background = get_field('cta_background', 'option');
  ?>
  <section class="call-to-action call-to-action--category-parent <?php echo $divisionClass; ?>">
    <?php
      include ( locate_template( 'templates/50-promotions/520-call-to-action.php', false, false ));
    ?>
  </section>


  <section class="testimonial testimonial--division-news">
    <?php //Testimonial

      $testimonial = get_field('divisionNews_testimonial');
        $testimonial_link = $testimonial['testimonial_link'];

      include ( locate_template( 'templates/50-promotions/530-testimonial.php', false, false ));
    ?>
  </section>

<?php endwhile; ?>
