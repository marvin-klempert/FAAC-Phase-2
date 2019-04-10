<?php
  if( have_rows( $slide ) ):
?>
  <ul class="slides">
    <?php
      while ( have_rows( $slide ) ) : the_row();

      // Sets the slide's variables
      $slider_image = get_sub_field('slider_image');
      $slider_upperText = get_sub_field('slider_upperText');
      $slider_lowerText = get_sub_field('slider_lowerText');
      $slider_slideLink = get_sub_field('slider_slideLink');
        $slider_vimeoLink = get_sub_field('slider_vimeoLink');
        $slider_pageLink = get_sub_field('slider_pageLink');
        $slider_outsideLink = get_sub_field('slider_outsideLink');
      $slider_linkText = get_sub_field('slider_linkText');
    ?>
      <li class="slide">
        <img class="slider slider__image"
          src="<?php echo $slider_image['sizes']['w1100']; ?>"
          data-src="<?php echo $slider_image['sizes']['w2200']; ?>"
          data-src-retina="<?php echo $slider_image['url']; ?>"
          height="<?php echo $slider_image['height']; ?>"
          width="<?php echo $slider_image['width']; ?>"
          alt="<?php echo $slider_image['alt']; ?>"/>
        <div class="slider slider__caption flex-caption">
          <h2 class="slider slider__text">
            <?php if( !empty($slider_upperText) ):
                echo $slider_upperText ?><br />
            <?php endif;

            if( !empty($slider_lowerText) ): ?>
            <span class="slider slider__text slider__text--bigger">
              <?php echo $slider_lowerText ?>
            </span>
            <?php endif; ?>
          </h2>
          <?php if( $slider_slideLink['value'] != 'none' ): ?>
            <a class="slider slider__link <?php echo $slider_slideLink['value']; ?>" href="<?php
              if( $slider_slideLink['value'] == 'popup-vimeo' ) {
                echo $slider_vimeoLink;
              } elseif( $slider_slideLink['value'] == 'inner-page' ) {
                echo $slider_pageLink;
              } else {
                echo $slider_outsideLink;
              }
            ?>" <?php if( $slider_slideLink['value'] == 'outside-link' ): ?> target="_blank"<?php endif;?>>
              <h2 class="slider slider__text slider__text--linked">
                <?php echo $slider_linkText; ?>
              </h2>
            </a>
          <?php endif; ?>
        </div>
      </li>

    <?php
      endwhile;
    ?>
  </ul>
<?php
  endif;
?>
