<?php
/**
 * Basic Banner
 *
 * A full-width image with optional text and optional icon displayed beneath
 * the text
 *
 * @var array $background     The background image
 * @var string $category      The category, if any, to use for showing an icon
 * @var string $upper         Upper text to display
 * @var string $lower         Lower text to display
 */

$background = get_query_var( 'background' );

// If a division is set for the page, asign it here
if( get_query_var( 'division-prefix' ) ):
  $division = get_query_var( 'division-prefix' );
endif;

// If the category is set, grab the value
$category = get_query_var( 'category' );
if( is_array($category) ):
  $catVal = $category['value'];
endif;
$upper = get_query_var( 'upper' );
$lower = get_query_var( 'lower' );
?>
<div class="basic-banner<?php if($division){echo ' basic-banner--' . $division;}?>">
  <?php
  // Background image
  ?>
  <img class="basic-banner__image lazyload lazyload--blurUp"
    alt="<?php echo $background['alt']; ?>"
    data-sizes="auto"
    data-src="<?php echo $background['sizes']['preload']; ?>"
    data-srcset="<?php echo $background['sizes']['preload']; ?> 64w,
      <?php echo $background['sizes']['375w']; ?> 65w,
      <?php echo $background['sizes']['480w']; ?> 376w,
      <?php echo $background['sizes']['540w']; ?> 481w,
      <?php echo $background['sizes']['640w']; ?> 541w,
      <?php echo $background['sizes']['720w']; ?> 641w,
      <?php echo $background['sizes']['768w']; ?> 721w,
      <?php echo $background['sizes']['800w']; ?> 769w,
      <?php echo $background['sizes']['960w']; ?> 801w,
      <?php echo $background['sizes']['1024w']; ?> 961w,
      <?php echo $background['sizes']['1280w']; ?> 1025w,
      <?php echo $background['sizes']['1366w']; ?> 1281w,
      <?php echo $background['sizes']['1440w']; ?> 1367w,
      <?php echo $background['sizes']['1600w']; ?> 1441w,
      <?php echo $background['sizes']['1920w']; ?> 1601w,
      <?php echo $background['sizes']['2560w']; ?> 1921w,
      <?php echo $background['sizes']['3840w']; ?> 2561w
    "
  />
  <div class="basic-banner__caption">
    <?php
    // Category icon, if set
    if( $catVal ):
    ?>
      <img class="basic-banner__icon" src="<?php echo get_field( $catVal . '_icon', 'option' )['url']; ?>" />
    <?php
    endif;
    ?>
    <h1 class="basic-banner__text">
    <?php
    // Upper text, if set
    if( $upper ):
      echo $banner . '<br/>';
    endif;

    // Lower text
    if( $lower ):
    ?>
      <span class="basic-banner__text basic-banner__text--bigger">
        <?php echo $lower; ?>
      </span>
    <?php
    endif;
    ?>
    </h1>
  </div>
</div>