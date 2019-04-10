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

  <?php $headerBackground = get_field('faac_postHeader', 'option'); ?>
  <section class="post-header">
    <img class="post-header post-header__image" 
      src="<?php echo $headerBackground['url']; ?>"
      alt="<?php echo $headerBackground['alt']; ?>"
    />
    <figcaption class="slider slider__caption">
      <h2 class="slider slider__text">
        FAAC Resources
        <br>
        <span class="slider slider__text slider__text--bigger"> 
          <?php the_title(); ?>
        </span>
      </h2>
    </figcaption>
  </section>

  <div class="entry-attachment">
    <?php
      $image_size = apply_filters( 'wporg_attachment_size', 'large' ); 
      echo wp_get_attachment_image( get_the_ID(), $image_size );
      if ( has_excerpt() ):
    ?>
      <div class="entry-caption">
        <?php the_excerpt(); ?>
      </div><!-- .entry-caption -->
    <?php endif; ?>
  </div><!-- .entry-attachment -->

 <?php endwhile; ?>