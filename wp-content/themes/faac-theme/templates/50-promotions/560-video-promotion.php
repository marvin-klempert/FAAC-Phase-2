<?php
  if( have_rows('videoPromo_playlist', 'option') ):
?>
  <div id="footer-video" class="flexslider">
    <ul class="slides">
      <?php
          while( have_rows('videoPromo_playlist', 'option') ): the_row();
            $videoPromo_link = get_sub_field('videoPromo_link', 'option');
            $videoPromo_thumbnail = get_sub_field('videoPromo_thumbnail', 'option');
            $videoPromo_headline = get_sub_field('videoPromo_headline', 'option');
      ?>
        <li class="slide">
          <a class="popup-vimeo" href="<?php echo $videoPromo_link; ?>" >
            <img class="video-promotion video-promotion__media"
              src="<?php echo $videoPromo_thumbnail['sizes']['preload']; ?>"
              data-src="<?php echo $videoPromo_thumbnail['sizes']['w1100']; ?>"
              data-src-retina="<?php echo $videoPromo_thumbnail['url']; ?>"
              height="<?php echo $videoPromo_thumbnail['height']; ?>"
              width="<?php echo $videoPromo_thumbnail['width']; ?>"
              alt="<?php echo $videoPromo_thumbnail['alt'];?>"
            />
            <div class="video-promotion video-promotion__overlay">
              <h3 class="video-promotion video-promotion__title">
                <?php echo $videoPromo_headline; ?>
              </h3>
            </div>
          </a>
        </li>
      <?php
          endwhile;
      ?>
    </ul>
  </div>
<?php
  endif;
?>
