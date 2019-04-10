<?php if( have_rows( $videoPlaylist ) ): ?>

  <!-- Slider -->
  <div id="video-slider" class="video-playlist video-playlist__slider flexslider">
    <ul class="video-playlist video-playlist__list slides">
      <?php while( have_rows( $videoPlaylist ) ): the_row();
        $videoPlaylist_url = get_sub_field('videoPlaylist_url');
        $videoPlaylist_excerpt = get_sub_field('videoPlaylist_excerpt');
        $videoPlaylist_thumbnail = get_sub_field('videoPlaylist_thumbnail');
      ?>
        <li class="video-playlist video-playlist__item">
          <a class="popup-vimeo" href="<?php echo $videoPlaylist_url; ?>">
            <img class="video-playlist video-playlist__image"
              src="<?php echo $videoPlaylist_thumbnail['sizes']['preload']; ?>"
              data-src="<?php echo $videoPlaylist_thumbnail['sizes']['w800']; ?>"
              data-src-retina="<?php echo $videoPlaylist_thumbnail['url']; ?>"
              height="<?php echo $videoPlaylist_thumbnail['height']; ?>"
              width="<?php echo $videoPlaylist_thumbnail['width']; ?>"
              alt="<?php echo $videoPlaylist_thumbnail['alt']; ?>"
            />
            <div class="video-playlist video-playlist__overlay">
              <p class="video-playlist video-playlist__text">
                <?php echo $videoPlaylist_excerpt; ?>
              </p>
            </div>
          </a>
        </li>
      <?php endwhile; ?>
    </ul>
  </div>

  <!-- Carousel -->
  <div id="carousel" class="video-playlist video-playlist__carousel flexslider">
    <ul class="video-playlist video-playlist__list slides">
      <?php while( have_rows( $videoPlaylist ) ): the_row();
        $videoPlaylist_url = get_sub_field('videoPlaylist_url');
        $videoPlaylist_thumbnail = get_sub_field('videoPlaylist_thumbnail');
      ?>
        <li class="video-playlist video-playlist__item">
          <img class="video-playlist video-playlist__image"
            src="<?php echo $videoPlaylist_thumbnail['sizes']['preload']; ?>"
            data-src="<?php echo $videoPlaylist_thumbnail['sizes']['w240']; ?>"
            data-src-retina="<?php echo $videoPlaylist_thumbnail['sizes']['w360']; ?>"
            height="<?php echo $videoPlaylist_thumbnail['sizes']['w360-height']; ?>"
            width="<?php echo $videoPlaylist_thumbnail['sizes']['w360-width']; ?>"
            alt="<?php echo $videoPlaylist_thumbnail['alt']; ?>"
          />
        </li>
      <?php endwhile; ?>
    </ul>
  </div>
<?php endif; ?>
