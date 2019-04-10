<?php
  if( have_rows( $featureRow ) ):
    while( have_rows( $featureRow ) ): the_row();

      $featureRow_headline = get_sub_field('featureRow_headline');
      $featureRow_featureList = 'featureRow_featureList'; // Repeater

      if( !empty( $featureRow_headline ) ): ?>
        <h2 class="feature-row feature-row__headline"><?php echo $featureRow_headline ?></h2>
      <?php endif;
      if( have_rows( $featureRow_featureList, get_the_ID() ) ): ?>
        <div class="feature-row feature-row__group">
          <?php while( have_rows( $featureRow_featureList ) ): the_row();
            $featureRow_featureItem = get_sub_field('featureRow_featureItem');
              $simulator_thumbnail = get_field('simulator_thumbnail', $featureRow_featureItem);
            $featureRow_linkOverride = get_sub_field('featureRow_linkOverride');
            $featureRow_separatePage = get_sub_field('featureRow_separatePage');

            if( $featureRow_linkOverride == 1 ):
              $outsideLink = get_permalink($featureRow_separatePage);
            else:
              $outsideLink = get_permalink($featureRow_featureItem);
            endif;
          ?>
            <div class="feature-row feature-row__item">
              <a class="feature-row feature-row__link" href="<?php echo $outsideLink; ?>">
                <img class="feature-row feature-row__image"
                  src="<?php echo $simulator_thumbnail['sizes']['preload']; ?>"
                  data-src="<?php echo $simulator_thumbnail['url']; ?>"
                  height="<?php echo $simulator_thumbnail['height']; ?>"
                  width="<?php echo $simulator_thumbnail['width']; ?>"
                  alt="<?php echo $simulator_thumbnail['alt']; ?>"
                />
                <div class="feature-row feature-row__overlay">
                  <h3>
                    <?php echo get_the_title($featureRow_featureItem); ?>
                  </h3>
                </div>
              </a>
            </div>
            <?php wp_reset_postdata(); ?>
          <?php endwhile; ?>
        </div>
      <?php endif;
    endwhile;
  endif; ?>
