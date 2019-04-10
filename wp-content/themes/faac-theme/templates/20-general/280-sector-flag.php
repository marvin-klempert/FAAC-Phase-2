<?php
  $sector = get_the_terms( get_the_ID(), 'sector' );
  $sectorSlug = $sector[0]->slug;
  $sectorLogo = get_field($sectorSlug . '_sectorLogo', 'option');
  $sectorHomepage = get_field($sectorSlug . '_sectorHomepage', 'option');
?>
<?php if( $sectorSlug != '' ): ?>
  <a href="<?php echo get_permalink($sectorHomepage); ?>">
    <img class="sector-flag sector-flag__image"
      src="<?php echo $sectorLogo; ?>"
      alt="<?php echo $sectorSlug; ?>"
    />
  </a>
<?php endif; ?>
