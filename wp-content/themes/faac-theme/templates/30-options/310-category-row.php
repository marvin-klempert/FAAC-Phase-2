<?php if( have_rows( $categoryRow ) ): ?>

  <?php while( have_rows( $categoryRow ) ): the_row();

    $categoryRow_category = get_sub_field('categoryRow_category');
      $category = $categoryRow_category['value'];
      $categoryIcon = get_field($categoryRow_category['value'] . '_icon', 'option');
      $categoryLabel = $categoryRow_category['label'];
    $categoryRow_categoryType = get_sub_field('categoryRow_categoryType');
      $Type = $categoryRow_categoryType['value'];
      $TypeLabel = $categoryRow_categoryType['label'];

      $categoryBackground = get_field("{$category}{$TypeLabel}_listBackground", 'option');
      $categoryHomepage = get_field("{$category}{$TypeLabel}_homepage", 'option');
  ?>
  <div class="category-row category-row__category"
    style="background-image: url('<?php echo $categoryBackground['sizes']['w640']; ?>');">
    <a class="category-row category-row__link" href="<?php echo $categoryHomepage; ?>">
      <div class="category-row category-row__heading">
        <img class="category-row category-row__icon"
          src="<?php echo $categoryIcon['url']; ?>"
          alt="<?php echo $categoryIcon['alt']; ?>"
        />
        <h4 class="category-row category-row__title">
          <?php echo $categoryLabel; ?><br />
          <span class="category-row category-row__title--lower">
            <?php echo $TypeLabel . "s"; ?>
          </span>
        </h4>
      </div>
    </a>
  </div>
  <?php endwhile; ?>
<?php endif; ?>
