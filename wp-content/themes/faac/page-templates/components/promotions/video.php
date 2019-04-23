<?php
/**
 * Video promotion area
 *
 * Promotional area with featured video(s) presented as slides. When clicked,
 * the video thumbnail opens a dialog box with the full video in an iframe.
 */
?>
<div id="footer-video" class="video-promotion">
  <ul class="video-promotion__slides">
    <?php
    while( have_rows('videoPromo_playlist', 'option') ): the_row();
      $headline = get_sub_field('videoPromo_headline', 'option');
      $link = get_sub_field('videoPromo_link', 'option');
      $background = get_sub_field('videoPromo_thumbnail', 'option');
    ?>
      <li class="video-promotion__item">
        <a id="video-promotion-<?php echo get_row_index(); ?>" class="video-promotion__preview" href="<?php echo $link; ?>">
          <img class="video-promotion__thumbnail lazyload lazyload--blurUp"
            alt="<?php echo $background['alt']; ?>"
            data-sizes="auto"
            data-src="<?php echo $background['sizes']['preload']; ?>"
            data-srcset="<?php echo $background['sizes']['preload']; ?> 64w,
              <?php echo $background['sizes']['375w']; ?> 65w,
              <?php echo $background['sizes']['480w']; ?> 376w,
              <?php echo $background['sizes']['540w']; ?> 481w,
              <?php echo $background['sizes']['640w']; ?> 541w,
              <?php echo $background['sizes']['720w']; ?> 641w,
              <?php echo $background['sizes']['768w']; ?> 721w,
              <?php echo $background['sizes']['800w']; ?> 769w,
              <?php echo $background['sizes']['960w']; ?> 801w,
              <?php echo $background['sizes']['1024w']; ?> 961w,
              <?php echo $background['sizes']['1280w']; ?> 1025w,
              <?php echo $background['sizes']['1366w']; ?> 1281w,
              <?php echo $background['sizes']['1440w']; ?> 1367w,
              <?php echo $background['sizes']['1600w']; ?> 1441w,
              <?php echo $background['sizes']['1920w']; ?> 1601w,
              <?php echo $background['sizes']['2560w']; ?> 1921w,
              <?php echo $background['sizes']['3840w']; ?> 2561w
            "
          />
          <div class="video-promotion__overlay">
            <h3 class="video-promotion__title">
              <?php echo $headline; ?>
            </h3>
          </div>
        </a>
      </li>
    <?php
    endwhile;
    ?>
  </ul>
</div>