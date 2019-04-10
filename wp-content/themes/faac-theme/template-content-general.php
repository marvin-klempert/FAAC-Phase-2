<?php
/**
 * Template Name: Content - General (5)
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
    if( get_field('generalContent_slider') != '' ):
    $slider = get_field('generalContent_slider');
      $slider_gallery = $slider['slider_gallery'];
      $slider_category = $slider['slider_category'];
      $slider_upperText = $slider['slider_upperText'];
      $slider_lowerText = $slider['slider_lowerText'];

  ?>
    <section class="slider slider--content-general <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/10-sliders/100-basic-slider.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Breadcrumbs ?>
  <section class="breadcrumbs breadcrumbs--content-general <?php echo $divisionClass; ?>">
    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
      <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }
      ?>
    </div>
  </section>

  <div class="content-wrapper content-wrapper--content-general <?php echo $divisionClass; ?>">
    <div class="content-wrapper content-wrapper-container--content-general <?php echo $divisionClass; ?>">

      <?php // General Content
        if( get_field('generalContent_introContent') != '' ):
          $bodyContent = get_field('generalContent_introContent');
            $article_headline = $bodyContent['article_headline'];
            $article_body = $bodyContent['article_body'];
      ?>
        <section class="body-content body-content--content-general <?php echo $divisionClass; ?>">
          <div class="body-content body-content__wrapper <?php echo $divisionClass; ?>">
            <?php
              if( post_password_required() ):
                echo get_the_password_form();
              endif;
              if ( ! post_password_required() ): // Some posts need password protection, so should be hidden.
                include ( locate_template( 'templates/20-general/240-article.php', false, false ));
              endif;
            ?>
          </div>
        </section>
      <?php endif; ?>

      <section class="sidebar sidebar--content-general <?php echo $divisionClass; ?>">

        <?php //Sub Pages Links
            $subPages = get_field('generalContent_subPages');
              $linkBlock_icon = $subPages['linkBlock_icon'];
              $linkBlock_title = $subPages['linkBlock_title'];
              $linkBlock_list = $subPages['linkBlock_list']; // Repeater
          if( $linkBlock_title != '' ):
        ?>
          <div class="sidebar sidebar__wrapper <?php echo $divisionClass; ?>">
            <?php
              include ( locate_template( 'templates/20-general/260-link-block-feature.php', false, false ));
            ?>
          </div>
      <?php endif; ?>

       <?php //Documentation Links
          $documentationLinks = get_field('generalContent_documentationLinks');
            $linkBlock_icon = $documentationLinks['linkBlock_icon'];
            $linkBlock_title = $documentationLinks['linkBlock_title'];
            $linkBlock_list = $documentationLinks['linkBlock_list']; // Repeater
        if( $linkBlock_title != '' ):
      ?>
        <div class="sidebar sidebar__wrapper <?php echo $divisionClass; ?>">
          <?php
            include ( locate_template( 'templates/20-general/260-link-block-feature.php', false, false ));
            ?>
          </div>
        <?php endif; ?>
      </section>
    </div>
  </div>

  <?php // Video Playlist
      $generalContent_videos = 'generalContent_videos';
        $videoPlaylist = $generalContent_videos . '_videoPlaylist';

      if( have_rows( $videoPlaylist ) ):
  ?>
    <section class="video-playlist video-playlist--content-general <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/50-promotions/540-video-playlist.php', false, false ));
      ?>
    </section>
  <?php endif; ?>



  <?php //Category headings area
    if( get_field('generalContent_headings') != '' ):
      $categoryHeading = 'generalContent_headings';
        $heading = $categoryHeading . '_heading';
  ?>
    <section class="category-heading category-heading--content-general <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/30-options/300-category-heading.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


  <?php // Content Row
    if( get_field('generalContent_categories') != '' ):
      $categories = 'generalContent_categories';
        $generalCategoryRow = $categories . '_generalCategoryRow';
  ?>
    <section class="category-row category-row--content-general <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/30-options/311-category-row-general.php', false, false ));
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
    if( get_field('generalContent_testimonial') != '' ):
      $testimonial = get_field('generalContent_testimonial');
        $testimonial_link = $testimonial['testimonial_link'];
  ?>
    <section class="testimonial testimonial--content-general <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/50-promotions/530-testimonial.php', false, false ));
      ?>
    </section>
  <?php endif; ?>

<?php endwhile; ?>
