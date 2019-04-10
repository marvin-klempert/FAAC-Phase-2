<div class="media-block media-block__wrapper <?php echo $mediaBlock_direction['value']; ?>">
  <div class="media-block media-block__images">
    <img class="media-block media-block__image"
      src="<?php echo $mediaBlock_image['sizes']['preload']; ?>"
      data-src="<?php echo $mediaBlock_image['sizes']['w480']; ?>"
      data-src-retina="<?php echo $mediaBlock_image['sizes']['w800']; ?>"
      height="<?php echo $mediaBlock_image['sizes']['w800-height']; ?>"
      width="<?php echo $mediaBlock_image['sizes']['w800-width']; ?>"
      alt="<?php echo $mediaBlock_image['alt']; ?>"
    >
    <?php if( !empty( $mediaBlock_subImage ) ): ?>
      <img class="media-block media-block__sub-image"
        src="<?php echo $mediaBlock_subImage['sizes']['preload']; ?>"
        data-src="<?php echo $mediaBlock_subImage['sizes']['w480']; ?>"
        data-src-retina="<?php echo $mediaBlock_subImage['sizes']['w800']; ?>"
        height="<?php echo $mediaBlock_subImage['sizes']['w800-height']; ?>"
        width="<?php echo $mediaBlock_subImage['sizes']['w800-width']; ?>"
        alt="<?php echo $mediaBlock_subImage['alt']; ?>"
      >
    <?php endif;?>
  </div>
  <div class="media-block media-block__headline__wrapper">
  <h2 class="media-block media-block__headline">
    <?php echo $mediaBlock_headline ?>
  </h2>
  <div class="media-block media-block__body">
    <?php echo $mediaBlock_content ?>
  </div>
  </div>
</div>
