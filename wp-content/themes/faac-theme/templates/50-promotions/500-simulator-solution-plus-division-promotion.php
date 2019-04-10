<?php
  $categoryBackground = "{$doublePromo_category['value']}{$doublePromo_type['label']}_headingBackground";
  $categoryIcon = "{$doublePromo_category['value']}_icon";
  $categoryType = "{$doublePromo_category['label']} {$doublePromo_type['label']}s";
  $categoryType_homepage = "{$doublePromo_category['value']}{$doublePromo_type['label']}_homepage";

  ?>
  <div class="promotion-row promotion-row__item" style="background-image: url('<?php echo get_field($categoryBackground, 'option')['sizes']['w1360']; ?>')">
    <a class="promotion-row promotion-row__link" href="<?php the_field($categoryType_homepage, 'option');?>">
      <div class="promotion-row promotion-row__overlay">
      <img class="promotion-row promotion-row__image"
        src="<?php echo get_field($categoryIcon, 'option')['url']; ?>"
        alt="<?php echo "{$doublePromo_category['value']} icon"; ?>"
      />
      <h3 class="promotion-row promotion-row__headline">
        <?php echo $categoryType ?>
      </h3>
      </div>
    </a>
  </div>
<?php

  $divisionLogo = get_field("{$doublePromo_division}_logo", 'option');
  $divisionName = get_field("{$doublePromo_division}_name", 'option');
  $divisionBackground = get_field("{$doublePromo_division}_background", 'option');
  $divisionHomepage = get_field("{$doublePromo_division}_homepage", 'option');

?>
  <div class="promotion-row promotion-row__item" style="background-image: url('<?php echo $divisionBackground; ?>');">
    <a class="promotion-row promotion-row__link" href="<?php echo $divisionHomepage; ?>">
      <img class="promotion-row promotion-row__logo"
        src="<?php echo $divisionLogo; ?>"
        alt="<?php echo $divisionName; ?>"
      />
    </a>
  </div>
