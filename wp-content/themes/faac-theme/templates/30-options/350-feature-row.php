<?php
  if( have_rows( $featureRow ) ):
    while( have_rows( $featureRow ) ): the_row();

      $featureRow_headline = get_sub_field('featureRow_headline');
      $featureRow_featureList = 'featureRow_featureList'; // Repeater

      if( !empty( $featureRow_headline ) ): ?>
        <h2 class="feature-row feature-row__headline"><?php echo $featureRow_headline ?></h2>
      <?php endif;

      if( have_rows( $featureRow_featureList ) ): ?>
        <div class="feature-row feature-row__group">

          <?php while( have_rows( $featureRow_featureList ) ): the_row();
            $featureRow_featureItem = get_sub_field('featureRow_featureItem');
            // override $post
            $post = $featureRow_featureItem;
            setup_postdata( $post );

            $simulator_thumbnail = get_field('simulator_thumbnail');
          ?>
            <div class="feature-row feature-row__item">
              <a class="feature-row feature-row__link" href="<?php the_permalink(); ?>">
                <img class="feature-row feature-row__image"
                  src="<?php echo $simulator_thumbnail['sizes']['preload']; ?>"
                  data-src="<?php echo $simulator_thumbnail['sizes']['w480']; ?>"
                  data-src-retina="<?php echo $simulator_thumbnail['sizes']['w800']; ?>"
                  height="<?php echo $simulator_thumbnail['sizes']['w800-height']; ?>"
                  width="<?php echo $simulator_thumbnail['sizes']['w800-width']; ?>"
                  alt="<?php echo $simulator_thumbnail['alt']; ?>"
                />
                <div class="feature-row feature-row__overlay">
                  <h3><?php the_title(); ?></h3>
                </div>
              </a>
            </div>
            <?php wp_reset_postdata(); ?>
          <?php endwhile; ?>

        </div>
      <?php endif;
    endwhile;
  endif; ?>
