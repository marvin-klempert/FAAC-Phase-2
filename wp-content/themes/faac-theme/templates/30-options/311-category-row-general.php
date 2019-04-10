<?php if( have_rows( $generalCategoryRow ) ): ?>

  <?php while( have_rows( $generalCategoryRow ) ): the_row();

    $generalCategoryRow_category = get_sub_field('generalCategoryRow_category');
      $categoryValue = $generalCategoryRow_category['value'];
      $categoryLabel = $generalCategoryRow_category['label'];
      $categoryIcon = get_field("{$generalCategoryRow_category['value']}_icon", 'option');
      $categoryBackground = get_field("{$generalCategoryRow_category['value']}Simulator_listBackground", 'option');
      $simulationsLink = get_field("{$generalCategoryRow_category['value']}Simulator_homepage", 'option');
      $solutionsLink = get_field("{$generalCategoryRow_category['value']}Solution_homepage", 'option');


  ?>
  <div class="category-row category-row__category"
    style="background-image: url('<?php echo $categoryBackground['sizes']['w640']; ?>');">
    <div class="category-row category-row__heading">
      <img class="category-row category-row__icon"
        src="<?php echo $categoryIcon['url']; ?>"
        alt="<?php echo $categoryIcon['alt']; ?>"
      />
      <h4 class="category-row category-row__title">
        <?php echo $categoryLabel; ?>
      </h4>
    </div>
    <a class="category-row category-row__link" href="<?php echo $solutionsLink ?>">
      <div class="category-row category-row__button">
        <h5 class="category-row category-row__text">Solutions</h5>
      </div>
    </a>
    <a class="category-row category-row__link" href="<?php echo $simulationsLink ?>">
      <div class="category-row category-row__button">
        <h5 class="category-row category-row__text">Simulators</h5>
      </div>
    </a>
  </div>
  <?php endwhile; ?>
<?php endif; ?>
