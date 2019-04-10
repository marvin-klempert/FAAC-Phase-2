<?php
  // override $post
  $post = $featured_simulatorSolution;
  setup_postdata( $post );
 ?>
<div class="featured-simulator featured-simulator__wrapper">
  <div class="featured-simulator featured-simulator__detail">
    <h2 class="featured-simulator featured-simulator__headline">
      <?php echo $featured_headline ?>
    </h2>
    <div class="featured-simulator featured-simulator__description">
      <?php echo get_field('simulator_description'); ?>
    </div>
  </div>
  <div class="featured-simulator featured-simulator__simulator">
    <a href="<?php the_permalink(); ?>" class="feature-row feature-row__link">
    <img class="featured-simulator featured-simulator__image"
      src="<?php echo get_field('simulator_thumbnail')['sizes']['preload']; ?>"
      data-src="<?php echo get_field('simulator_thumbnail')['sizes']['w640']; ?>"
      data-src-retina="<?php echo get_field('simulator_thumbnail')['sizes']['w1100']; ?>"
      height="<?php echo get_field('simulator_thumbnail')['sizes']['w1100-height']; ?>"
      width="<?php echo get_field('simulator_thumbnail')['sizes']['w1100-width']; ?>"
      alt="<?php echo get_field('simulator_thumbnail')['alt']; ?>"
    />
      <div class="feature-row feature-row__overlay">
        <h3 class="featured-simulator featured-simulator__title">
          <?php the_title(); ?>
        </h3>
      </div>
    <?php wp_reset_postdata(); ?>
    </a>
  </div>
</div>
