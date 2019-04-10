<?php foreach( $slider_gallery as $image ): ?>

  <figure class="slider slider__slide">
    <img class="slider slider__image"
      src="<?php echo $image['sizes']['w1100']; ?>"
      data-src="<?php echo $image['sizes']['w2200']; ?>"
      data-src-retina="<?php echo $image['url']; ?>"
      height="<?php echo $image['height']; ?>"
      width="<?php echo $image['width']; ?>"
      alt="<?php echo $image['alt']; ?>"/>
    <figcaption class="slider slider__caption">
      <?php if( $slider_category['value'] != 'none' ): ?>
      <img class="slider slider__icon" src="<?php echo get_field($slider_category['value'] . '_icon', 'option')['url']; ?>">
      <?php endif; ?>
      <h1 class="slider slider__text">
        <?php echo $slider_upperText ?><br />
        <span class="slider slider__text slider__text--bigger">
          <?php echo $slider_lowerText ?>
        </span>
      </h1>
    </figcaption>
  </figure>

<?php endforeach; ?>
