<?php
// Noscript option for Google Tag Manager

if( get_field('google_tagManager', 'option') ):
  $gtm_id = get_field('google_tagManager', 'option');
?>
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo $gtm_id; ?>"
    height="0" width="0" style="display:none;visibility:hidden"></iframe>
  </noscript>
<?php
endif;