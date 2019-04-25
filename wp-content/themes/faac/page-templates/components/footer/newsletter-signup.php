<?php
/**
 * Newsletter signup widget
 *
 * @var int $form       The ID of the Gravity Forms form to use
 */
?>
<section class="newsletter-widget">
    <h3 class="newsletter-widget__title">Don't Miss Out:</h3>
    <div class="newsletter-widget__form">
      <?php
        gravity_form( $form, false, false, false, '' );
      ?>
    </div>
</section>
