<?php
/**
 * Sector flag component
 *
 * Displays a small flag to signify the sector
 *
 * @var string $sector      The sector to use for the component
 */

$sector = get_query_var( 'sector' );
$logoID = attachment_url_to_postid( get_field( $sector . '_sectorLogo', 'option' ) );
$logo = wp_get_attachment_image_url( $logoID, '240w' );
$page = get_field( $sector . '_sectorHomepage', 'option' );
?>
<div class="sector-flag">
  <a class="sector-flag__link" ref="<?php echo get_permalink( $page ); ?>">
    <img class="sector-flag__image"
      alt="<?php echo $sector; ?>"
      src="<?php echo $logo; ?>"
    />
  </a>
</div>