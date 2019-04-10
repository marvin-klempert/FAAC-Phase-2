<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TB9D8MJ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="page-wrapper">

    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>

    <?php include Wrapper\template_path(); ?>


  <section class="category-heading category-heading--category-archive">
  <?php //Category headings area

    $categoryHeading = 'newsContent_headings';
      $heading = $categoryHeading . '_heading'; // Repeater

    include ( locate_template( 'templates/30-options/300-category-heading.php', false, false ));
  ?>
  </section>


  <section class="category-row category-row--category-archive">
  <?php //Category headings area

    $categories = 'newsContent_categories';
      $generalCategoryRow = $categories . '_generalCategoryRow'; // Repeater

    include ( locate_template( 'templates/30-options/311-category-row-general.php', false, false ));
  ?>
  </section>


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


  <?php
  // Video Promotion Area
  ?>
  <section class="video-promotion video-promotion--category-archive">
  <?php

    $videoPromo_headline = get_field('videoPromo_headline', 'option');
    $videoPromo_link = get_field('videoPromo_link', 'option');

    include ( locate_template( 'templates/50-promotions/560-video-promotion.php', false, false ));
  ?>
  </section>

  <?php
  // Photo Promotion Area
  ?>
  <section class="photo-promotion photo-promotion--category-archive">
  <?php

    $photoPromo_headline = get_field('photoPromo_headline', 'option');
    $photoPromo_excerpt = get_field('photoPromo_excerpt', 'option');
    $photoPromo_background = get_field('photoPromo_background', 'option');
    $photoPromo_page = get_field('photoPromo_page', 'option');

    include ( locate_template( 'templates/50-promotions/570-photo-promotion.php', false, false ));

  ?>
  </section>

  <section class="promotion-links promotion-links--category-archive">
  <?php
    // Promotion Links

    $news_link = get_field('news_link', 'option');
    $news_description = get_field('news_description', 'option');
    $news_image = get_field('news_image', 'option');

    $resources_link = get_field('resources_link', 'option');
    $resources_description = get_field('resources_description', 'option');
    $resources_image = get_field('resources_image', 'option');

    $careers_link = get_field('careers_link', 'option');
    $careers_description = get_field('careers_description', 'option');
    $careers_image = get_field('careers_image', 'option');

    include ( locate_template( 'templates/50-promotions/590-promotion-links.php', false, false ));
  ?>
  </section>

    <?php
      do_action('get_footer');
      get_template_part('templates/footer', 'division');
      wp_footer();
    ?>
    </div>
  </body>
</html>
