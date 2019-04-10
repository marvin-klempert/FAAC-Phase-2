<?php
/**
 * Template Name: Divisions - Index (D1)
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>

  <?php // Slider area
    if( get_field('divisionIndex_slider') != '' ):
      $slider = get_field('divisionIndex_slider');
        $slider_gallery = $slider['slider_gallery'];
        $slider_category = $slider['slider_category'];
        $slider_upperText = $slider['slider_upperText'];
        $slider_lowerText = $slider['slider_lowerText'];
  ?>
    <section class="slider slider--division-index">
      <?php
        include ( locate_template( 'templates/10-sliders/100-basic-slider.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Breadcrumbs ?>
  <section class="breadcrumbs breadcrumbs--division-index">
    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
      <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }
      ?>
    </div>
  </section>


  <?php // Intro Content
    if( get_field('divisionIndex_intro') != '' ):
      $introContent = get_field('divisionIndex_intro');
        $centeredContent_headline = $introContent['centeredContent_headline'];
        $centeredContent_body = $introContent['centeredContent_body'];
  ?>
    <section class="centered-content centered-content--division-index">
      <?php
        include ( locate_template( 'templates/20-general/200-centered-content.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Division Grid
    if( get_field('divisionIndex_divisions') != '' ):
      $divisions = get_field('divisionIndex_divisions');
        $divisionSummary = 'divisionIndex_divisions' . '_divisionSummary';
  ?>
    <section class="division-summaries division-summaries--division-index">
      <?php
        include ( locate_template( 'templates/40-divisions/400-division-summaries.php', false, false ));
      ?>
    </section>
  <?php endif; ?>

<?php endwhile; ?>
