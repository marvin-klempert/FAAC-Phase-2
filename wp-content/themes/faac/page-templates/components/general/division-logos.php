<?php
/**
 * Division logo grid component
 *
 * @var array $grid     Logo grid content
 */

$grid = get_query_var( 'grid' );
?>
<div class="division-logos">
  <?php
  foreach( $grid as $item ):
    $division = $item['divisionGrid_division']['value'];
    $logo = $item['divisionGrid_logo'];
  ?>
    <div class="division-grid__item">
      <a class="division-grid__link" href="<?php the_field( $division . '_homepage', 'option' ); ?>">
        <img class="division-grid__logo lazyload lazyload--blurUp"
          alt="<?php echo $logo['alt']; ?>" data-sizes="auto"
          data-src="<?php echo $logo['sizes']['preload']; ?>"
          data-srcset="<?php echo $logo['sizes']['preload']; ?> 64w,
            <?php echo $logo['sizes']['128w']; ?> 65w,
            <?php echo $logo['sizes']['240w']; ?> 129w,
            <?php echo $logo['sizes']['320w']; ?> 241w,
            <?php echo $logo['sizes']['375w']; ?> 321w,
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