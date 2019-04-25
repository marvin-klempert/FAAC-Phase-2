<?php
/**
 * Division grid component
 *
 * @var array $logos        The array of division logos
 */
$logos = get_query_var( 'logos' );
?>
<section class="division-widget">
  <?php
  foreach( $logos as $logo ):
    $division = $logo['divisionLogo_division']['value'];
  ?>
    <div class="division-widget__division">
      <a class="division-widget__link" href="<?php the_field( $division . '_homepage', 'option'); ?>">
        <img class="division-widget__logo"
          src="<?php the_field( $division . '_footerLogo', 'option'); ?>"
          alt="<?php the_field( $division . '_name', 'option'); ?>"
        />
      </a>
    </div>
  <?php
  endforeach;
  ?>
</section>