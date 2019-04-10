<?php
/**
 * Template Name: Divisions - Support (D3.1)
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
    if( get_field('divisionInternal_slider') != '' ):
      $slider = get_field('divisionInternal_slider');
        $slider_gallery = $slider['slider_gallery'];
        $slider_category = $slider['slider_category'];
        $slider_upperText = $slider['slider_upperText'];
        $slider_lowerText = $slider['slider_lowerText'];
  ?>
    <section class="slider slider--division-internal <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/10-sliders/100-basic-slider.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Breadcrumbs ?>
  <section class="breadcrumbs breadcrumbs--division-internal <?php echo $divisionClass; ?>">
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

    <?php // General Content
      if( get_field('divisionInternal_article') != '' ):
        $bodyContent = get_field('divisionInternal_article');
          $article_headline = $bodyContent['article_headline'];
          $article_body = $bodyContent['article_body'];
    ?>
      <section class="body-content body-content--division-internal <?php echo $divisionClass; ?>">
        <div class="body-content body-content__wrapper <?php echo $divisionClass; ?>">
          <?php
            if( post_password_required() ):
              echo get_the_password_form();
            endif;
            if( !post_password_required() ): // Some posts need password protection, so should be hidden.
              include ( locate_template( 'templates/20-general/240-article.php', false, false ));
            endif;
          ?>
        </div>
      </section>
    <?php endif; ?>

    <?php
    // Support login link

    // Gets pages that are the correct division and page template
    $loginPage = new WP_Query(array(
      'post_type' => 'page',
      'meta_query' => array(
        array(
          'key' => '_wp_page_template',
          'value' => 'template-browser-dashboard.php'
        )
      ),
      'tax_query' => array(
        array(
          'key' => 'division',
          'value' => $divisionName
        )
      )
    ));
    if( $loginPage->have_posts() ):
    ?>
      <section class="sidebar sidebar--division-internal <?php echo $divisionClass; ?>">
        <div class="sidebar sidebar__wrapper <?php echo $divisionClass; ?>">
          <div class="sidebar sidebar__heading">
            <div class="sidebar sidebar__wrapper">
              <h3 class="sidebar sidebar__title">
                Downloads
              </h3>
            </div>
          </div>
          <nav class="sidebar sidebar__links">
            <ul class="sidebar sidebar__list">
              <?php
              while( $loginPage->have_posts() ): $loginPage->the_post();
              ?>
                <li class="sidebar sidebar__item">
                  <a class="sidebar sidebar__link" href="<?php the_permalink(); ?>">
                    Login
                  </a>
                </li>
              <?php
              endwhile;
              wp_reset_postdata();
              ?>
            </ul>
          </nav>
        </div>
      </section>
    <?php
    endif;
    ?>


    <section class="sidebar sidebar--division-internal <?php echo $divisionClass; ?>">
      <?php // Sub Pages Links
          $subPage = get_field('divisionInternal_subPage');
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

      <?php //Documentation Links
          $documentationLinks = get_field('divisionInternal_documentation');
            $linkBlock_icon = $documentationLinks['linkBlock_icon'];
            $linkBlock_title = $documentationLinks['linkBlock_title'];
            $linkBlock_list = $documentationLinks['linkBlock_list'];
        if( $linkBlock_title != '' ):
      ?>
        <div class="sidebar sidebar__wrapper <?php echo $divisionClass; ?>">
          <?php
            include ( locate_template( 'templates/20-general/260-link-block-feature.php', false, false ));
          ?>
        </div>
      <?php endif; ?>
    </section>
</div>

  </div>


  <?php // Video Playlist
    if( get_field('divisionInternal_video') != '' ):
      $divisionInternal_video = 'divisionInternal_video';
        $videoPlaylist = $divisionInternal_video . '_videoPlaylist';
  ?>
    <section class="video-playlist video-playlist--division-internal <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/50-promotions/540-video-playlist.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Featured division solution and simulator
    if( get_field('divisionInternal_features') != '' ):
      $features = get_field('divisionInternal_features');
        $divisionFeature_headline = $features['divisionFeature_headline'];
        $divisionFeature_solution = $features['divisionFeature_solution'];
        $divisionFeature_simulator = $features['divisionFeature_simulator'];
  ?>
    <section class="division-feature division-feature--division-internal <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/40-divisions/410-division-feature-block.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Testimonial
    if( get_field('divisionInternal_testimonial') != '' ):
      $testimonial = get_field('divisionInternal_testimonial');
        $testimonial_link = $testimonial['testimonial_link'];
  ?>
    <section class="testimonial testimonial--division-internal <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/50-promotions/530-testimonial.php', false, false ));
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

<?php endwhile; ?>
