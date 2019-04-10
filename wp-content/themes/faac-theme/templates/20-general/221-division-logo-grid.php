<?php
  if( have_rows( $divisionGrid ) ):
    while( have_rows ( $divisionGrid ) ): the_row();

      $divisionGrid_division = get_sub_field('divisionGrid_division');
      $divisionGrid_logo = get_sub_field('divisionGrid_logo');

?>
  <div class="division-intro division-intro__item">
    <a class="division-intro division-intro__link" href="<?php echo get_field($divisionGrid_division['value'] . '_homepage', 'option'); ?>">
      <img class="division-intro division-intro__logo"
        src="<?php echo $divisionGrid_logo['sizes']['preload']; ?>"
        data-src="<?php echo $divisionGrid_logo['sizes']['w480']; ?>"
        data-src-retina="<?php echo $divisionGrid_logo['url']; ?>"
        height="<?php echo $divisionGrid_logo['height']; ?>"
        width="<?php echo $divisionGrid_logo['width']; ?>"
        alt="<?php echo $divisionGrid_logo['alt']; ?>" />
    </a>
  </div>
<?php
    endwhile;
  endif;
?>
