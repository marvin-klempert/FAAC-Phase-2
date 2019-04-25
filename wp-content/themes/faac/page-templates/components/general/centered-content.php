<?php
/**
 * Centered content component
 *
 * A block of content with either an h1 or h2 heading, based on the variables
 * passed into the component.
 *
 * @var array $content      Component text content
 * @var boolean $leading    Whether or not the content should be leading on the
 *                          page (ie use h1 as opposed to h2 for the heading)
 */

$content = get_query_var( 'content' );
  $headline = $content['centeredContent_headline'];
  $body = $content['centeredContent_body'];
$leading = get_query_var( 'leading', false );
?>
<div class="centered-content">
  <?php
  // Headline
  if( $headline ):
    if( $leading == true ):
    ?>
      <h1 class="centered-content__title">
        <?php echo $headline; ?>
      </h1>
    <?php
    else:
    ?>
      <h2 class="centered-content__title">
        <?php echo $headline; ?>
      </h2>
    <?php
    endif;
  endif;

  // Body content
  if( $body ):
  ?>
    <div class="centered-content__body">
      <?php echo $body; ?>
    </div>
  <?php
  endif;
  ?>
</div>