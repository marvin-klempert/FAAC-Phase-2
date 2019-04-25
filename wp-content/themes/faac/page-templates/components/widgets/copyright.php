<?php
/**
 * Copyright footer component
 *
 * @var string $name      Company name
 * @var string $sitemap   Sitemap URL
 * @var string $privacy   Privacy policy URL
 * @var string $tos       Terms of Service URL
 * @var string $design    Design credit text
 */

$name = get_query_var( 'name' );
$sitemap = get_query_var( 'sitemap' );
$privacy = get_query_var( 'privacy' );
$tos = get_query_var( 'tos' );
$design = get_query_var( 'design' );
?>
<section class="copyright-widget">
  <div class="copyright-widget__name">
    <p class="copyright-widget__text">
      &copy; <?php echo date("Y"); ?> <?php echo $name; ?>. All Rights Reserved.
    </p>
  </div>

  <div class="copyright-widget__links">
    <a class="copyright-widget__link" href="<?php echo $sitemap; ?>">
      <p class="copyright-widget__text">Sitemap</p>
    </a>
    <a class="copyright-widget__link" href="<?php echo $privacy; ?>">
      <p class="copyright-widget__text">Privacy Policy</p>
    </a>
    <a class="copyright-widget__link" href="<?php echo $tos; ?>">
      <p class="copyright-widget__text">Terms of Service</p>
    </a>
    <p class="copyright-widget__text"><?php echo $design; ?></p>
  </div>
</section>