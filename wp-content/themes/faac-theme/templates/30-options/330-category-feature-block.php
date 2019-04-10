<?php
  if( have_rows ( $categoryFeature ) ):

    while( have_rows ( $categoryFeature ) ) : the_row();

      $categoryFeature_direction = get_sub_field('categoryFeature_direction');
      $categoryFeature_category = get_sub_field('categoryFeature_category');
        //Sets the icon based on selection
        $categoryFeature_icon = get_field($categoryFeature_category['value'] . '_icon', 'option');
        $categoryFeature_description = get_field($categoryFeature_category['value'] . '_description', 'option');
        $categoryFeature_simulatorHomepage = get_field($categoryFeature_category['value'] . 'Simulator_homepage', 'option');
        $categoryFeature_solutionHomepage = get_field($categoryFeature_category['value'] . 'Solution_homepage', 'option');
      $categoryFeature_background = get_sub_field('categoryFeature_background');
?>
  <div class="category-feature category-feature__category"
    style="background-image: url('<?php echo $categoryFeature_background['sizes']['w1540']; ?>');">
    <div class="category-feature category-feature__overlay <?php echo $categoryFeature_direction ?>">
      <div class="category-feature category-feature__masthead-wrapper">
        <h3 class="category-feature category-feature__title"><?php echo $categoryFeature_category['label'] ?></h3>
        <img class="category-feature category-feature__icon"
          src="<?php echo $categoryFeature_icon['url']; ?>"
          alt="<?php echo $categoryFeature_icon['alt']; ?>"
        />
        <div class="category-feature category-feature__description <?php echo $categoryFeature_direction ?>">
          <?php echo $categoryFeature_description ?>
        </div>
      </div>
      <div class="category-feature category-feature__links">
        <div class="category-feature category-feature__button">
          <a class="category-feature category-feature__link" href="<?php echo $categoryFeature_solutionHomepage ?>">
            <h4 class="category-feature category-feature__link-text">
              <?php if( $categoryFeature_category['label'] == 'Research' ): ?>
                Research Solutions
              <?php else: ?>
                Training Solutions
              <?php endif; ?>
            </h4>
          </a>
        </div>
        <div class="category-feature category-feature__button">
          <a class="category-feature category-feature__link" href="<?php echo $categoryFeature_simulatorHomepage ?>">
            <h4 class="category-feature category-feature__link-text">
              <?php if( $categoryFeature_category['label'] == 'Research' ): ?>
                Research Simulators
              <?php else: ?>
                Training Simulators
              <?php endif; ?>
            </h4>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php
    endwhile;
  endif;
?>
