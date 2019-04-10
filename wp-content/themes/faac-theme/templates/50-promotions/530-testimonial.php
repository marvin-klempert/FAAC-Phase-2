<?php

  //override $post
  $post = $testimonial_link;
  setup_postdata( $post );

?>
  <div class="testimonial testimonial__wrapper" style="background-image: url('<?php echo get_field('testimonial_background'); ?>');">
   <div class="testimonial testimonial__wrapper-container">
    <img class="testimonial testimonial__logo"
      src="<?php the_post_thumbnail_url(); ?>"
      alt="<?php the_title(); ?>"
    />
    <div class="testimonial testimonial__content">
      <?php the_excerpt(); ?>
   <div class="testimonial testimonial__source">
      <?php the_title(); ?>
    </div>
      </div>
	  </div>

  </div>
<?php wp_reset_postdata(); ?>
