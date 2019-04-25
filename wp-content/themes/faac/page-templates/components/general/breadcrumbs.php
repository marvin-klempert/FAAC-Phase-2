<?php
/**
 * Breadcrumbs component
 *
 * Displays breadcrumbs for the current page
 *
 * @var string $division      The division CSS class, if any, for the page
 */

$division = get_division_class();
?>
<div class="breadcrumbs<?php if($division){echo ' breadcrumbs--' . $division;} ?>"
  typeof="BreadcrumbList" vocab="https://schema.org/"
>
  <?php
  if( function_exists( 'bcn_display' ) ):
    bcn_display();
  endif;
  ?>
</div>