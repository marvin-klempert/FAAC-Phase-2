<?php
  $division = get_the_terms( get_the_ID(), 'division' );

  $divisionName = $division[0]->name;
    if( $divisionName == 'FAAC Commercial' ):
      include( locate_template('templates/60-meta/611-faac-commercial-favicon.php', false, false));
    elseif( $divisionName == 'FAAC Military' ):
      include( locate_template('templates/60-meta/612-faac-military-favicon.php', false, false));
    elseif( $divisionName == 'MILO Range' ):
      include( locate_template('templates/60-meta/613-milo-range-favicon.php', false, false));
    elseif( $divisionName == 'Realtime Technologies' ):
      include( locate_template('templates/60-meta/614-rti-favicon.php', false, false));
    else:
      include( locate_template('templates/60-meta/610-faac-favicon.php', false, false));
    endif;
?>
