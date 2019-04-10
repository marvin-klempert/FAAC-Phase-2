<?php
  $division = get_the_terms( get_the_ID(), 'division' );

  $divisionName = $division[0]->name;
    if( $divisionName == 'FAAC Commercial' ){
      $divisionPrefix = 'faacCommercial';
    } elseif( $divisionName == 'FAAC Military' ){
      $divisionPrefix = 'faacMilitary';
    } elseif( $divisionName == 'MILO Range' ){
      $divisionPrefix = 'miloRange';
    } elseif( $divisionName == 'Realtime Technologies' ){
      $divisionPrefix = 'rti';
    } else {
      $divisionPrefix = 'none';
    }

?>
<?php if( $divisionPrefix != 'none' ): ?>
  <a class="division-flag division-flag__link" href="<?php echo get_field($divisionPrefix . '_homepage', 'option'); ?>">
    <img class="division-flag division-flag__image" 
      src="<?php echo get_field($divisionPrefix . '_divisionFlag', 'option'); ?>"
      alt="<?php echo get_field($divisionPrefix . '_name', 'option'); ?>"
    />
  </a>
<?php endif; ?>