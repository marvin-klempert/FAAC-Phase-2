<?php
/**
 * Template Name: Simulators - Parent (1.2)
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


  <?php // Slider Area
    if( get_field('simulatorsParent_slider') != '' ):
      $slider = get_field('simulatorsParent_slider');
        $slider_gallery = $slider['slider_gallery'];
        $slider_category = $slider['slider_category'];
        $slider_upperText = $slider['slider_upperText'];
        $slider_lowerText = $slider['slider_lowerText'];
  ?>
    <section class="slider slider--simulator-parent <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/10-sliders/100-basic-slider.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Breadcrumbs ?>
  <section class="breadcrumbs breadcrumbs--simulator-parent <?php echo $divisionClass; ?>">
    <div class="breadcrumbs <?php echo $divisionClass; ?>" typeof="BreadcrumbList" vocab="https://schema.org/">
      <?php if(function_exists('bcn_display'))
      {
          bcn_display();
      }?>
    </div>
  </section>


  <?php // Intro Content
    if( get_field('simulatorsParent_intro') != '' ):
      $introContent = get_field('simulatorsParent_intro');
        $centeredContent_headline = $introContent['centeredContent_headline'];
        $centeredContent_body = $introContent['centeredContent_body'];
  ?>
    <section class="body-content body-content--simulator-parent <?php echo $divisionClass; ?>">
      <div class="body-content body-content__wrapper <?php echo $divisionClass; ?>">
        <?php
          include ( locate_template( 'templates/20-general/200-centered-content.php', false, false ));
        ?>
      </div>
    </section>
  <?php endif; ?>


  <?php // Training Simulators ?>
  <section class="simulators-block simulators-block--simulators-parent <?php echo $divisionClass; ?>">

    <?php // Category Headings
      if( get_field('simulatorsParent_training') != '' ): 
        $trainingHeading = 'simulatorsParent_training';
          $heading = $trainingHeading . '_heading'; // Repeater
    ?>
      <div class="simulators-block simulators-block__training-heading <?php echo $divisionClass; ?>">
        <?php
          include ( locate_template( 'templates/30-options/300-category-heading.php', false, false ));
        ?>
      </div>
    <?php endif;?>

    <?php // Category Row
      if( get_field('simulatorsParent_training') != '' ):
        $trainingItems = 'simulatorsParent_training';
          $categoryRow = $trainingItems . '_categoryRow';
    ?>
      <div class="simulators-block simulators-block__training-row <?php echo $divisionClass; ?>">
        <?php
          include ( locate_template( 'templates/30-options/310-category-row.php', false, false ));
        ?>
      </div>
    <?php endif; ?>

    <?php // Feature Text
      if( get_field('simulatorsParent_training') != '' ):
        $trainingText = get_field('simulatorsParent_training');
          $featureText = $trainingText['featureText'];
    ?>
      <div class="simulators-block simulators-block__feature-text <?php echo $divisionClass; ?>">
        <?php
          include ( locate_template( 'templates/20-general/270-feature-text-block.php', false, false ));
        ?>
      </div>
    <?php endif; ?>
  </section>


  <?php // Research Simulators ?>
  <section class="simulators-block simulators-block--simulators-parent <?php echo $divisionClass; ?>">
    <?php // Category Headings
      if( get_field('simulatorsParent_research') != '' ):
        $researchHeading = 'simulatorsParent_research';
          $heading = $researchHeading . '_heading';
    ?>
      <div class="simulators-block simulators-block__research-heading <?php echo $divisionClass; ?>">
        <?php
          include ( locate_template( 'templates/30-options/300-category-heading.php', false, false ));
        ?>
      </div>
    <?php endif; ?>

    <?php // Feature Text
        if( get_field('simulatorsParent_research') != '' ):
          $researchItems = get_field('simulatorsParent_research');
            $featureText = $researchItems['featureText'];
    ?>
      <div class="simulators-block simulators-block__feature-text <?php echo $divisionClass; ?>">
        <?php
          include ( locate_template( 'templates/20-general/270-feature-text-block.php', false, false ));
        ?>
      </div>
    <?php endif; ?>
  </section>


  <?php // Featured Simulator
    if( get_field('simulatorsParent_feature') != '' ):
      $featuredSimulator = get_field('simulatorsParent_feature');
        $featured_simulatorSolution = $featuredSimulator['featured_simulatorSolution'];
        $featured_headline = $featuredSimulator['featured_headline'];
        $featured_description = $featuredSimulator['featured_description'];
  ?>
    <section class="featured-simulator featured-simulator--simulator-parent <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/30-options/340-featured-simulator-solution.php', false, false ));
      ?>
    </section>
  <?php endif; ?>

<?php endwhile; ?>
