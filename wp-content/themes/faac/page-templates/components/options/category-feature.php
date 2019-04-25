<?php
/**
 * Category feature component
 *
 * @var array $features     Content for the feature blocks
 */

$features = get_query_var( 'features' );
?>
<div class="category-feature">
  <?php
  foreach( $features as $block ):
    $direction = $block['categoryFeature_direction'];
    $category = $block['categoryFeature_category'];
    $icon = get_field( $category['value'] . '_icon', 'option' );
    $description = get_field( $category['value'] . '_description' , 'option' );
    $simPage = get_field( $category['value'] . 'Simulator_homepage', 'option' );
    $solPage = get_field( $category['value'] . 'Solution_homepage', 'option' );
    $background = $block['categoryFeature_background'];
  ?>
    <div class="category-feature__category">
      <?php
      // Background image
      ?>
      <img class="category-feature__background lazyload lazyload--blurUp"
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
          <?php echo $background['sizes']['2560w']; ?> 1921w
        "
      />
      <?php
      // Overlay
      ?>
      <div class="category-feature__overlay category-feature__overlay--<?php echo $direction; ?>">
        <?php
        // Masthead
        ?>
        <div class="category-feature__masthead">
          <h3 class="category-feature__title">
            <?php echo $category['label']; ?>
          </h3>
          <img class="category-feature__icon lazyload lazyload--blurUp"
            alt="<?php echo $icon['alt']; ?>" data-sizes="auto"
            data-src="<?php echo $icon['sizes']['preload']; ?>"
            data-srcset="<?php echo $icon['sizes']['preload']; ?> 64w,
              <?php echo $icon['sizes']['128w']; ?> 65w
            "
          />
          <div class="category-feature__description category-feature__description--<?php echo $direction; ?>">
            <?php echo $description; ?>
          </div>
        </div>
        <?php
        // Links
        ?>
        <div class="category-feature__links">
          <div class="category-feature__button">
            <a class="category-feature__link" href="<?php echo $solPage; ?>">
              <h4 class="category-feature__link-text">
                <?php
                if( $category['label'] == 'Research' ):
                  echo 'Research Solutions';
                else:
                  echo 'Training Solutions';
                endif;
                ?>
              </h4>
            </a>
          </div>
          <div class="category-feature__button">
            <a class="category-feature__link" href="<?php echo $simPage; ?>">
              <h4 class="category-feature__link-text">
                <?php
                if( $category['label'] == 'Research' ):
                  echo 'Research Simulators';
                else:
                  echo 'Training Simulators';
                endif;
                ?>
              </h4>
            </a>
          </div>
        </div>
      </div>
    </div>
  <?php
  endforeach;
  ?>
</div>