<?php
/**
 * Promotional video playlist component
 *
 * @var array $videos     Video component data
 */

// Set the division prefix
$division = get_division_class();
$videos = get_query_var( 'videos' );
?>
<div class="video-playlist<?php if($division){echo ' video-playlist--' . $division;}?>">
  <?php
  // Preview area
  ?>
  <div id="video-playlist" class="video-playlist__slider">
    <?php
    foreach( $videos as $video ):
      $url = $video['videoPlaylist_url'];
      $excerpt = $video['videoPlaylist_excerpt'];
      $background = $video['videoPlaylist_thumbnail'];
    ?>
      <div class="video-playlist__item">
        <button class="video-playlist__preview" data-href="<?php echo $url; ?>">
          <img class="video-playlist__image lazyload lazyload--blurUp"
            alt="<?php echo $background['alt']; ?>"
            data-sizes="auto"
            data-src="<?php echo $background['sizes']['preload']; ?>"
            data-srcset="<?php echo $background['sizes']['preload']; ?> 64w,
              <?php echo $background['sizes']['128w']; ?> 65w,
              <?php echo $background['sizes']['240w']; ?> 129w,
              <?php echo $background['sizes']['320w']; ?> 241w,
              <?php echo $background['sizes']['375w']; ?> 321w,
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
          <div class="video-playlist__overlay">
            <p class="videoPlaylist__text">
              <?php echo $excerpt; ?>
            </p>
          </div>
        </button>
      </div>
    <?php
    endforeach;
    ?>
  </div>
  <?php
  // Carousel
  ?>
  <div id="video-playlist-controller" class="video-playlist__controller">
    <?php
    foreach( $videos as $video ):
      $url = $video['videoPlaylist_url'];
      $background = $video['videoPlaylist_thumbnail'];
    ?>
      <div class="video-playlist__item">
        <img class="video-playlist__image lazyload lazyload--blurUp"
          alt="<?php echo $background['alt']; ?>"
          data-sizes="auto"
          data-src="<?php echo $background['sizes']['preload']; ?>"
          data-srcset="<?php echo $background['sizes']['preload']; ?> 64w,
            <?php echo $background['sizes']['128w']; ?> 65w,
            <?php echo $background['sizes']['240w']; ?> 129w,
            <?php echo $background['sizes']['320w']; ?> 241w,
            <?php echo $background['sizes']['375w']; ?> 321w
          "
        />
      </div>
    <?php
    endforeach;
    ?>
  </div>
</div>