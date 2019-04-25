<?php
/**
 * Banner slider component
 *
 * @var array $slider     Slider content
 */

$slider = get_query_var( 'slider' );
?>
<div class="banner-slider">
  <?php
  foreach( $slider as $slide ):
    // Set slide variables
    $background = $slide['slider_image'];
    $upper = $slide['slider_upperText'];
    $lower = $slide['slider_lowerText'];
    $linkType = $slide['slider_slideLink']['value'];
      if( $linkType == 'popup-vimeo' ):
        $link = $slide['slider_vimeoLink'];
      elseif( $linkType == 'inner-page' ):
        $link = $slide['slider_sliderPageLink'];
      else:
        $link = $slide['slider_outsideLink'];
      endif;
    $linkText = $slide['slider_linkText'];
  ?>
    <div class="banner-slider__slide">
      <?php
      // Background image
      ?>
      <img class="banner-slider__image lazyload lazyload--blurUp"
        alt="<?php echo $background['alt']; ?>" data-sizes="auto"
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
      <?php
      // Slide content
      ?>
      <div class="banner-slider__caption">
        <h2 class="banner-slider__text">
          <?php
          // Upper text
          if( $upper ):
            echo $upper . '<br/>';
          endif;

          // Lower text
          if( $lower ):
          ?>
            <span class="banner-slider__text--bigger">
              <?php echo $lower; ?>
            </span>
          <?php
          endif;
          ?>
        </h2>
        <?php
        // Slide link
        if( $linkType != 'none' ):
        ?>
          <button class="banner-slider__link" data-type="<?php echo $linkType; ?>" data-href="<?php echo $link; ?>" <?php if( $linkType=='outside-link'){echo 'target="blank" rel="noopener noreferrer"';}?>>
            <h2 class="banner-slider__text banner-slider__text--linked">
              <?php echo $linkText; ?>
            </h2>
          </button>
        <?php
        endif;
        ?>
      </div>
    </div>
  <?php
  endforeach;
  ?>
</div>