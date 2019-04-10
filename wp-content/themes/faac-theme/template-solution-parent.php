<?php
/**
 * Template Name: Solutions - Parent (2)
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


  <?php //Slider area
    if( get_field('solutionsParent_slider') != '' ):

      $slider = get_field('solutionsParent_slider');
        $slider_gallery = $slider['slider_gallery'];
        $slider_category = $slider['slider_category'];
        $slider_upperText = $slider['slider_upperText'];
        $slider_lowerText = $slider['slider_lowerText'];
  ?>
    <section class="slider slider--solution-parent <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/10-sliders/100-basic-slider.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php //Breadcrumbs ?>
  <section class="breadcrumbs breadcrumbs--solution-parent <?php echo $divisionClass; ?>">
    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
    <?php
      if( function_exists('bcn_display') ):
        bcn_display();
      endif;
    ?>
    </div>
  </section>


  <?php //Intro Content area
    if( get_field('solutionsParent_intro') != '' ):
      $introContent = get_field('solutionsParent_intro');
        $centeredContent_headline = $introContent['centeredContent_headline'];
        $centeredContent_body = $introContent['centeredContent_body'];
  ?>
    <section class="centered-content centered-content--solution-parent <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/20-general/200-centered-content.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php //Category Headings
    if( get_field('solutionsParent_training') != '' ):
      $categoryHeading = 'solutionsParent_training';
        $heading = $categoryHeading . '_heading';
  ?>
    <section class="category-heading category-heading--solution-parent <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/30-options/300-category-heading.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Category Detail Block
    if( get_field('solutionsParent_training') != '' ):
      $solutionsParent_training = 'solutionsParent_training';
        $categoryDetail = $solutionsParent_training . '_categoryDetail';
  ?>
    <section class="category-detail category-detail--solution-parent <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/30-options/320-category-detail-block.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Featured Simulator
    if( get_field('solutionsParent_feature') != '' ):
      $solutionsParent_feature = get_field('solutionsParent_feature');
        $featured_simulatorSolution = $solutionsParent_feature['featured_simulatorSolution'];
        $featured_headline = $solutionsParent_feature['featured_headline'];
  ?>
    <section class="featured-simulator featured-simulator--solutions-parent <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/30-options/340-featured-simulator-solution.php', false, false ));
      ?>
    </section>
  <?php endif; ?>

<?php endwhile; ?>
