<?php
/**
 * Division summaries component
 *
 * @var array $divisions      Array of division conent to pull from
 */

$divisions = get_query_var( 'divisions' );
?>
<div class="division-summaries">
  <?php
  foreach( $divisions as $block ):
    $division = $block['divisionSummary_division']['value'];
    $background = set_division_background( $division );
    $link = get_field( $division . '_homepage', 'option' );
    $logo = set_division_logo( $division );
  ?>
    <div class="division-summaries__division">
      <a class="division-summaries__link" href="<?php echo $link; ?>">
        <img class="division-summaries__background lazyload lazyload--blurUp"
          alt="<?php echo $background['alt']; ?>" data-sizes="auto"
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
        <img class="division-summaries__logo lazyload lazyload--blurUp"
          alt="<?php echo $logo['alt']; ?>" data-sizes="auto"
          data-src="<?php echo $logo['sizes']['preload']; ?>"
          data-srcset="<?php echo $logo['sizes']['preload']; ?> 64w,
            <?php echo $logo['sizes']['375w']; ?> 65w,
            <?php echo $logo['sizes']['480w']; ?> 376w,
            <?php echo $logo['sizes']['540w']; ?> 481w
          "
        />
      </a>
    </div>
  <?php
  endforeach;
  ?>
</div>