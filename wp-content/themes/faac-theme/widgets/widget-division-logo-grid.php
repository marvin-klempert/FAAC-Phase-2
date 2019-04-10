<?php
  $divisionLogo_grid = 'divisionLogo_grid';
?>
<section class="wrapper wrapper__division-grid">
<?php if( have_rows($divisionLogo_grid, $acfw) ): ?>
  <div class="division-widget">
  <?php while( have_rows($divisionLogo_grid, $acfw) ): the_row();

    $divisionLogo_division = get_sub_field('divisionLogo_division', $acfw);
      $division = $divisionLogo_division['value'];

  ?>
    <div class="division-widget division-widget__division">
      <a class="division-widget division-widget__link" href="<?php the_field( $division . '_homepage', 'option'); ?>">
        <img class="division-widget division-widget__logo"
          src="<?php the_field( $division . '_footerLogo', 'option'); ?>"
          alt="<?php the_field( $division . '_name', 'option'); ?>"
        />
      </a>
    </div>
  <?php endwhile; ?>
  </div>
<?php endif; ?>
</section>