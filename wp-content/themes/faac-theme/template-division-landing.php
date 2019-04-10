<?php
/**
 * Template Name: Division - Landing (D8)
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
    $slider = 'divisionLanding_dynamicSlider';
      $slide = $slider . '_dynamicSlider';
  ?>
  <section id="slider" class="slider slider--content-landing flexslider">
    <?php
      include ( locate_template( 'templates/10-sliders/110-dynamic-slider.php', false, false ));
    ?>
  </section>


  <?php // Breadcrumbs ?>
  <section class="breadcrumbs breadcrumbs--content-landing <?php echo $divisionClass; ?>">
    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
      <?php if(function_exists('bcn_display'))
        {
          bcn_display();
        }
      ?>
    </div>
  </section>


  <?php // Intro Content w/ Image
    if( get_field('divisionLanding_intro') != '' ):
      $introContent = get_field('divisionLanding_intro');
        $mediaBlock_direction = $introContent['mediaBlock_direction'];
        $mediaBlock_image = $introContent['mediaBlock_image'];
        $mediaBlock_headline = $introContent['mediaBlock_headline'];
        $mediaBlock_subImage = $introContent['mediaBlock_subImage'];
        $mediaBlock_content = $introContent['mediaBlock_content'];
  ?>
    <section class="media-block media-block--content-landing <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/20-general/251-leading-media-block.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Secondary Content
    if( get_field('divisionLanding_secondaryContent') != '' ):
      $secondaryContent = get_field('divisionLanding_secondaryContent');
        $article_headline = $secondaryContent['article_headline'];
        $article_body = $secondaryContent['article_body'];
  ?>
    <section class="body-content body-content--content-landing <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/20-general/240-article.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Feature Block
    if( get_field('divisionLanding_featureBlocks') != '' ):
      $featureBlocks = 'divisionLanding_featureBlocks';
        $featureBlock = $featureBlocks . '_featureBlock';
  ?>
    <section class="feature-blocks feature-blocks--content-landing <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/20-general/230-feature-block.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php //Sector Solutions
    if( get_field('divisionLanding_sectorSolutions') != '' ):
      $sectorSolutions = 'divisionLanding_sectorSolutions';
        $featureRow = "{$sectorSolutions}_featureRow"; // Repeater
  ?>
    <section class="feature-row feature-row--content-landing <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/30-options/350-feature-row.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php //Sector Simulators
    if( get_field('divisionLanding_sectorSimulators') != '' ):
      $sectorSimulators = 'divisionLanding_sectorSimulators';
        $featureRow = "{$sectorSimulators}_featureRow"; // Repeater
  ?>
    <section class="feature-row feature-row--content-landing <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/30-options/350-feature-row.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Video Playlist
    $divisionLanding_videos = 'divisionLanding_videos';
      $videoPlaylist = $divisionLanding_videos . '_videoPlaylist';

    if( have_rows( $videoPlaylist ) ):
  ?>
    <section class="video-playlist video-playlist--content-landing <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/50-promotions/540-video-playlist.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php //Documentation Links
      $documentationLinks = get_field('divisionLanding_documentation');
        $linkBlock_icon = $documentationLinks['linkBlock_icon'];
        $linkBlock_title = $documentationLinks['linkBlock_title'];
        $linkBlock_list = $documentationLinks['linkBlock_list'];

    if( $linkBlock_title != '' ):
  ?>
    <section class="sidebar sidebar--content-landing <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/20-general/260-link-block-feature.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Division promotion
    if( get_field('divisionLanding_divisionPromo') != '' ):
      $divisionPromo = get_field('divisionLanding_divisionPromo');
        $divisionPromo_select = $divisionPromo['divisionPromo_select'];
  ?>
    <section class="division-promotion division-promotion--content-landing <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/50-promotions/510-division-promotion.php', false, false ));
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


  <?php //Testimonial
    if( get_field('divisionLanding_testimonial') != '' ):
      $testimonial = get_field('divisionLanding_testimonial');
        $testimonial_link = $testimonial['testimonial_link'];
  ?>
    <section class="testimonial testimonial--content-landing <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/50-promotions/530-testimonial.php', false, false ));
      ?>
    </section>
  <?php endif; ?>

<?php endwhile; ?>
