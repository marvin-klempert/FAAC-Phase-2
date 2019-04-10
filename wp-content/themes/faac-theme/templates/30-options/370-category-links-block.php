<?php
  if( have_rows( $categoryLinks_categories ) ):
    while( have_rows( $categoryLinks_categories ) ): the_row();

      $category_name = get_sub_field('category_name');
      $category_type = get_sub_field('category_type');

      $background = get_field("{$category_name['value']}{$category_type['label']}_promoBackground", 'option');
      $homepage = get_field("{$category_name['value']}{$category_type['label']}_homepage", 'option');
?>
  <a class="category-links category-links__link" href="<?php echo $homepage; ?>">
    <div class="category-links category-links__related-links" style="background-image: url('<?php echo $background['sizes']['w1540']; ?>');">
      <h3 class="category-links category-links__text">
        <?php echo $category_name['label']; ?><br />
        <span class="category-links category-links__text--lower">
          <?php echo $category_type['label'] . 's'; ?>
        </span>
      </h3>
    </div>
  </a>
<?php
    endwhile;
  endif;
?>
