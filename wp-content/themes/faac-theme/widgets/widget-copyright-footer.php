<?php // Copyright footer widget

  $copyright_name = get_field('copyright_name', $acfw);
  $copyright_sitemap = get_field('copyright_sitemap', $acfw);
  $copyright_privacyPolicy = get_field('copyright_privacyPolicy', $acfw);
  $copyright_termsOfService = get_field('copyright_termsOfService', $acfw);
  $copyright_designCredit = get_field('copyright_designCredit', $acfw);

?>
<section class="copyright-widget">
  <div class="copyright-widget copyright-widget__name">
    <p class="copyright-widget copyright-widget__text">
      &copy; <?php echo date("Y"); ?> <?php echo $copyright_name ?>. All Rights Reserved.
    </p>
  </div>

  <div class="copyright-widget copyright-widget__links">
    <a class="copyright-widget copyright-widget__link" href="<?php echo $copyright_sitemap ?>" target="_blank">
      <p class="copyright-widget copyright-widget__text">Sitemap</p>
    </a>
    <a class="copyright-widget copyright-widget__link" href="<?php echo $copyright_privacyPolicy ?>" target="_blank">
      <p class="copyright-widget copyright-widget__text">Privacy Policy</p>
    </a>
    <a class="copyright-widget copyright-widget__link" href="<?php echo $copyright_termsOfService ?>" target="_blank">
      <p class="copyright-widget copyright-widget__text">Terms of Service</p>
    </a>
    <p class="copyright-widget copyright-widget__text"><?php echo $copyright_designCredit ?></p>
  </div>
</section>