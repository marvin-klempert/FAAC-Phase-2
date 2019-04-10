<?php
  if( have_rows($categoryDetail) ):
    while( have_rows($categoryDetail) ): the_row();

      $categoryDetail_category = get_sub_field('categoryDetail_category');
      $categoryDetail_type = get_sub_field('categoryDetail_type');
      $categoryDetail_description = get_sub_field('categoryDetail_description');

      $background = get_field("{$categoryDetail_category['value']}{$categoryDetail_type['label']}_headingBackground", 'option');
      $homepage = get_field("{$categoryDetail_category['value']}{$categoryDetail_type['label']}_homepage", 'option');
      $icon = get_field("{$categoryDetail_category['value']}_icon", 'option');
?>
<div class="category-detail category-detail__block"
  style="background-image: url('<?php echo $background['sizes']['w1100']; ?>');">
    <a class="category-detail category-detail__link" href="<?php echo $homepage; ?>">
      <div class="category-detail category-detail__header">
       <div class="category-detail category-detail__wrapper">
        <img class="category-detail category-detail__icon"
          src="<?php echo $icon['url']; ?>"
          alt="<?php echo $icon['alt']; ?>"
        />
        <h4>
          <?php echo $categoryDetail_category['label']; ?><br />
          <span class="category-detail category-detail__lower-text">
            <?php echo $categoryDetail_type['label'] . 's'; ?>
          </span>
        </h4>
		  </div>
      </div>
    </a>
  <div class="category-detail category-detail__excerpt">
    <?php echo $categoryDetail_description; ?>
  </div>
</div>
<?php
    endwhile;
  endif;
?>
