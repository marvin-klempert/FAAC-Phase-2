<?php
/**
 * Template Name: Content - Videos (6.1)
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
    if( get_field('newsVideos_slider') != '' ):
      $slider = get_field('newsVideos_slider');
        $slider_gallery = $slider['slider_gallery'];
        $slider_category = $slider['slider_category'];
        $slider_upperText = $slider['slider_upperText'];
        $slider_lowerText = $slider['slider_lowerText'];
  ?>
    <section class="slider slider--content-videos <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/10-sliders/100-basic-slider.php', false, false ));
      ?>
    </section>
  <?php endif; ?>

  <?php // Breadcrumbs ?>
  <section class="breadcrumbs breadcrumbs--content-videos <?php echo $divisionClass; ?>">
    <div class="breadcrumbs <?php echo $divisionClass; ?>" typeof="BreadcrumbList" vocab="https://schema.org/">
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
        if( get_field('newsVideos_article') != '' ):
          $bodyContent = get_field('newsVideos_article');
            $article_headline = $bodyContent['article_headline'];
            $article_body = $bodyContent['article_body'];
      ?>
        <section class="posts posts--content-resources posts--content-news <?php echo $divisionClass; ?>">
          <?
            include ( locate_template( 'templates/20-general/240-article.php', false, false ));
          ?>
        </section>
      <?php endif; ?>

      <section class="sidebar sidebar--content-resources sidebar--content-news">
        <?php //Sub Pages Links
          $subPages = get_field('newsVideos_subPages');
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
      </section>

    </div>
  </div>

<?php endwhile; ?>
