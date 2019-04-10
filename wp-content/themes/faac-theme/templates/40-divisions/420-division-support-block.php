<?php if( have_rows($divisionSupport_links) ): ?>
  <div class="division-support division-support__slider flexslider-support">
    <h3 class="division-support division-support__heading">
      <?php echo $divisionSupport_headline; ?>
    </h3>
    <ul class="division-support division-support__slides slides">
      <?php while( have_rows( $divisionSupport_links ) ): the_row();
        $divisionSupport_description = get_sub_field('divisionSupport_description');
        $divisionSupport_background = get_sub_field('divisionSupport_background');
      ?>
        <li>
          <div class="division-support division-support__text flex-caption">
            <?php echo $divisionSupport_description; ?>
          </div>
          <img class="division-support division-support__image"
            src="<?php echo $divisionSupport_background['sizes']['preload']; ?>"
            data-src="<?php echo $divisionSupport_background['sizes']['w1360']; ?>"
            height="<?php echo $divisionSupport_background['sizes']['w1360-height']; ?>"
            width="<?php echo $divisionSupport_background['sizes']['w1360-width']; ?>"
            alt="<?php echo $divisionSupport_background['alt']; ?>"
          />
        </li>
      <?php endwhile; ?>
    </ul>
  </div>
  <div class="division-support division-support__controller flexslider-controls">
    <ol class="division-support division-support__controls flex-control-nav">
      <?php while( have_rows( $divisionSupport_links ) ): the_row();
        $divisionSupport_button = get_sub_field('divisionSupport_button');
      ?>
        <li>
          <p class="division-support division-support__text">
            <?php echo $divisionSupport_button; ?>
          </p>
        </li>
      <?php endwhile; ?>
    </ol>
  </div>
<?php endif; ?>
