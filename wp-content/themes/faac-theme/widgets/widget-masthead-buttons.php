<?php // Masthead and quicklink buttons widget

  $masthead_logo = get_field('masthead_logo', $acfw);
    $logo = $masthead_logo['value'];
    $logoImage = get_field( $logo . '_footerLogo', 'option' );

?>
<section class="wrapper wrapper__masthead-widget">
  <div class="masthead-widget">
    <img class="masthead-widget masthead-widget__logo"
      src="<?php echo $logoImage; ?>"
      alt="<?php echo $logo; ?>"
    />
    <?php if( have_rows('masthead_buttons', $acfw) ): ?>
      <div class="masthead-widget masthead-widget__buttons">
      <?php while( have_rows('masthead_buttons', $acfw) ): the_row();

        $masthead_buttonLabel = get_sub_field('masthead_buttonLabel', $acfw);
        $masthead_buttonLink = get_sub_field('masthead_buttonLink', $acfw);

      ?>
        <div class="masthead-widget masthead-widget__button-wrapper">
          <a class="masthead-widget masthead-widget__link" href="<?php echo $masthead_buttonLink ?>">
            <h4 class="masthead-widget masthead-widget__text"><?php echo $masthead_buttonLabel ?></h4>
          </a>
        </div>
      <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
</section>