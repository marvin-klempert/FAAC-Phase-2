<?php
  if( have_rows($featureBlock) ):
    while( have_rows($featureBlock) ): the_row();
      $featureBlock_direction = get_sub_field('featureBlock_direction');
      $featureBlock_image = get_sub_field('featureBlock_image');
      $featureBlock_headline = get_sub_field('featureBlock_headline');
      $featureBlock_content = get_sub_field('featureBlock_content');
?>
    <div class="feature-blocks feature-blocks__block <?php echo $featureBlock_direction ?>">
      <?php if( !empty($featureBlock_image) ): ?>
        <img class="feature-blocks feature-blocks__image"
          src="<?php echo $featureBlock_image['sizes']['preload']; ?>"
          data-src="<?php echo $featureBlock_image['sizes']['w640']; ?>"
          data-src-retina="<?php echo $featureBlock_image['sizes']['w1100']; ?>"
          height="<?php echo $featureBlock_image['sizes']['w1100-height']; ?>"
          width="<?php echo $featureBlock_image['sizes']['w1100-width']; ?>"
          alt="<?php echo $featureBlock_image['alt']; ?>" />
      <?php endif; ?>
      <h2 class="feature-blocks feature-blocks__headline"><?php echo $featureBlock_headline ?></h2>
      <div class="feature-blocks feature-blocks__content"><?php echo $featureBlock_content ?></div>
    </div>
  <?php endwhile;
endif; ?>
