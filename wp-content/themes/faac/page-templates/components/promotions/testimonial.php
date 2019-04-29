<?php
/**
 * Promotional testimonial component
 *
 * @var object $testimonial     The testimonial object to draw from
 */

$division = get_division_class();
$testimonial = get_query_var( 'testimonial' );
$id = $testimonial->ID;
?>
<div class="testimonial<?php if($division){echo ' testimonial--' . $division;}?>">
  <div class="testimonial__container">
    <img class="testimonial__logo lazyload lazyload--blurUp"
      alt="<?php echo get_the_title($id); ?>" data-sizes="auto"
      data-src="<?php echo get_the_post_thumbnail_url($id, 'preload'); ?>"
      data-srcset="<?php echo get_the_post_thumbnail_url($id, 'preload'); ?> 64w,
        <?php echo get_the_post_thumbnail_url($id, '128w'); ?> 65w,
        <?php echo get_the_post_thumbnail_url($id, '240w'); ?> 129w,
        <?php echo get_the_post_thumbnail_url($id, '320w'); ?> 241w,
        <?php echo get_the_post_thumbnail_url($id, '375w'); ?> 321w,
        <?php echo get_the_post_thumbnail_url($id, '480w'); ?> 376w,
        <?php echo get_the_post_thumbnail_url($id, '540w'); ?> 481w,
        <?php echo get_the_post_thumbnail_url($id, '640w'); ?> 541w,
        <?php echo get_the_post_thumbnail_url($id, '720w'); ?> 641w,
        <?php echo get_the_post_thumbnail_url($id, '768w'); ?> 721w,
        <?php echo get_the_post_thumbnail_url($id, '800w'); ?> 769w,
        <?php echo get_the_post_thumbnail_url($id, '960w'); ?> 801w,
        <?php echo get_the_post_thumbnail_url($id, '1024w'); ?> 961w,
        <?php echo get_the_post_thumbnail_url($id, '1280w'); ?> 1025w,
        <?php echo get_the_post_thumbnail_url($id, '1366w'); ?> 1281w,
        <?php echo get_the_post_thumbnail_url($id, '1440w'); ?> 1367w,
        <?php echo get_the_post_thumbnail_url($id, '1600w'); ?> 1441w,
        <?php echo get_the_post_thumbnail_url($id, '1920w'); ?> 1601w,
        <?php echo get_the_post_thumbnail_url($id, '2560w'); ?> 1921w,
        <?php echo get_the_post_thumbnail_url($id, '3840w'); ?> 2561w,
      "
    />
    <div class="testimonial__content">
      <?php echo get_the_excerpt($id); ?>
    </div>
    <div class="testimonial__source">
      <?php echo get_the_title($id); ?>
    </div>
  </div>
</div>
