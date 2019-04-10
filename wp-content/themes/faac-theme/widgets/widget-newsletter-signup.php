<?php // Newsletter signup widget

  $newsletterSignup_formID = get_field('newsletterSignup_formID', $acfw);
  gravity_form_enqueue_scripts( $newsletterSignup_formID, false );

?>
<section class="wrapper wrapper__newsletter-widget">
  <div class="newsletter-widget">
    <h3 class="newsletter-widget newsletter-widget__title">Don't Miss Out:</h3>
    <?php
      gravity_form( $newsletterSignup_formID, false, false, false, '' );
    ?>
  </div>
</section>
