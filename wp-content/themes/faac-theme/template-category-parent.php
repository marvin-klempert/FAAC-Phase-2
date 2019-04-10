<?php
/**
 * Template Name: Category - Parent (3)
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
    if( get_field('categoryParent_slider') != '' ):
      $slider = get_field('categoryParent_slider');
        $slider_gallery = $slider['slider_gallery'];
        $slider_category = $slider['slider_category'];
        $slider_upperText = $slider['slider_upperText'];
        $slider_lowerText = $slider['slider_lowerText'];
  ?>
    <section class="slider slider--category-parent <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/10-sliders/100-basic-slider.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Breadcrumbs & Flags ?>
  <div class="breadcrumbs-flags breadcrumbs-flags--simulator-child <?php echo $divisionClass; ?>">
    <section class="breadcrumbs breadcrumbs--category-parent <?php echo $divisionClass; ?>">
      <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
          <?php if(function_exists('bcn_display'))
          {
              bcn_display();
          }?>
      </div>
    </section>

    <?php //Division Flag ?>
    <section class="division-flag division-flag--category-parent <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/40-divisions/430-division-flag.php', false, false ));
      ?>
    </section>
  </div>


  <?php // Intro Content area
    if( get_field('categoryParent_intro') ):
      $introContent = get_field('categoryParent_intro');
        $centeredContent_headline = $introContent['centeredContent_headline'];
        $centeredContent_body = $introContent['centeredContent_body'];
  ?>
    <section class="centered-content centered-content--category-parent <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/20-general/200-centered-content.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php //Category Solutions and Simulators
    if( get_field('categoryParent_optionsRow') ):
      $optionsRow = 'categoryParent_optionsRow';
        $featureRow = $optionsRow . '_featureRow'; // Repeater
  ?>
    <section class="feature-row feature-row--category-parent <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/30-options/350-feature-row.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Columned Content
    if( get_field('categoryParent_secondaryContent') != '' ):
    $secondaryContent = get_field('categoryParent_secondaryContent');
      $columnedContent_headline = $secondaryContent['columnedContent_headline'];
      $columnedContent_body = $secondaryContent['columnedContent_body'];
  ?>
    <section class="columned-content columned-content--category-parent <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/20-general/210-columned-content.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Promotion Row
    if( get_field('categoryParent_doublePromo') != '' ):
      $promotionRow = get_field('categoryParent_doublePromo');
        $doublePromo_category = $promotionRow['doublePromo_category'];
        $doublePromo_type = $promotionRow['doublePromo_type'];
        $doublePromo_division = $promotionRow['doublePromo_division'];
  ?>
    <section class="promotion-row promotion-row--category-parent <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/50-promotions/500-simulator-solution-plus-division-promotion.php', false, false ));
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


  <?php // Testimonial
    if( get_field('categoryParent_testimonial') ):
      $testimonial = get_field('categoryParent_testimonial');
        $testimonial_link = $testimonial['testimonial_link'];
  ?>
    <section class="testimonial testimonial--category-parent <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/50-promotions/530-testimonial.php', false, false ));
      ?>
    </section>
  <?php endif;?>


<?php endwhile; ?>
