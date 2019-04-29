<?php
/**
 * Division flag component
 *
 * Displays a small flag to signify the division
 *
 * @var string $division      The division to use for the component
 */

// Sets $division based on whether the page is a single post or not
if( is_single() ):
  $division = get_query_var( 'category-prefix' );
else:
  $division = get_query_var( 'division-prefix' );
endif;
$logoID = attachment_url_to_postid( get_field( $division . '_divisionFlag', 'option' ) );
$logo = wp_get_attachment_image_url( $logoID, '240w' );
$page = get_field( $division . '_name', 'option' );
?>
<div class="division-flag division-flag--<?php echo $division; ?>">
  <a class="division-flag__link" href="<?php echo get_permalink( $page ); ?>">
    <img class="sector-flag__image"
      alt="<?php echo $division; ?>"
      src="<?php echo $logo; ?>"
    />
  </a>
</div>