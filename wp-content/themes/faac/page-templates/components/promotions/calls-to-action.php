<?php
/**
 * CTA Promotion Component
 *
 * Site-wide promotional component portrayed as a call-to-action
 *
 * @var array $background     The background image
 * @var string $button        Text to display on the button
 * @var string $division      The division prefix, if any, to use for reference
 * @var string $link          Link to the contact page
 * @var string $phone         The phone number to display
 * @var string $tagline       Tagline text
 */

// Set variables
$background = get_query_var('background');
$button = get_query_var('button');
$division = get_query_var('division-prefix');
$link = get_query_var('link');
$phone = get_query_var('phone');
$tagline = get_query_var('tagline');

// If a division is set, updated the variables
if( $division ):
  $background = get_field( $division . '_ctaBackground', 'option');
  $link = get_field( $division . '_ctaPage', 'option' );
  $phone = get_field( $division . '_ctaPhone', 'option' );
endif;
?>
<div class="call-to-action">
  <img class="call-to-action__background lazyload lazyload--blurUp"
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
  <div class="call-to-action__content">
    <h2 class="call-to-action__headline">
      <?php echo $tagline; ?>
    </h2>
    <form class="call-to-action__form">
      <button class="call-to-action__button" type="submit">
        <?php echo $button; ?>
      </button>
    </form>
    <p class="call-to-action__text">
      or call us at <a class="call-to-action__link" href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
    </p>
  </div>
</div>
