<?php
/**
 * General category row component
 *
 * @var array $categories     Categories to work from
 */

$division = get_division_class();
$categories = get_query_var( 'categories' );
?>
<div class="category-row<?php if($division){echo ' category-row--' . $division;}?>">
  <?php
  foreach( $categories as $category ):
    $label = $category['generalCategoryRow_category']['label'];
    $value = $category['generalCategoryRow_category']['value'];
    $icon = get_field( $value . '_icon', 'option' );
    $background = get_field( $value . 'Simulator_listBackground', 'option');
    $simLink = get_field( $value . 'Simulator_homepage', 'option' );
    $solLink = get_field( $value . 'Solution_homepage', 'option' );
  ?>
    <div class="category-row__category">
       <img class="category-row__backgorund lazyload lazyload--blurUp"
        alt="<?php echo $background['alt']; ?>"
        data-sizes="auto"
        data-src="<?php echo $background['sizes']['preload']; ?>"
        data-srcset="<?php echo $background['sizes']['preload']; ?> 64w,
          <?php echo $background['sizes']['128w']; ?> 65w,
          <?php echo $background['sizes']['240w']; ?> 129w,
          <?php echo $background['sizes']['320w']; ?> 241w,
          <?php echo $background['sizes']['375w']; ?> 321w,
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
      <div class="category-row__content">
        <div class="category-row__heading">
          <img class="category-row__icon"
            src="<?php echo $icon['url']; ?>"
            alt="<?php echo $icon['alt']; ?>"
          />
          <h4 class="category-row__title">
            <?php echo $label; ?>
          </h4>
        </div>
        <a class="category-row__link" href="<?php echo $solLink; ?>">
          <div class="category-row__button">
            <h5 class="category-row__text">
              Solutions
            </h5>
          </div>
        </a>
        <a class="category-row__link" href="<?php echo $simLink; ?>">
          <div class="category-row__button">
            <h5 class="category-row__text">
              Simulators
            </h5>
          </div>
        </a>
      </div>
    </div>
  <?php
  endforeach;
  ?>
</div>