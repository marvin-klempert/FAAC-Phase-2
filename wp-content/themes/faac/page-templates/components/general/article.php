<?php
/**
 * General article component
 *
 * @var boolean $leading      (optional) Whether or not the headline should
 *                            utilize an h1 tag
 * @var string $headline      The headline for the component
 * @var string $body          The body content for the component
 */

$leading = get_query_var( 'leading', false );
$headline = get_query_var( 'headline' );
$body = get_query_var( 'body' );
?>
<article class="body-content">
  <?php
  if( $leading === true ):
  ?>
    <h1 class="body-content__headline">
      <?php echo $headline; ?>
    </h1>
  <?php
  else:
  ?>
    <h2 class="body-content__headline">
      <?php echo $headline; ?>
    </h2>
  <?php
  endif;
  ?>
  <div class="body-content__content">
    <?php echo $body; ?>
  </div>
</article>