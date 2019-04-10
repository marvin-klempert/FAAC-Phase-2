<?php
/**
 * Template Name: Divisions - Category (D5)
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>

  <?php // Slider area
    if( get_field('divisionCategory_slider') != '' ):
      $slider = get_field('divisionCategory_slider');
        $slider_gallery = $slider['slider_gallery'];
        $slider_category = $slider['slider_category'];
        $slider_upperText = $slider['slider_upperText'];
        $slider_lowerText = $slider['slider_lowerText'];
  ?>
    <section class="slider slider--division-category">
      <?php
        include ( locate_template( 'templates/10-sliders/100-basic-slider.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


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


  <?php // Breadcrumbs ?>
  <section class="breadcrumbs breadcrumbs--division-category <?php echo $divisionClass; ?>">
    <div class="breadcrumbs <?php echo $divisionClass; ?>" typeof="BreadcrumbList" vocab="https://schema.org/">
      <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }
      ?>
    </div>
  </section>


  <?php //Intro Content area
    if( get_field('divisionCategory_intro') != '' ):
      $introContent = get_field('divisionCategory_intro');
        $centeredContent_headline = $introContent['centeredContent_headline'];
        $centeredContent_body = $introContent['centeredContent_body'];
  ?>
    <section class="centered-content centered-content--division-category <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/20-general/200-centered-content.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Category solutions & simulators
    if( get_field('divisionCategory_options') != '' ):
      $options = 'divisionCategory_options';
        $featureRow = $options . '_featureRow';
  ?>
    <section class="feature-row feature-row--division-category <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/40-divisions/440-division-feature-row.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Secondary content
    $secondaryContent = get_field('divisionCategory_secondaryContent');
      $columnedContent_headline = $secondaryContent['columnedContent_headline'];
      $columnedContent_body = $secondaryContent['columnedContent_body'];
    if( $columnedContent_headline != '' ):
  ?>
    <section class="columned-content columned-content--division-category <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/20-general/210-columned-content.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Featured division solution and simulator
    if( get_field('divisionCategory_features') != '' ):
      $features = get_field('divisionCategory_features');
        $divisionFeature_headline = $features['divisionFeature_headline'];
        $divisionFeature_solution = $features['divisionFeature_solution'];
        $divisionFeature_simulator = $features['divisionFeature_simulator'];
  ?>
    <section class="division-feature division-feature--division-category <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/40-divisions/410-division-feature-block.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Testimonial
    if( get_field('divisionCategory_testimonial') != '' ):
      $testimonial = get_field('divisionCategory_testimonial');
        $testimonial_link = $testimonial['testimonial_link'];
  ?>
    <section class="testimonial testimonial--division-category <?php echo $divisionClass; ?>">
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
