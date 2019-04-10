<?php while (have_posts()) : the_post(); ?>

  <?php get_template_part('templates/page', 'header'); ?>


  <?php //Dynamic Slider
    if( get_field('homepage_slider') != '' ):
      $homepageSlider = 'homepage_slider';
        $slide = $homepageSlider . '_dynamicSlider'; // Repeater
  ?>
    <section id="slider" class="slider slider--homepage flexslider">
      <?php
        include ( locate_template( 'templates/10-sliders/110-dynamic-slider.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Intro Content
    if( get_field('homepage_intro') != '' ):
      $introContent = get_field('homepage_intro');
        $centeredContent_headline = $introContent['centeredContent_headline'];
        $centeredContent_body = $introContent['centeredContent_body'];
  ?>
    <section class="centered-content centered-content--homepage">
      <?php
        include ( locate_template( 'templates/20-general/201-leading-centered-content.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Category Headings
    if( get_field('homepage_categoryHeadings') != '' ):
      $categoryHeading = 'homepage_categoryHeadings';
        $heading = $categoryHeading . '_heading'; // Repeater
  ?>
    <section class="category-heading category-heading--homepage">
      <?php
        include ( locate_template( 'templates/30-options/300-category-heading.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Solution and Simulator Categories
    if( get_field('homepage_categories') != '' ):
      $categories = 'homepage_categories';
        $categoryFeature = $categories . '_categoryFeature'; // Repeater
  ?>
    <section class="category-feature category-feature--homepage">
      <?php
        include ( locate_template( 'templates/30-options/330-category-feature-block.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Division Intro Area
    if( get_field('homepage_divisionIntro') != '' ):
      $introContent = get_field('homepage_divisionIntro');
        $centeredContent_headline = $introContent['centeredContent_headline'];
        $centeredContent_body = $introContent['centeredContent_body'];
  ?>
    <section class="division-intro division-intro--homepage">
      <?php
        include ( locate_template( 'templates/20-general/200-centered-content.php', false, false ));
      ?>
      <div class="division-intro division-intro__grid">
        <?php
          $homepage_divisionGrid = "homepage_divisionGrid";
            $divisionGrid = $homepage_divisionGrid . '_divisionGrid'; // Repeater
          include ( locate_template( 'templates/20-general/221-division-logo-grid.php', false, false ));
        ?>
      </div>
    </section>
  <?php endif; ?>

<?php endwhile; ?>
