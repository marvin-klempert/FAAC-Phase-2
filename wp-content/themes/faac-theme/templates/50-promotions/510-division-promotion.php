<?php
  $division = $divisionPromo_select['value'];

  $divisionBackground = get_field("{$division}_background", 'option');
  $divisionDescription = get_field("{$division}_description", 'option');
  $divisionHomepage = get_field("{$division}_homepage", 'option');
  $divisionLogo = get_field("{$division}_logo", 'option');
  $divisionName = get_field("{$division}_name", 'option');
?>
<div class="division-promotion division-promotion__wrapper" style="background-image: url('<?php echo $divisionBackground ?>');">
  <a class="division-promotion division-promotion__link" href="<?php echo $divisionHomepage; ?>">
    <div class="division-promotion division-promotion__link__wrapper">
      <img class="division-promotion division-promotion__logo" 
        src="<?php echo $divisionLogo; ?>"
        alt="<?php echo $divisionName; ?>"
      />
      <div class="division-promotion division-promotion__description">
        <?php echo $divisionDescription; ?>
      </div>
    </div>
  </a>
</div>