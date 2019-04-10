<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>


<?php // Defines a division class to add to sections
$category = get_the_terms( get_the_ID(), 'category' );

$categoryName = $category[0]->name;
  if( $categoryName == 'FAAC Commercial' ){
    $categoryName = 'faac-commercial';
  } elseif( $categoryName == 'FAAC Military' ){
    $categoryName = 'faac-military';
  } elseif( $categoryName == 'MILO Range' ){
    $categoryName = 'milo-range';
  } elseif( $categoryName == 'Realtime Technologies' ){
    $categoryName = 'rti';
  } else {
    $categoryName = '';
  }
?>


<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class($categoryName); ?>>
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

      if( $categoryName == '' ):
        get_template_part('templates/header');
      else:
        get_template_part('templates/header-category');
      endif;
    ?>

  <?php include Wrapper\template_path(); ?>





  <?php
  // Video Promotion Area
  ?>
  <section class="video-promotion <?php echo $categoryName; ?>">
  <?php

    $videoPromo_headline = get_field('videoPromo_headline', 'option');
    $videoPromo_link = get_field('videoPromo_link', 'option');

    include ( locate_template( 'templates/50-promotions/560-video-promotion.php', false, false ));
  ?>
  </section>


  <?php
  // Photo Promotion Area
  ?>
  <section class="photo-promotion <?php echo $categoryName; ?>">
  <?php

    $photoPromo_headline = get_field('photoPromo_headline', 'option');
    $photoPromo_excerpt = get_field('photoPromo_excerpt', 'option');
    $photoPromo_background = get_field('photoPromo_background', 'option');
    $photoPromo_page = get_field('photoPromo_page', 'option');

    include ( locate_template( 'templates/50-promotions/570-photo-promotion.php', false, false ));

  ?>
  </section>


  <?php
  // Footer Links
  ?>
   <section class="promotion-links <?php echo $categoryName; ?>">
    <?php

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

        if( $categoryName == '' ):
          get_template_part('templates/footer');
        else:
          get_template_part('templates/footer-category');
        endif;

        wp_footer();
      ?>
    </div>
  </body>
</html>
