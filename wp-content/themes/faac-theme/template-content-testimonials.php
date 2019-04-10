<?php
/**
 * Template Name: Content - Testimonials (6.3)
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>


  <?php // Slider area
    if( get_field('testimonials_slider') != '' ):
      $slider = get_field('testimonials_slider');
        $slider_gallery = $slider['slider_gallery'];
        $slider_category = $slider['slider_category'];
        $slider_upperText = $slider['slider_upperText'];
        $slider_lowerText = $slider['slider_lowerText'];
  ?>
    <section class="slider slider--content-testimonials">
      <?php
        include ( locate_template( 'templates/10-sliders/100-basic-slider.php', false, false ));
      ?>
    </section>
  <?php endif; ?>

  <?php // Breadcrumbs ?>
  <section class="breadcrumbs breadcrumbs--content-testimonials">
    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
      <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }
      ?>
    </div>
  </section>
  
<div class="content-wrapper content-wrapper--content-general">
<div class="content-wrapper content-wrapper-container--content-general">
  <section class="posts posts--content-resources posts--content-news">
    <div class="body-content body-content__wrapper">
      <?php
        $query = new WP_Query(
          array(
            'post_type' => 'testimonial',
            'post_status' => 'publish'
          )
        );

        while( $query->have_posts() ):
          $query->the_post();
      ?>
        <div class="entry-content">
          <h3 class="testimonial__title"><?php the_title(); ?></h3>
          <?php
            if ( has_post_thumbnail() ) {
              the_post_thumbnail();
            } 
          ?>
          <?php the_content(); ?>
        </div>
      <?php
        endwhile;
        wp_reset_query();
      ?>
    </div>
  </section>


  <section class="sidebar sidebar--content-resources sidebar--content-news">

    <?php //Sub Pages Links
      $subPages = get_field('testimonials_subPages');
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
  </section><!-- /.sidebar --></div></div>

<?php endwhile; ?>
