<?php
/**
 * Template Name: Division - Resources (D4.2)
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
    if( get_field('divisionResources_slider') != '' ):
      $slider = get_field('divisionResources_slider');
        $slider_gallery = $slider['slider_gallery'];
        $slider_category = $slider['slider_category'];
        $slider_upperText = $slider['slider_upperText'];
        $slider_lowerText = $slider['slider_lowerText'];
  ?>
    <section class="slider slider--division-resources <?php echo $divisionClass; ?>">
      <?php
        include ( locate_template( 'templates/10-sliders/100-basic-slider.php', false, false ));
      ?>
    </section>
  <?php endif; ?>

  <?php // Breadcrumbs ?>
  <section class="breadcrumbs breadcrumbs--division-resources <?php echo $divisionClass; ?>">
    <div class="breadcrumbs <?php echo $divisionClass; ?>" typeof="BreadcrumbList" vocab="https://schema.org/">
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
        <?php // Non-sector resource grid - only appears if there are resources marked with the current division but NOT marked with a sector

          $args = array(
            'post_type'   => 'attachment',
            'post_status' => 'inherit',
            'nopaging'    => true,
            'tax_query'   => array(
              'relation'    => 'AND',
              array(
                'taxonomy'  => 'division',
                'field'     => 'name',
                'operator'  => 'IN',
                'terms'     => array(
                  $divisionName
                )
              ),
              array(
                'taxonomy'    => 'sector',
                'field'       => 'slug',
                'operator'    => 'NOT IN',
                'terms'       => array(
                  'ems',
                  'fire',
                  'military',
                  'police',
                  'trainer',
                  'transit'
                )
              )
            )
          );
          $generalResources = new WP_Query( $args );

          if( $generalResources->have_posts() ):
        ?>
          <div class="body-content body-content__wrapper">
            <div class="body-content body-content__resources">
              <h3 class="body-content body-content__heading">
                General <?php echo $divisionName; ?> Resources
              </h3>
              <?php
                while( $generalResources->have_posts() ):
                  $generalResources->the_post();
                  $resource_id = get_the_ID();
                    $resource_link = wp_get_attachment_url($resource_id);
                    $resource_src = wp_get_attachment_image_src( $resource_id, 'thumbnail', false, '' );
              ?>
                <div class="body-content body-content__item">
                  <a class="body-content body-content__link" href="<?php echo $resource_link; ?>" download >
                    <img src="<?php echo $resource_src[0]; ?>" width="<?php echo $resource_src[1]; ?>" />
                    <br />
                    <?php the_title(); ?>
                  </a>
                </div>
              <?php
                endwhile;
              ?>
            </div>
          </div>
        <?php
          endif;
          wp_reset_postdata();
        ?>


        <?php // Sector resource grid(s)
          $resourceGrid = 'divisionResources_resourceBlocks' .'_resourceCategory';
          if( have_rows( $resourceGrid ) ):
            include( locate_template( 'templates/40-divisions/450-division-resource-grid.php', false, false ) );
          endif;
        ?>
      </section>

  <section class="sidebar sidebar--content-resources sidebar--division-resources">

    <?php //Sub Pages Links
      $subPages = get_field('divisionResources_subPages');
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


  <?php // Featured Division Links
    if( get_field('divisionResources_features') != '' ):
      $featuredLinks = get_field('divisionResources_features');
        $divisionFeature_headline = $featuredLinks['divisionFeature_headline'];
        $divisionFeature_solution = $featuredLinks['divisionFeature_solution'];
        $divisionFeature_simulator = $featuredLinks['divisionFeature_simulator'];
  ?>
    <section class="division-feature division-feature--division-resources <?php echo $divisionClass; ?>">
      <?php
        include( locate_template( 'templates/40-divisions/410-division-feature-block.php', false, false ));
      ?>
    </section>
  <?php endif; ?>


<?php endwhile; ?>
