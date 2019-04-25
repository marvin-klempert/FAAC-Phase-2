<?php
/**
 * Masthead footer component
 *
 * Component with large logo and buttons directed to specific areas of the
 * website
 *
 * @var array $logo       Logo content
 * @var array $buttons    Button content
 */

$logo = get_query_var('logo');
  $logoVal = $logo['value'];
  $logoImage = get_field( $logoVal . '_footerLogo', 'option');
$buttons = get_query_var('buttons');
?>
<section class="masthead-widget">
  <img class="masthead-widget__logo"
    src="<?php echo $logoImage; ?>"
    alt="<?php echo $logoVal; ?>"
  />
  <div class="masthead-widget__buttons">
    <?php
    foreach( $buttons as $button ):
      $label = $button['masthead_buttonLabel'];
      $link = $button['masthead_buttonLink'];
    ?>
    <div class="masthead-widget__item">
      <a class="masthead-widget__link" href="<?php echo $link; ?>">
        <h4 class="masthead-widget__text"><?php echo $label; ?></h4>
      </a>
    </div>
    <?php
    endforeach;
    ?>
  </div>
</section>