<?php
/**
 * Photo promotion component
 *
 * Promotional component with an image background and overlayed text.
 *
 * @var array $background     Background image data
 * @var string $excerpt       Excerpt text
 * @var string $headline      Headline text
 * @var string $page          Linked page
 */

$background = get_field('photoPromo_background', 'option');
$excerpt = get_field('photoPromo_excerpt', 'option');
$headline = get_field('photoPromo_headline', 'option');
$page = get_field('photoPromo_page', 'option');
?>
<div class="photo-promotion">
  <img class="photo-promotion__background lazyload lazyload--blurUp"
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
  <div class="photo-promotion__content">
    <h3 class="photo-promotion__title">
      <?php echo $headline; ?>
    </h3>
    <div class="photo-promotion__body">
      <?php echo $excerpt; ?>
    </div>
    <a class="photo-promotion__link" href="<?php echo $page; ?>">
      Learn More
    </a>
  </div>
</div>