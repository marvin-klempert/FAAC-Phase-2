<?php
/**
 * Template Name: Simulators - Child (4.2)
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
    if( get_field('simulationsChild_slider') != '' ):
      $slider = get_field('simulationsChild_slider');
        $slider_gallery = $slider['slider_gallery'];
        $slider_category = $slider['slider_category'];
        $slider_upperText = $slider['slider_upperText'];
        $slider_lowerText = $slider['slider_lowerText'];
  ?>
    <section class="slider slider--simulator-child <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/10-sliders/100-basic-slider.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Breadcrumbs & Flags ?>
  <div class="breadcrumbs-flags breadcrumbs-flags--simulator-child <?php echo $divisionClass; ?>">
    <?php // Breadcrumbs ?>
    <section class="breadcrumbs breadcrumbs--simulator-child <?php echo $divisionClass; ?>">
      <div class="breadcrumbs <?php echo $divisionClass; ?>" typeof="BreadcrumbList" vocab="https://schema.org/">
          <?php if(function_exists('bcn_display'))
          {
              bcn_display();
          }?>
      </div>
    </section>

    <?php //Sector Flag ?>
    <section class="sector-flag sector-flag--simulator-child <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/20-general/280-sector-flag.php', false, false ));
      ?>
    </section>

    <?php //Division Flag ?>
    <section class="division-flag division-flag--simulator-child <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/40-divisions/430-division-flag.php', false, false ));
      ?>
    </section>
  </div>



  <?php // Intro Content
    if( get_field('simulationsChild_intro') != '' ):
      $introContent = get_field('simulationsChild_intro');
        $mediaBlock_direction = $introContent['mediaBlock_direction'];
        $mediaBlock_image = $introContent['mediaBlock_image'];
        $mediaBlock_headline = $introContent['mediaBlock_headline'];
        $mediaBlock_subImage = $introContent['mediaBlock_subImage'];
        $mediaBlock_content = $introContent['mediaBlock_content'];
  ?>
    <section class="intro-content intro-content--simulator-child <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/20-general/250-media-block.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Video Playlist
    $simulationsChild_videos = 'simulationsChild_videos';
      $videoPlaylist = $simulationsChild_videos . '_videoPlaylist';

    if( have_rows( $videoPlaylist ) ):
  ?>
    <section class="video-playlist video-playlist--simulator-child <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/50-promotions/540-video-playlist.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Simulations Features area
    if( get_field('simulationsChild_features') != '' ):
      $simulationFeatures = get_field('simulationsChild_features');
        $centeredContent_headline = $simulationFeatures['centeredContent_headline'];
        $centeredContent_body = $simulationFeatures['centeredContent_body'];
  ?>
    <section class="centered-content centered--content--simulator-child <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/20-general/200-centered-content.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Feature Block
    if( get_field('simulationsChild_featureBlocks') != '' ):
      $featureBlocks = 'simulationsChild_featureBlocks';
        $featureBlock = $featureBlocks . '_featureBlock';
  ?>
    <section class="feature-blocks feature-blocks--simulator-child <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/20-general/230-feature-block.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Secondary Content
      $secondaryContent = get_field('simulationsChild_secondaryContent');
        $article_headline = $secondaryContent['article_headline'];
        $article_body = $secondaryContent['article_body'];

      if( $article_headline != '' ):
  ?>
    <section class="secondary-content secondary-content--simulator-child <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/20-general/240-article.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Documentation Links
      $documentationLinks = get_field('simulationsChild_documentation');
        $linkBlock_icon = $documentationLinks['linkBlock_icon'];
        $linkBlock_title = $documentationLinks['linkBlock_title'];
        $linkBlock_list = $documentationLinks['linkBlock_list']; // Repeater
    if( $linkBlock_title != '' ):
  ?>
    <section class="documentation-links documentation-links--simulator-child <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/20-general/260-link-block-feature.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Main Simulator
    if( get_field('simulationsChild_simulator') != '' ):
      $mainSimulator = get_field('simulationsChild_simulator');
        $mainSimulator_page = $mainSimulator['mainSimulator_page'];
        $mainSimulator_headline = $mainSimulator['mainSimulator_headline'];
        $mainSimulator_description = $mainSimulator['mainSimulator_description'];
        $mainSimulator_buttonText = $mainSimulator['mainSimulator_buttonText'];
  ?>
    <section class="main-simulator main-simulator--simulator-child <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/30-options/341-main-simulator.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Related Links
    if( get_field('simulationsChild_relatedLinks') != '' ):
      $relatedLinks = 'simulationsChild_relatedLinks';
        $linkColumn = $relatedLinks . '_linkColumn'; // Repeater
  ?>
    <section class="related-links related-links--simulator-child <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/30-options/360-related-links-block.php', false, false ));
      ?>
    </section>
  <?php endif; ?>

  <?php // Category Links
    if( 'simulationsChild_categoryLinks' != '' ):
      $categoryLinks = 'simulationsChild_categoryLinks';
        $categoryLinks_categories = $categoryLinks . '_categoryLinks_categories';
  ?>
    <section class="category-heading category-heading--simulator-child <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/30-options/370-category-links-block.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php //Division promotion
    if( get_field('simulationsChild_divisionPromo') != '' ):
      $divisionPromo = get_field('simulationsChild_divisionPromo');
        $divisionPromo_select = $divisionPromo['divisionPromo_select'];
  ?>
    <section class="division-promotion division-promotion--simulator-child <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/50-promotions/510-division-promotion.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php //Testimonial
    if( get_field('simulationsChild_testimonial') != '' ):
      $testimonial = get_field('simulationsChild_testimonial');
        $testimonial_link = $testimonial['testimonial_link'];
  ?>
    <section class="testimonial testimonial--simulator-child <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/50-promotions/530-testimonial.php', false, false ));
      ?>
    </section>
  <?php endif; ?>

<?php endwhile; ?>
